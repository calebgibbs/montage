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
		//title  
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
		if(strlen(trim($_POST['feat_1'])) === 0){ 
			$errors++; 
			$this->data['feat1Message'] = '<span style="color: #d9534f">*This feild is required</span>'; 
		} 
		for($i=1;$i<=10;$i++){
			$feat = 'feat_'.$i;  
			$msg = 'feat'.$i.'Message';  
			if(strlen(trim($_POST[$feat])) > 300){ 
				$errors++;
				$this->data[$msg] = '<span style="color: #d9534f">*Feature must be less than 300 characters</span>';
			}
		} 
		//options  
		if(strlen(trim($_POST['opt_1'])) === 0){ 
			$errors++;  
			$this->data['opt1Message'] = '<span style="color: #d9534f">*This feild is required</span>';
		} 
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
				}
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
		$sql = "UPDATE products SET title = '$title', description = '$desc', category = '$cat', supplier = '$sup' WHERE id = '$id'"; 
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
			if(!result || $result->num_rows == 0){ 
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
				if($DBtitle != $title || $DBlink != link){ 
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
			$sql = "SELECT image FROM product_images WHERE product_id = '$id' AND image_position = '$i'"; 
			$result = $this->dbc->query($sql); 
			$del = 'delImg'.$i; $del = $_POST[$del];  
			if(!$result || $result->num_rows == 0){ 
				//uploading a new image 
			}else{  
				$result = $result->fetch_assoc();
				$img = $result['image']; 
				//replacing image  
				$file = 'image'.$i; 
				if(!in_array($_FILES[$file]['error'], [4])){ 
					$current = $img;
					unlink("img/products/large/$current"); 
					unlink("img/products/thumbnail/$current");
					$manager = new ImageManager();
					$image = $manager->make( $_FILES[$file]['tmp_name'] );   
					$fileExtension = $this->getFileExtension( $image->mime() ); 
					$fileName = uniqid(); 
					$image->resize(250, 150); 
					$image->save("img/products/thumbnail/$fileName$fileExtension");  
					$image->resize(770, 400); 
					$image->save("img/products/large/$fileName$fileExtension"); 
					$sql = "UPDATE product_images SET image = '$fileName$fileExtension' WHERE product_id = '$id' AND image_position = '$i'"; 
					$this->dbc->query($sql);
				}
			}
			if(isset($del)){  
				unlink("img/products/large/$img"); 
				unlink("img/products/thumbnail/$img"); 
				$sql = "DELETE FROM product_images WHERE product_id = '$id' AND image_position = '$i'"; 
				$this->dbc->query($sql);
				$next = $i++; 
				$sql = "SELECT image FROM product_images WHERE product_id = '$id' AND image_position = '$next'"; 
				$result = $this->dbc->query($sql); 
				if($result || $result->num_rows != 0){  
					$sql = "UPDATE product_images SET image_position = '$i' WHERE product_id = '$id' AND image_position = '$next'"; 
					$this->dbc->query($sql);
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