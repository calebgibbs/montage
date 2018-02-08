<?php  
class PortfoliosController extends PageController { 
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

		$this->data['title'] = 'Portfolio'; 
		$this->data['class'] = 'downloads-title'; 

		$sql = "SELECT p.id, p.title AS score_title, 
				i.portfolio_id, i.image, i.image_position 
				FROM portfolios AS p 
				JOIN portfolio_images AS i 
				ON p.id = i.portfolio_id
				WHERE image_position = '1'"; 
				// die($sql);
		$result = $this->dbc->query($sql); 

		if (!$result || $result->num_rows == 0) {
			$this->data['results'] = "No portfolios";
		}else{
			$this->data['results'] = $result->fetch_all(MYSQLI_ASSOC);
		} 

		
	}
}