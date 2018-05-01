<?php  
use Intervention\Image\ImageManager; 
class EditPortfolioController extends PageController { 
	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc;  
		if ($_SESSION['account_type'] != 'admin') {
			header('Location: index.php?page=404');
		} 
		if(!isset($_GET['port'])){ 
			header('Location: index.php?page=404');
		} 
		$this->getData(); 
		if(isset($_POST['makeChanges'])){ 
			$this->validate();
		}  
		if(isset($_POST['yesDel'])){
			$this->delete();
		} 
	}  
	public function buildHTML(){ 
		echo $this->plates->render('editport', $this->data); 
	} 

	private function getData(){ 
		$id = $_GET['port']; 
		$sql = "SELECT *  FROM portfolios WHERE id = '$id'"; 
		$results = $this->dbc->query($sql); 
		if($results->num_rows != 0){ 
			$this->data['port'] = $results->fetch_assoc();
		}  
		$sql = "SELECT image, image_position FROM portfolio_images WHERE portfolio_id = '$id'"; 
		$results = $this->dbc->query($sql); 
		if($results->num_rows != 0){ 
			$this->data['images'] = $results->fetch_all(MYSQLI_ASSOC);	
		}
	}  

	private function validate(){ 
		$errors = 0; 
		if(strlen(trim($_POST['title'])) == 0){ 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*The title is required</span>'; 
			$errors++;
		}elseif(strlen($_POST['title']) > 50){ 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*Title is too long</span>'; 
			$errors++; 	 
		} 
		if(strlen($_POST['client']) > 50){ 
			$this->data['clientMessage'] = '<span style="color: #d9534f">*Client name is too long</span>'; 
			$errors++; 	 
		} 
		if(strlen($_POST['date']) > 70){ 
			$this->data['dateMessage'] = '<span style="color: #d9534f">*The date is too long</span>'; 
			$errors++;
		}
		if(strlen($_POST['architect']) > 50){ 
			$this->data['arcMessage'] = '<span style="color: #d9534f">*Architect name is too long</span>'; 
			$errors++;	
		} 
		if(strlen(trim($_POST['contractor'])) > 50){ 
			$this->data['conMessage'] = '<span style="color: #d9534f">*Contractor name is too long</span>'; 
			$errors++;	
		} 
		if(strlen(trim($_POST['desc'])) == 0){ 
			$this->data['descMessage'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;	
		}elseif(strlen(trim($_POST['desc'])) > 1000){ 
			$this->data['descMessage'] = '<span style="color: #d9534f">*The description is too long</span>'; 
			$errors++;	
		} 
		for($i=1;$i<=5;$i++){ 
			$img = "image".$i;  
			$msg = "imgMsg".$i;
			if (!in_array($_FILES[$img]['error'], [4])) {
				if (in_array($_FILES[$img]['error'], [1,3])) {
					$errors++; 
					$this->data[$msg] = '<span style="color: #d9534f">*Image failed to upload</span>';
				}elseif (!in_array($_FILES[$img]['type'], $this->acceptableImageTypes)) {
					$errors++; 
					$this->data[$msg] = '<span style="color: #d9534f">*You must upload a valid image</span>';
				}else{ 
					$image_info = getimagesize($_FILES[$img]["tmp_name"]);
					$image_width = $image_info[0]; 
					$image_height = $image_info[1]; 
					if($image_width < $image_height){ 
						$this->data[$msg] = '<span style="color: #d9534f">*Please upload a landscape image</span>';	 
						$errors++;
					}
				}
			}
		} 
		if($errors == 0){ 
			$this->update();
		}
	} 

	private function update(){ 	
		$id = $_GET['port'];
		$title = $this->dbc->real_escape_string(trim($_POST['title'])); 
		$client = $this->dbc->real_escape_string(trim($_POST['client']));
		$date = $this->dbc->real_escape_string(trim($_POST['date']));
		$arc = $this->dbc->real_escape_string(trim($_POST['architect'])); 
		$contractor = $this->dbc->real_escape_string(trim($_POST['contractor'])); 
		$desc = $this->dbc->real_escape_string(trim($_POST['desc'])); 

		$sql = "UPDATE portfolios SET title = '$title', ";
		if(strlen($client) != 0){ 
			$sql .= "client = '$client',";
		}else{ 
			$sql .= "client = 'N/A',";	
		} 
		if(strlen($date) != 0){
			$sql .= "date = '$date',";
		}else{ 
			$sql .= "date = 'N/A',";
		} 
		if(strlen($arc) != 0){ 
			$sql .= "architect = '$arc',";
		}else{ 
			$sql .= "architect = 'N/A',";	
		}
		if(strlen($contractor) != 0){ 
			$sql .= "contractor = '$contractor',";
		}else{ 
			$sql .= "contractor = 'N/A',";	
		} 
		$sql .= "description = '$desc' WHERE id = '$id'"; 
		$this->dbc->query($sql);  
		for($i=1;$i<=5;$i++){ 
			$img = 'image'.$i; 
			$del = 'delImg'.$i; 
			if(!in_array($_FILES[$img]['error'], [4])){
				$sql = "SELECT image FROM portfolio_images WHERE portfolio_id = '$id' AND image_position = '$i'"; 
				$result = $this->dbc->query($sql); 
				if($result->num_rows == 1){ 
					//remove current images 
					$image = $result->fetch_assoc(); $image = $image['image'];
					unlink("img/portfolio/large/$image"); 
					unlink("img/portfolio/thumbnail/$image");	
					//add new image 
					$manager = new ImageManager(); 
					$image = $manager->make( $_FILES[$img]['tmp_name'] );
					$fileExtension = $this->getFileExtension( $image->mime() ); 
					$fileName = uniqid(); 
					$image->save("img/portfolio/large/$fileName$fileExtension", 60); 
					$image->resize(250, 150); 
					$image->save("img/portfolio/thumbnail/$fileName$fileExtension", 60); 
					$sql = "UPDATE portfolio_images SET image = '$fileName$fileExtension' WHERE portfolio_id = '$id' AND image_position = '$i'";  
					$this->dbc->query($sql); 
				}else{ 
					//add new image
					$manager = new ImageManager(); 
					$image = $manager->make( $_FILES[$img]['tmp_name'] ); 
					$fileExtension = $this->getFileExtension( $image->mime() ); 
					$fileName = uniqid(); 
					$image->save("img/portfolio/large/$fileName$fileExtension", 60); 
					$image->resize(250, 150); 
					$image->save("img/portfolio/thumbnail/$fileName$fileExtension", 60); 
					$sql = "INSERT INTO portfolio_images(portfolio_id, image, image_position)
						VALUES('$id','$fileName$fileExtension', '$i')"; 
					$this->dbc->query($sql);
				} 
			} 
			if(isset($_POST[$del])){ 
				//get image count
				$sql = "SELECT image FROM portfolio_images WHERE portfolio_id = '$id'"; 
				$allImages = $this->dbc->query($sql); 
				if($allImages->num_rows != 0){ 
					$allImg = $allImages->fetch_all(MYSQLI_ASSOC); 
					$feilds = count($allImg); 
				}  
				//get current image name 
				$sql = "SELECT image FROM portfolio_images WHERE portfolio_id = '$id' AND image_position = '$i'"; 
				$result = $this->dbc->query($sql); 
				if($result->num_rows == 1){ 
					$image = $result->fetch_assoc(); $image = $image['image']; 
					unlink("img/portfolio/large/$image"); 
					unlink("img/portfolio/thumbnail/$image"); 
					$sql = "DELETE FROM portfolio_images WHERE image = '$image' AND image_position = '$i'"; 
					$this->dbc->query($sql);
				} 
				//check how many images there are and then that becomes the max
				if($i < $feilds){ 
				
					for($j=$i;$j<$feilds;$j++){ 
						$current = $j; 
						$next = $current+1; 
						$sql = "UPDATE portfolio_images SET image_position = '$j' WHERE portfolio_id AND image_position = '$next'";
						$this->dbc->query($sql); 
						echo "Changed image ".$next."to ".$j."<br>";  
					}  
				}  
			}
		}
		header('Location: index.php?page=portfolio&num='.$id);
	} 			

	private function delete(){ 
		$id = $_GET['port']; 
		$sql = "SELECT image FROM portfolio_images WHERE portfolio_id = '$id'"; 
		$results = $this->dbc->query($sql);  
		if($results->num_rows != 0){ 
			$images = $results->fetch_all(MYSQLI_ASSOC); 
			foreach($images as $image){ 
				$img = $image['image'];
				unlink("img/portfolio/large/$img"); 
				unlink("img/portfolio/thumbnail/$img"); 
			}
			$sql = "DELETE FROM portfolios WHERE id = '$id'"; 
			$this->dbc->query($sql); 
			header('Location: index.php?page=portfolios');
		}
	} 
	private function getFileExtension( $mimeType ) {
		switch($mimeType) {
			case 'image/png':
			return '.png';
			break;
			case 'image/gif':
			return '.gif';
			break;
			case 'image/jpeg':
			return '.jpg';
			break;
			case 'image/bmp':
			return '.bmp';
			break;
			case 'image/tiff':
			return '.tif';
			break;
		}
	}


}