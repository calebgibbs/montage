<?php  
class SearchController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->getTerm();  
	}  
	public function buildHTML(){ 
		echo $this->plates->render('grid', $this->data);	 
	} 
	private function getTerm(){ 
		if (!isset($_GET['s'])) {
			if (strlen(trim($_POST['s'])) != 0) {
				$term = trim(strtolower($_POST['s']));
				header('Location: index.php?page=search&s='.$term);
			}else{ 
				$previous = $_SERVER['HTTP_REFERER']; 
				if( $previous == 'index.php?page=error404' ){ 
					$previous = 'index.php?page=home';
				} 
				header('Location: '.$previous);	
			}
		}else{ 
			$this->search();
		}
	}
	private function search(){ 
		$search = $this->dbc->real_escape_string(trim($_GET['s'])); 
		$this->data['title'] = ucfirst($search); 
		$this->data['class'] = 'search-title';  
		$sql = "SELECT p.id, p.supplier, p.title AS score_title, p.category AS score_category
				i.product_id, i.image, i.image_position 
				FROM products AS p 
				JOIN product_images AS i 
				ON p.id = i.product_id
				WHERE 
				p.title LIKE '%$search%' 
				OR p.description LIKE '%$search%' 
				OR p.category LIKE '%$search%'  
				AND i.image_position = 1
				ORDER BY score_title ASC";    
		die($sql);
		$result = $this->dbc->query($sql); 

		if (!$result || $result->num_rows == 0) {
			$this->data['results'] = "No results";
		}else{
			$this->data['results'] = $result->fetch_all(MYSQLI_ASSOC);
		} 
	}
}