<?php  
class MyAccountController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->privatePage(); 
		$this->dbc = $dbc;
	}  
	public function buildHTML(){ 
		echo $this->plates->render('myaccount'); 
	}
}