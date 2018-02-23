<?php  
class EditProductController extends PageController { 
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
		//get images  
		$sql = "SELECT id, image, image_position FROM product_images WHERE product_id  = '$id'"; 
		$result = $this->dbc->query($sql); 
		$this->data['images'] = $result->fetch_all(MYSQLI_ASSOC); 
		//get selects 
		$sql = "SELECT SUBSTRING(COLUMN_TYPE,5) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='montage' AND TABLE_NAME='products' AND COLUMN_NAME='supplier'"; 
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

		$title = trim($_POST['title']); 
		$category = strtolower($_POST['category']);
		$supplier = strtolower($_POST['supplier']); 
		$description = trim($_POST['desc']); 
		for($i=1;$i<=10;$i++){
			$value = "feat_".$i; 
			${'feat'.$i} = trim($_POST[$value]); 
		}  
		for($i=1;$i<=10;$i++){
			$value = "opt_".$i; 
			${'opt'.$i} = trim($_POST[$value]); 
		}  
		for($i=1;$i<=5;$i++){
			$value = "opt_text_".$i; 
			${'optT'.$i} = trim($_POST[$value]); 
		} 
		for($i=1;$i<=5;$i++){
			$value = "opt_link_".$i; 
			${'optL'.$i} = trim($_POST[$value]); 
		}
		for($i=1;$i<=5;$i++){
			$value = "image".$i; 
			${'img'.$i} = $_FILES[$value]; 
		}  
		$errors = 0; 

		if (strlen($title) === 0) {
			$errors++; 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*This feild is required</span>'; 
		}elseif(strlen($title) > 50){ 
			$errors++; 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*Title is too long</span>';	
		} 

		if ($category == '0') {
			$errors++;
			$this->data['categoryError'] = 'style="background: #d9534f"';
		} 

		if ($supplier == '0') {
			$errors++;
			$this->data['supplierError'] = 'style="background: #d9534f"';
		} 

		if (strlen($description) === 0) {
			$errors++; 
			$this->data['descMessage'] = '<span style="color: #d9534f">*This feild is required</span>';
		}elseif(strlen($description) > 1000){ 
			$errors++; 
			$this->data['descMessage'] = '<span style="color: #d9534f">*Description is too long</span>';
		} 

		if (strlen($feat1) === 0) {
			$errors++; 
			$this->data['feat1Message'] = '<span style="color: #d9534f">*This feild is required</span>';
		}elseif(strlen($feat1) > 300){ 
			$errors++; 
			$this->data['feat1Message'] = '<span style="color: #d9534f">*Feature is too long</span>';
		} 

		for($i=2;$i<=10;$i++){ 
			$message = "feat".$i."Message"; 
			$feat = ${'feat'.$i};
			if (strlen($feat) > 300) {
				$errors++; 
				$this->data[$message] = '<span style="color: #d9534f">*Feature is too long</span>';	
			}
		} 

		if (strlen($opt1) === 0) {
			$errors++; 
			$this->data['opt1Message'] = '<span style="color: #d9534f">*This feild is too long</span>';	
		}elseif(strlen($opt1) > 300){
			$errors++; 
			$this->data['opt1Message'] = '<span style="color: #d9534f">*Option is too long</span>';
		} 

		for($i=2;$i<=10;$i++){ 
			$message = "opt".$i."Message"; 
			$opt = ${'opt'.$i}; 
			if (strlen($opt) > 300) {
				$errors++; 
				$this->data[$message] = '<span style="color: #d9534f">*Option is too long</span>';
			}
		} 

		for($i=1;$i<=5;$i++){
			$text = ${'optT'.$i}; 
			$link = ${'optL'.$i}; 
			$linkM = "optLink".$i;
			$textM = "optText".$i; 
			if (strlen($text) != 0) { 
				if (strlen($link) === 0) {
					$errors++; 
					$this->data[$linkM] = '<span style="color: #d9534f">*This feild is required</span>';
				}
			}elseif (strlen($link) != 0) {
				if (strlen($text) === 0) {
					$errors++;
					$this->data[$textM] = '<span style="color: #d9534f">*This feild is required</span>';
				}
			} 
			if (strlen($text) > 100) {
				$errors++; 
				$this->data[$textM] = '<span style="color: #d9534f">*Option text is too long</span>';
			} 
			if (strlen($link) > 200) {
				$errors++; 
				$this->data[$linkM] = '<span style="color: #d9534f">*Option link is too long</span>';
			}
		} 

		for($i=1;$i<=5;$i++){ 
			$img = "image".$i;
			$img = "img".$i;
			$msg = "imgMsg".$i;
			if (in_array($_FILES[$img]['error'], [4])) {
				if (in_array($_FILES[$img]['error'], [1,3])) {
					$errors++; 
					$this->data[$msg] = '<span style="color: #d9534f">*Image failed to upload</span>';
				}elseif (!in_array($_FILES[$img]['type'], $this->acceptableImageTypes)) {
					$errors++; 
					$this->data[$msg] = '<span style="color: #d9534f">*You must upload a valid image</span>';
				}
			}
		} 

		if ($errors === 0) {
			$this->update();
		} 
	} 

	private function update(){ 
		$title = trim($_POST['title']); 
		$category = strtolower($_POST['category']);
		$supplier = strtolower($_POST['supplier']); 
		$description = trim($_POST['desc']); 
		for($i=1;$i<=10;$i++){
			$value = "feat_".$i; 
			${'feat'.$i} = trim($_POST[$value]); 
			$value = "opt_".$i; 
			${'opt'.$i} = trim($_POST[$value]); 
		}    
		for($i=1;$i<=5;$i++){
			$value = "opt_text_".$i; 
			${'optT'.$i} = trim($_POST[$value]); 
			$value = "opt_link_".$i; 
			${'optL'.$i} = trim($_POST[$value]);
			$value = "image".$i; 
			${'img'.$i} = $_FILES[$value]; 
		}   
		$id = $_GET['product']; 
		$sql = "UPDATE products SET title = '$title', category = '$category', supplier = '$supplier', 	description = '$description' WHERE id = '$id'";	 
		$this->dbc->query($sql); 
		//update option and features 
		for($i=1;$i<=10;$i++){
			if(${'feat'.$i} != ''){ 
				$sql = "UPDATE product_features SET feature = '${'feat'.$i}', position = '$i' WHERE product_id = '$id'"; 
				$this->dbc->query($sql);
			} 
			if(${'opt'.$i} != ''){
				$sql = "UPDATE product_options SET product_option = '${'opt'.$i}', position = '$i' WHERE product_id = 'id'";  
			}
		} 
		for($i=1;$i<=5;$i++){  
			if (${'optT'.$i} != '') {
				$sql  = "UPDATE";
			}
		}  
		
	}

 
}