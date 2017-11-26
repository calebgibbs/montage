<?php  
class HomeController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc;
	}  
	public function buildHTML(){ 
		echo $this->plates->render('home');
	}
}