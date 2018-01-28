<?php  
class WorkstationsScreensController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->results();  
	}  
	public function buildHTML(){ 
		echo $this->plates->render('grid', $this->data); 
	} 
	private function results(){ 
		$lastPage = $_SERVER['HTTP_REFERER'];
		//links to be changed 
		if ($lastPage == 'index.php?page=error404') {
			$lastPage = 'index.php';
		}  

		$this->data['title'] = 'Workstations + Screens'; 
		$this->data['class'] = 'workstations-title'; 

		$sql = "SELECT p.id, p.title AS score_title, p.category, 
				i.product_id, i.image, i.image_position 
				FROM products AS p 
				JOIN images AS i 
				ON p.id = i.product_id
				WHERE 
				image_position = '1'
				AND category = 'workstation' 
				OR category = 'screen'"; 
		$result = $this->dbc->query($sql); 

		if (!$result || $result->num_rows == 0) {
			$this->data['results'] = "No results";
		}else{
			$this->data['results'] = $result->fetch_all(MYSQLI_ASSOC);
		} 		
	}
}