<?php  
use Intervention\Image\ImageManager; 
class EditProductController extends PageController { 
	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc;  
		if ($_SESSION['account_type'] != 'admin') {
			header('Location: index.php?page=404');
		} 
		if(!isset($_GET['product'])){ 
			header('Location: index.php?page=404');
		}
		$this->getData();  
		if(isset($_POST['makeChanges'])){
			$this->validate();
		} 
		if(isset($_POST['yesDel'])){
			$this->deleteProduct();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('editProduct', $this->data); 
	} 

	private function getData(){ 
		$id = $_GET['product']; 

		$sql = "SELECT * FROM products WHERE id = '$id'"; 
		$result = $this->dbc->query($sql); 
		if (!$result || $result->num_rows == 0) {
			header('Location: index.php?page=404');
		}else{ 
			$this->data['product'] = $result->fetch_assoc();
		} 

		//get features  
		$sql = "SELECT id, feature, position FROM product_features WHERE product_id = '$id'"; 
		$result = $this->dbc->query($sql); 
		$this->data['features'] = $result->fetch_all(MYSQLI_ASSOC); 
		// get options 
		$sql = "SELECT id, product_option, position FROM product_options WHERE product_id = '$id'"; 
		$result = $this->dbc->query($sql); 
		$this->data['options'] = $result->fetch_all(MYSQLI_ASSOC); 
		//get links 
		$sql = "SELECT id, href, link_text FROM product_links WHERE product_id = '$id'"; 
		$result = $this->dbc->query($sql); 
		$this->data['links'] = $result->fetch_all(MYSQLI_ASSOC);   
		//get dimensions 
		$sql = "SELECT dimension_type, dimension FROM product_dimensions WHERE product_id = '$id'"; 
		$results = $this->dbc->query($sql);  
		$this->data['dimensions'] = $results->fetch_all(MYSQLI_ASSOC);
		//get downloads  
		$sql = "SELECT download_link, title FROM downloads WHERE product_id = '$id'"; 
		$result = $this->dbc->query($sql); 
		$this->data['downloads'] = $result->fetch_all(MYSQLI_ASSOC);
		//get images  
		$sql = "SELECT id, image, image_position FROM product_images WHERE product_id  = '$id'"; 
		$result = $this->dbc->query($sql); 
		$this->data['images'] = $result->fetch_all(MYSQLI_ASSOC); 
		//get selects 
		$sql = "SELECT SUBSTRING(COLUMN_TYPE,5) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='montage9_dtat' AND TABLE_NAME='products' AND COLUMN_NAME='supplier'";
		// $sql = "SELECT SUBSTRING(COLUMN_TYPE,5) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='montage' AND TABLE_NAME='products' AND COLUMN_NAME='supplier'"; 
		$result = $this->dbc->query($sql);  
		if ($result) {
			$result = $result->fetch_assoc(); 
			$result = $result['SUBSTRING(COLUMN_TYPE,5)'];  
			$result = str_replace("(","",$result); 
			$result = str_replace(")","",$result);
			$result = str_replace("'","",$result); 
			$info = explode(',', $result); 
			$this->data['suppliers'] = $info;
		}
	}  

