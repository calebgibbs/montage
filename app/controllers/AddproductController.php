<?php  
class AddproductController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->privatePage(); 
		if(isset($_POST['addProduct'])){ 
			$this->validateForm();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('addproduct', $this->data);
	} 

	private function validateForm(){ 
		$title = $_POST['title']; 
		$cateogry = $_POST['category'];
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
			$this->ProcessProduct();
		}
	}  

	private function ProcessProduct(){ 
		die('processing');
	}
} 
