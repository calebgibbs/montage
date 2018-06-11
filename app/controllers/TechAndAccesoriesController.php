<?php  
class TechAndAccesoriesController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->results();  
	}  
	public function buildHTML(){ 
		echo $this->plates->render('producttransition', $this->data); 
	} 
}