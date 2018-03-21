<?php  
class JoineryAndCustomController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->data['title'] = 'Joinery &#43; Custom Furniture';  
	}  
	public function buildHTML(){ 
		echo $this->plates->render('producttransition', $this->data); 
	} 
}