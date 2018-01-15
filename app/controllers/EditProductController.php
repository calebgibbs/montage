<?php  
class EditProductController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc;  
		if ($_SESSION['account_type'] != 'admin') {
			header('Location: index.php?page=404');
		}
		$this->getData(); 
		if (isset($_POST['makeChanges'])) {
			$this->validateForm();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('editProduct', $this->data); 
	} 

	private function getData(){ 
		$productId = $_GET['product']; 
		//get main data 
		$sql = "SELECT id, title, description, category FROM products WHERE id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		if( !$result || $result->num_rows == 0) { 
			header('Location: index.php?page=404');
		}else {  
			$this->data['product'] = $result->fetch_assoc();
		}

		//get features 
		$sql = "SELECT id, product_id, feature FROM product_features WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		$this->data['allFeatures'] = $result->fetch_all(MYSQLI_ASSOC); 
		$loopCounter = 0;
		foreach( $this->data['allFeatures'] as $feature ){ 
			$loopCounter++; 
			$this->data['feature'.$loopCounter] = $feature;
		}
		
		//get options 
		$sql = "SELECT id, product_id, product_option FROM product_options WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		$this->data['allOptions'] = $result->fetch_all(MYSQLI_ASSOC); 
		$loopCounter = 0;  
		foreach( $this->data['allOptions'] as $option ){ 
			$loopCounter++; 
			$this->data['option'.$loopCounter] = $option;
		}
		//get images 
		$sql = "SELECT id, product_id, image FROM images WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		$this->data['images'] = $result->fetch_all(MYSQLI_ASSOC); 
		$loopCounter = 0;
		foreach($this->data['images'] as $image){ 
			$loopCounter++; 
			$this->data['image'.$loopCounter] = $image;
		}
	} 

	private function validateForm(){ 
		$title = $_POST['title']; 
		$desc = $_POST['desc'];
		$feat1 = $_POST['feat_1']; 
		$feat2 = $_POST['feat_2'];
		$feat3 = $_POST['feat_3'];
		$option1 = $_POST['opt_1'];
		$option2 = $_POST['opt_2'];
		$option3 = $_POST['opt_3'];  
		$errors = 0; 

		if (strlen($title) == 0) {
			$this->data['titleMessage'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;
		} 

		if(strlen($title) > 50){ 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*Title is too long</span>'; 
			$errors++;	
		} 

		if( isset($_POST['category']) && $_POST['category'] == '0' ){ 
			$this->data['categoryError'] = 'style="background: #d9534f"';	
			$errors++;
		} 

		if (strlen($desc) == 0) {
			$this->data['descMessage'] = '<span style="color: #d9534f">This feild is required</span>'; 
			$errors++;	
		} 

		if (strlen($desc) > 1000) {
			$this->data['descMessage'] = '<span style="color: #d9534f">*Description is too long</span>'; 
			$errors++;	
		} 

		if (strlen($feat1) == 0) {
			$this->data['feat1Message'] = '<span style="color: #d9534f">This feild is required</span>'; 
			$errors++;	
		} 

		if (strlen($feat1) > 100) {
			$this->data['feat1Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}

		if (strlen($feat2) == 0) {
			$this->data['feat2Message'] = '<span style="color: #d9534f">This feild is required</span>'; 
			$errors++;	
		} 

		if (strlen($feat2) > 100) {
			$this->data['feat2Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if (strlen($feat3) == 0) {
			$this->data['feat3Message'] = '<span style="color: #d9534f">This feild is required</span>'; 
			$errors++;	
		} 

		if (strlen($feat3) > 100) {
			$this->data['feat3Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}
		if (strlen($_POST['feat_4']) > 100) {
			$this->data['feat4Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}
		if (strlen($_POST['feat_5']) > 100) {
			$this->data['feat5Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}
		if (strlen($_POST['feat_6']) > 100) {
			$this->data['feat6Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if (strlen($_POST['feat_7']) > 100) {
			$this->data['feat7Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if (strlen($_POST['feat_8']) > 100) {
			$this->data['feat8Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if (strlen($_POST['feat_9']) > 100) {
			$this->data['feat9Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}
		if (strlen($_POST['feat_10']) > 100) {
			$this->data['feat10Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if(strlen($option1) == 0){ 
			$this->data['opt1Message'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;	
		} 
		if(strlen($option1) > 100){ 
			$this->data['opt1Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($option2) == 0){ 
			$this->data['opt2Message'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;	
		} 
		if(strlen($option2) > 100){ 
			$this->data['opt2Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($option3) == 0){ 
			$this->data['opt3Message'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;	
		} 
		if(strlen($option3) > 100){ 
			$this->data['opt3Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_4']) > 100){ 
			$this->data['opt4Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_5']) > 100){ 
			$this->data['opt5Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		}
		if(strlen($_POST['opt_6']) > 100){ 
			$this->data['opt6Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		}
		if(strlen($_POST['opt_7']) > 100){ 
			$this->data['opt7Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_8']) > 100){ 
			$this->data['opt8Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_9']) > 100){ 
			$this->data['opt9Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_10']) > 100){ 
			$this->data['opt10Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if ($errors == 0) {
			$this->makeChanges();
		}
	} 

	private function makeChanges(){ 
		//filter all data
		$productId = $_GET['product']; 
		$ntitle = $this->dbc->real_escape_string($_POST['title']); 
		$nCategory = $_POST['category']; 
		$nDesc = $this->dbc->real_escape_string($_POST['desc']); 
		for( $i = 1; $i <= 10; $i++){ 
			${'nF'.$i} = $this->dbc->real_escape_string($_POST['feat_'.$i]);  
		} 
		for( $i = 1; $i <= 10; $i++){ 
			${'nO'.$i} = $this->dbc->real_escape_string($_POST['opt_'.$i]);  
		} 
		//get id for product options and features
		$loopCounter = 0; 
		foreach( $this->data['allFeatures'] as $feature ){ 
			$loopCounter++; 
			$this->data['feature'.$loopCounter] = $feature; 
			${'Fid'.$loopCounter} = $feature['id'];  
		}  
		$loopCounter = 0; 
		foreach( $this->data['allOptions'] as $option ){ 
			$loopCounter++; 
			$this->data['option'.$loopCounter] = $option; 
			${'Oid'.$loopCounter} = $option['id'];
		}  

		//update product table  
		$sql = "UPDATE products 
				SET title = '$ntitle', description = '$nDesc', category = '$nCategory' 
				WHERE id = '$productId'"; 
		$this->dbc->query($sql);  

		//update features table
		for($i = 1; $i <= 10; $i++){
			$value = ${'nF'.$i}; 
			$id = ${'Fid'.$i};  
			$sql = "UPDATE product_features SET feature = '$value' WHERE id = '$id'"; 
			$this->dbc->query($sql);   	
		} 

		for($i = 1; $i <= 10; $i++){
			$value = ${'nO'.$i}; 
			$id = ${'Oid'.$i};  
			$sql = "UPDATE product_options SET product_option = '$value' WHERE id = '$id'"; 
			$this->dbc->query($sql);  	
		}  

		header('Location: index.php?page=product&productnum='.$productId);
	}
}