<?php  
class ContactController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->getManagers();
	}  
	public function buildHTML(){ 
		echo $this->plates->render('contact', $this->data); 
	} 
	private function getManagers(){ 
		$sql = "SELECT name, email, phone FROM managers"; 
		$result = $this->dbc->query($sql); 
		if($result->num_rows != 0){ 
			$this->data['managers'] = $result->fetch_all(MYSQLI_ASSOC);
		}
	}
}