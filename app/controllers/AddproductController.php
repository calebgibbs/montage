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
		$totalErrors = 0;  
		$title = trim($_POST['title']); 
		$brand = trim($_POST['brand']); 
		$mianDesc = trim($_POST['desc']); 
		$desc1 = trim($_POST['bp1']); 
		$desc2 = trim($_POST['bp2']);
		$desc3 = trim($_POST['bp3']);
		$desc4 = trim($_POST['bp4']); 
		$desc5 = trim($_POST['bp5']);
		$cat = $_POST['category']; 

		if (strlen($title) == 0 ) {
			$this->data['titleMessage'] = '<span class="invalid-msg">This feild is required</span>';
			$totalErrors = 0;
		}else if( strlen($title) > 150 ){ 
			$this->data['titleMessage'] = '<span class="invalid-msg">The title is too long</span>';
			$totalErrors = 0;
		} 
		if (strlen($brand) == 0 ) {
			$this->data['brandMessage'] = '<span class="invalid-msg">This feild is required</span>';
			$totalErrors = 0;
		}else if( strlen($brand) > 150 ){ 
			$this->data['brandMessage'] = '<span class="invalid-msg">The brand name is too long</span>';
			$totalErrors = 0;
		} 
		if (strlen($mianDesc) == 0 ) {
			$this->data['descMessage'] = '<span class="invalid-msg">This feild is required</span>';
			$totalErrors = 0;
		}else if( strlen($mianDesc) > 1000 ){ 
			$this->data['descMessage'] = '<span class="invalid-msg">The description is too long</span>';
			$totalErrors = 0;
		}
		if (strlen($desc1) == 0 ) {
			$this->data['desc1Message'] = '<span class="invalid-msg">This feild is required</span>';
			$totalErrors = 0;
		}else if( strlen($desc1) > 400 ){ 
			$this->data['desc1Message'] = '<span class="invalid-msg">The description is too long</span>';
			$totalErrors = 0;
		}
		if (strlen($desc2) == 0 ) {
			$this->data['desc2Message'] = '<span class="invalid-msg">This feild is required</span>';
			$totalErrors = 0;
		}else if( strlen($desc2) > 400 ){ 
			$this->data['desc2Message'] = '<span class="invalid-msg">The description is too long</span>';
			$totalErrors = 0;
		} 

		if( strlen($desc3) > 400 ){ 
			$this->data['desc3Message'] = '<span class="invalid-msg">The description is too long</span>';
			$totalErrors = 0;
		} 
		if( strlen($desc4) > 400 ){ 
			$this->data['desc3Message'] = '<span class="invalid-msg">The description is too long</span>';
			$totalErrors = 0;
		}
		if( strlen($desc5) > 400 ){ 
			$this->data['desc3Message'] = '<span class="invalid-msg">The description is too long</span>';
			$totalErrors = 0;
		} 
		if( isset($_POST['category']) && $_POST['category'] == '0') {
			$this->data['selectError'] = 'class="select-error"';
			$totalErrors = 0;
		}  

		if ($totalErrors == 0) {
			$this->processFrom();
		}

	} 
	private function processFrom(){ 
		
	}
}