	private function validate(){ 
		$errors = 0;    
		$title = trim($_POST['title']);  
		if(strlen($title) === 0){ 
			$errors++; 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*This feild is required</span>';
		}elseif(strlen($title) > 50){
			$errors++; 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*Title mus be less then 50 characters</span>';
		}
		//description  
		$desc = trim($_POST['desc']);
		if(strlen($desc) === 0){ 
			$errors++; 
			$this->data['descMessage'] = '<span style="color: #d9534f">*This feild is required</span>';	
		}elseif(strlen($desc) > 1000){ 
			$errors++; 
			$this->data['descMessage'] = '<span style="color: #d9534f">*Description must be less than 1000 characters</span>';
		} 
		//features   
		for($i=1;$i<=10;$i++){
			$feat = 'feat_'.$i;  
			$msg = 'feat'.$i.'Message';  
			if(strlen(trim($_POST[$feat])) > 300){ 
				$errors++;
				$this->data[$msg] = '<span style="color: #d9534f">*Feature must be less than 300 characters</span>';
			}
		} 
		//options  
		for($i=1;$i<=10;$i++){ 
			$opt = 'opt_'.$i; 
			$msg = 'opt'.$i.'Message'; 
			if(strlen(trim($_POST[$opt])) > 300){ 
				$errors++; 
				$this->data[$msg] = '<span style="color: #d9534f">*Option must be less than 300 characters</span>'; 
			}
		} 
		//links  
		for($i=1;$i<=5;$i++){ 
			$text = 'opt_text_'.$i; 
			$textMsg = 'optText'.$i;  
			$link = 'opt_link_'.$i; 
			$linkMsg = 'optLink'.$i; 
			if(strlen(trim($_POST[$text])) != 0){ 
				if(strlen(trim($_POST[$link])) === 0){ 
					$errors++; 
					$this->data[$linkMsg] = '<span style="color: #d9534f">*This feild is required</span>';
				}
			}elseif(strlen(trim($_POST[$link])) != 0){ 
				if(strlen(trim($_POST[$text])) === 0){
					$errors++; 
					$this->data[$textMsg] = '<span style="color: #d9534f">*This feild is required</span>';
				}
			} 
			if(strlen(trim($_POST[$text])) > 100) {
				$errors++; 
				$this->data[$textMsg] = '<span style="color: #d9534f">*Text is too long</span>';
			} 
			if(strlen(trim($_POST[$link])) > 200){ 
				$errors++; 
				$this->data[$linkMsg] = '<span style="color: #d9534f">*Link is too long</span>';
			} 
		} 
		//images  
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
		//dimensions 
		for($i=1;$i<=3;$i++){ 
			$type = 'dt'.$i; $type = $_POST[$type]; $typeMsg = 'typeMsg'.$i; 
			$value = 'dv'.$i; $value = $_POST[$value]; $valueMsg = 'valueMsg'.$i;
			if(strlen($type) != 0){ 
				if(strlen($value) === 0){
					$errors++; 
					$this->data[$valueMsg] = '<span style="color: #d9534f">*You must define the dimension value</span>';
				}
			}elseif(strlen($value) != 0){ 
				if(strlen($type) === 0){ 
					$errors++; 
					$this->data[$typeMsg] = '<span style="color: #d9534f">*You must define the dimension type</span>';
				}
			} 
			if(strlen($type) > 50){ 
				$errors++; 
				$this->data[$typeMsg] = '<span style="color: #d9534f">*Type name must be less than 50 characters</span>';
			} 
			if(strlen($value) > 20){ 
				$errors++; 
				$this->data[$valueMsg] = '<span style="color: #d9534f">*The value must be less than 20 characters</span>';
			}  
		} 
		//downloads  
		for($i=1;$i<=3;$i++){ 
			$title = 'download_title_'.$i;   
			$link = 'download_link_'.$i;
			$Tmsg = 'DtitleMsg'.$i;
			$Lmsg = 'DlinkMsg'.$i; 
			if(strlen(trim($_POST[$title])) != 0){ 
				if(strlen(trim($_POST[$link])) === 0){ 
					$errors++; 
					$this->data[$Lmsg] = '<span style="color: #d9534f">*This feild is required</span>'; 		
				}
			}elseif(strlen(trim($_POST[$link])) != 0){ 
				if(strlen(trim($_POST[$title])) === 0){ 
					$errors++; 
					$this->data[$Tmsg] = '<span style="color: #d9534f">*This feild is required</span>'; 
				}
			} 

			if(strlen(trim($_POST[$title])) > 50){ 
				$errors++; 
				$this->data[$Tmsg] = '<span style="color: #d9534f">*Title is too long</span>';
			} 
			if(strlen(trim($_POST[$link])) > 200){ 
				$errors++; 
				$this->data[$Lmsg] = '<span style="color: #d9534f">*Link is too long</span>';
			}
		} 

		if($errors === 0){ 
			$this->update();
		}
	} 

