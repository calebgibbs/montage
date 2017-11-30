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
		echo $this->plates->render('addproduct');
	} 

	private function validateForm(){ 
		$totalErrors = 0;  
		

	}
}