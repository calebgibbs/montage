<?php  
class AgileFurnitureController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->data['title'] = 'Agile Furniture';  
	}  
	public function buildHTML(){ 
		echo $this->plates->render('producttransition', $this->data); 
	} 
}