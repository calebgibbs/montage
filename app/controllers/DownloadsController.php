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

		$sql = "SELECT product_id FROM downloads"; 
		$results = $this->dbc->query($sql); 
		if($results->num_rows != 0){ 
			$results = $results->fetch_all(MYSQLI_ASSOC); 
			
			$prodStr = "";
			$products = array();

			foreach( $results as $result ){ 
				$prod = $result['product_id'];
				if( !in_array($prod, $products) ){ 
					array_push($products, $prod); 
					$prodStr .= $prod.', ';
				}
			} 

			$ids = trim($prodStr); $ids = substr($ids, 0, -1);

			$sql = "SELECT p.id, p.title AS score_title, p.category, p.category2, p.supplier, 
			i.product_id, i.image, i.image_position 
			FROM products AS p 
			JOIN product_images AS i 
			ON p.id = i.product_id
			WHERE 
			p.id IN ($ids) 
			AND image_position = '1'";   
			
			$result = $this->dbc->query($sql); 

			if (!$result || $result->num_rows == 0) {
				$this->data['results'] = "No results";
			}else{
				$this->data['results'] = $result->fetch_all(MYSQLI_ASSOC);
			}

		}

		
	}
} 