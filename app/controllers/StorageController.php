<?php  
class StorageController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->data['title'] = 'Storage'; 
	}  
	public function buildHTML(){ 
		echo $this->plates->render('producttransition', $this->data); 
	} 
}