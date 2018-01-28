<?php  
class SearchController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->results();  
	}  
	public function buildHTML(){ 
		// echo $this->plates->render('search', $this->data);
		echo $this->plates->render('grid', $this->data); 
	} 
	private function results(){ 
		$lastPage = $_SERVER['HTTP_REFERER'];
		//links to be changed 
		if ($lastPage == 'index.php?page=error404') {
			$lastPage = 'index.php';
		}  

		$search = trim($_POST['searchResult']); 
		$this->data['title'] = $search; 
		$this->data['class'] = 'search-title'; 

		if (strlen($search) === 0) {
			header('Location: '.$lastPage);
		}else { 

			$sql = "SELECT p.id, p.title AS score_title, p.category AS score_category,
					i.product_id, i.image, i.image_position 
					FROM products AS p 
					JOIN images AS i 
					ON p.id = i.product_id
					WHERE 
					p.title LIKE '%$search%' 
					OR p.description LIKE '%$search%' 
					OR p.category LIKE '%$search%' 
					AND i.image_position = 1
					ORDER BY score_title ASC";  
					// die($sql);
			$result = $this->dbc->query($sql); 

			if (!$result || $result->num_rows == 0) {
				$this->data['results'] = "No results";
			}else{
				$this->data['results'] = $result->fetch_all(MYSQLI_ASSOC);
			} 
			
		}
	}
}