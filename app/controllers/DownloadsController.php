<?php  
class DownloadsController extends PageController { 
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

		$this->data['title'] = 'Downloads'; 
		$this->data['class'] = 'downloads-title'; 

		$sql = "SELECT p.id, p.title, 
					i.product_id, i.image, i.image_position, 
					d.poduct_id, d.title 
				FROM products AS p 
				JOIN downloads AS d ON d.product_id = p.id";
		die($sql);
		$result = $this->dbc->query($sql); 

		if (!$result || $result->num_rows == 0) {
			$this->data['results'] = "No results";
		}else{
			$this->data['results'] = $result->fetch_all(MYSQLI_ASSOC);
		} 

		
	}
}