<?php  
class ChairsController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->data['title'] = 'Seating';  
	}  
	public function buildHTML(){ 
		echo $this->plates->render('producttransition', $this->data); 
	} 
}