	private function update(){ 	
		$id = $_GET['product']; 
		//title, description, category, supplier  
		$title = trim($_POST['title']);  
		$desc = trim($_POST['desc']); 
		$cat = strtolower($_POST['category']);
		$sup = $_POST['supplier'];  
		if($cat == 'agile_furniture'){
			if($_POST['cat1'] != '1'){ 
				$cat2 = $this->dbc->real_escape_string($_POST['cat1']);    	
			}
		}elseif($cat == 'joinery_custom'){ 
			if($_POST['cat2'] != '2'){ 
				$cat2 = $this->dbc->real_escape_string($_POST['cat2']);
			}
		}elseif($cat == 'chair'){ 
			if($_POST['cat3'] != '3'){ 
				$cat2 = $this->dbc->real_escape_string($_POST['cat3']);
			}	
		}elseif($cat == 'table'){ 
			if($_POST['cat4'] != '4'){ 
				$cat2 = $this->dbc->real_escape_string($_POST['cat4']);
			}	
		}elseif ($cat == 'tech_accesories') {
			if($_POST['cat5'] != '5'){ 
				$cat2 = $this->dbc->real_escape_string($_POST['cat5']);
			}	
		}elseif($cat == 'storage'){
			if($_POST['cat6'] != '6'){ 
				$cat2 = $this->dbc->real_escape_string($_POST['cat6']);
			}	
		}else{ 
			$cat2 = 'none';
		} 
		$sql = "UPDATE products SET title = '$title', description = '$desc', category = '$cat', category2 = '$cat2', supplier = '$sup' WHERE id = '$id'"; 
		$this->dbc->query($sql);  
		//features 
		for($i=1;$i<=10;$i++){ 
			$feat = 'feat_'.$i; $feat = trim($_POST[$feat]); 
			$feat = $this->dbc->real_escape_string($feat); 
			$sql = "SELECT feature FROM product_features WHERE position = '$i' AND product_id = '$id'"; 
			$result = $this->dbc->query($sql); 
			if (!$result || $result->num_rows == 0) {
				if (strlen($feat) != 0) {
					$sql = "INSERT INTO product_features(product_id, feature, position) VALUES('$id','$feat','$i')"; 
					$this->dbc->query($sql);
				} 
			}else{ 
				$result = $result->fetch_assoc(); $result = $result['feature'];  
				if ($feat != $result) {
					if (strlen($feat) === 0) {
						$sql = "DELETE FROM product_features WHERE product_id = '$id' AND position = '$i'"; 
						$this->dbc->query($sql);	
					}else{ 
						$sql = "UPDATE product_features SET feature = '$feat' WHERE position = '$i' AND product_id = '$id'"; 
						$this->dbc->query($sql);
					}
				}
			} 
		} 
		//options  
		for($i=1;$i<=10;$i++){ 
			$opt = 'opt_'.$i; 
			$opt = $this->dbc->real_escape_string(trim($_POST[$opt])); 
			$sql = "SELECT product_option FROM product_options WHERE position = '$i' AND product_id = '$id'"; 
			$result = $this->dbc->query($sql); 
			if(!$result || $result->num_rows == 0){ 
				if(strlen($opt) != 0){ 
					$sql = "INSERT INTO product_options(product_id, product_option, position) VALUES('$id', '$opt', '$i')"; 
					$this->dbc->query($sql);
				}
			}else{ 
				$result = $result->fetch_assoc(); $result = $result['product_option'];  
				if($opt != $result){ 
					if (strlen($opt) === 0) {
						$sql = "DELETE FROM product_options WHERE product_id = '$id' AND position = '$i'"; 
						$this->dbc->query($sql); 
					}else{ 
						$sql = "UPDATE product_options SET product_option = '$opt' WHERE position = '$i' AND product_id = '$id'"; 
						$this->dbc->query($sql);
					}
				}
			}
		} 
		//more options 
		for($i=1;$i<=5;$i++){ 
			$text = 'opt_text_'.$i; $text = $this->dbc->real_escape_string(trim($_POST[$text])); 
			$link = 'opt_link_'.$i; $link = $this->dbc->real_escape_string(trim($_POST[$link])); 
			$sql = "SELECT href, link_text FROM product_links WHERE position = '$i' AND product_id = '$id'";  
			$result = $this->dbc->query($sql); 
			if(!$result || $result->num_rows == 0){ 
				if (strlen($text) != 0 && strlen($link) != 0) {
					$sql = "INSERT INTO product_links(product_id, href, link_text, position) VALUES('$id', '$link', '$text', '$i')"; 
					$this->dbc->query($sql);
				}
			}else{ 
				$result = $result->fetch_assoc(); 
				$DBlink = $result['href']; 
				$DBtext = $result['link_text']; 
				if($text != $DBtext || $link != $DBlink){ 
					if(strlen($text) === 0 && strlen($link) === 0){ 
						$sql = "DELETE FROM product_links WHERE product_id = '$id' AND position = '$i'"; 
						$this->dbc->query($sql); 
					}else{ 
						$sql = "UPDATE product_links SET href = '$link', link_text = '$text' WHERE position = '$i' AND product_id = '$id'"; 
						$this->dbc->query($sql);
					}
				} 
			}
		}  
		//dimentions 
		for($i=1;$i<=3;$i++){ 
			$type = 'dt'.$i; $type = $this->dbc->real_escape_string(trim($_POST[$type]));
			$value = 'dv'.$i; $value = $this->dbc->real_escape_string(trim($_POST[$value])); 
			$sql = "SELECT id,dimension, dimension_type FROM product_dimensions WHERE product_id = '$id' AND position = '$i'";  
			$result = $this->dbc->query($sql);
			if($result->num_rows == 1){ 
				$result = $result->fetch_assoc(); $row_id = $result['id'];
				$sql = "UPDATE product_dimensions SET dimension = '$value', dimension_type = '$type' 
						WHERE id = '$row_id'"; 
				$this->dbc->query($sql);
 			}else{ 
 				$sql = "INSERT INTO product_dimensions(product_id, dimension_type, dimension, position)
 						VALUES('$id', '$type', '$value', '$i')"; 
 				$this->dbc->query($sql);
 			}
		}
		//downloads  
		for($i=1;$i<=3;$i++){ 
			$title = 'download_title_'.$i; $title = $this->dbc->real_escape_string(trim($_POST[$title])); 
			$link = 'download_link_'.$i; $link =$this->dbc->real_escape_string(trim($_POST[$link])); 
			$sql = "SELECT title, download_link FROM downloads WHERE product_id = '$id' AND position = '$i'"; 
			$result = $this->dbc->query($sql); 
			if(!$result || $result->num_rows == 0){ 
				if(strlen($title) != 0 && strlen($link) != 0){ 
					$sql = "INSERT INTO downloads(product_id, download_link, title, position) VALUES('$id','$link', '$title', '$i')"; 
					$this->dbc->query($sql); 
				}	
			}else{ 
				$result = $result->fetch_assoc(); 
				$DBtitle = $result['title']; 
				$DBlink = $result['download_link']; 
				if($DBtitle != $title || $DBlink != $link){ 
					if(strlen($title) === 0 && strlen($link) === 0){
						$sql = "DELETE FROM downloads WHERE product_id = '$id' AND position = '$i'"; 
						$this->dbc->query($sql);
					}else{ 
						$sql = "UPDATE downloads SET title = '$title', download_link = '$link' WHERE product_id = '$id' AND position = '$i'"; 
						$this->dbc->query($sql);
					}
				}
			}  
		} 
		//images  
		for($i=1;$i<=5;$i++){ 
			$img = 'image'.$i; 
			$del = 'delImg'.$i; 
			if(!in_array($_FILES[$img]['error'], [4])){ 
				$sql = "SELECT image FROM product_images WHERE product_id = '$id' AND image_position = '$i'"; 
				$result = $this->dbc->query($sql); 
				if($result->num_rows == 1){ 
					$image = $result->fetch_assoc(); $image = $image['image']; 
					//remove current image 
					unlink("img/products/large/$image");
					unlink("img/products/thumbnail/$image"); 
					//add new image  
					$manager = new ImageManager(); 
					$image = $manager->make( $_FILES[$img]['tmp_name'] );
					$fileExtension = $this->getFileExtension( $image->mime() ); 
					$fileName = uniqid(); 
					$image->save("img/products/large/$fileName$fileExtension", 60); 
					$image->resize(250, 150); 
					$image->save("img/products/thumbnail/$fileName$fileExtension", 60); 
					//update in databse
					$sql = "UPDATE product_images SET image = '$fileName$fileExtension' WHERE product_id = '$id' AND image_position = '$i'";  
					$this->dbc->query($sql); 
				}else{  
					$manager = new ImageManager();  
					$image = $manager->make( $_FILES[$img]['tmp_name'] ); 
					$fileExtension = $this->getFileExtension( $image->mime() ); 
					$fileName = uniqid(); 
					$image->save("img/products/large/$fileName$fileExtension", 60); 
					$image->resize(250, 150); 
					$image->save("img/products/thumbnail/$fileName$fileExtension", 60); 
					$sql = "INSERT INTO product_images(product_id, image, image_position) VALUES('$id','$fileName$fileExtension','$i')";  
					$this->dbc->query($sql);
				}
			}  
			if(isset($_POST[$del])){ 
				//get current image count  
				$sql = "SELECT image FROM product_images WHERE product_id = '$id'"; 
				$allImages = $this->dbc->query($sql); 
				if($allImages->num_rows != 0){ 
					$allImg = $allImages->fetch_all(MYSQLI_ASSOC); 
					$feilds = count($allImg);
				}
				//delete current image 
				$sql = "SELECT image FROM product_images WHERE product_id = '$id' AND image_position = '$i'";  
				$result = $this->dbc->query($sql); 
				if($result->num_rows == 1){ 
					$image = $result->fetch_assoc(); $image = $image['image']; 
					unlink("img/products/large/$image"); 
					unlink("img/products/thumbnail/$image"); 
					$sql = "DELETE FROM product_images WHERE image = '$image' AND image_position = '$i'"; 
					$this->dbc->query($sql);
				} 
				//check how many feilds there are and then that becomes the max  
				if($i < $feilds){ 
					for($j=$i;$j<$feilds;$j++){ 
						$current = $j; 
						$next = $current+1; 
						$sql = "UPDATE product_images SET image_position = '$j' WHERE product_id = '$id' AND image_position = '$next'"; 
						$this->dbc->query($sql);
					}
				}
			}
		}

		header('Location: index.php?page=product&productnum='.$id);
	} 

	private function deleteProduct(){ 
		$id = $_GET['product'];
		//get and del images from files   
		for($i=1;$i<=5;$i++){ 
			$sql = "SELECT id, image FROM product_images WHERE product_id = '$id' AND image_position = '$i'"; 
			$result = $this->dbc->query($sql); 
			if($result->num_rows == 1){ 
				$result = $result->fetch_assoc();
				$imgId = $result['id']; 
				$image = $result['image']; 
				unlink("img/products/large/$image"); 
				unlink("img/products/thumbnail/$image"); 
				$sql = "DELETE FROM product_images WHERE id = '$imgId'"; 
				$this->dbc->query($sql);
			}
		} 
		$sql = "DELETE FROM products WHERE id = '$id'"; 
		$this->dbc->query($sql); 
		header('Location: index.php?page=manage_products'); 

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