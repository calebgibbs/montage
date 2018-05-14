<?php  
class PortfolioController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc;  
		$this->getData();
	}  
	public function buildHTML(){ 
		echo $this->plates->render('portfolio', $this->data);
	}  
	private function getData(){ 
		$pageId = $this->dbc->real_escape_string($_GET['num']);  
		$sql = "SELECT * FROM portfolios WHERE id = '$pageId'"; 
		$result = $this->dbc->query($sql); 
		//get description in paragraphs 
		$sql = "SELECT description FROM portfolios WHERE id = '$pageId'"; 
		// die($sql);
		$p = $this->dbc->query($sql); 
		if( !$result || $result->num_rows == 0) { 
			header('Location: index.php?page=404');
		}else {  
			$p = $p->fetch_assoc(); 
			$desc = $p['description']; 
			$arr = explode("\n", $desc); 
			$description = array(); 
			foreach( $arr as $d ){ 
				if(strlen(trim($d)) != 0){ 
					array_push($description, $d);
				}
			}  
			$this->data['desc'] = $description;
			$this->data['port'] = $result->fetch_assoc();
		}  
		$sql = "SELECT image, image_position FROM portfolio_images WHERE portfolio_id = '$pageId'"; 
		$result = $this->dbc->query($sql); 
		$this->data['Allimages'] = $result->fetch_all(MYSQLI_ASSOC);
	}
}