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
		if( !$result || $result->num_rows == 0) { 
			header('Location: index.php?page=404');
		}else {  
			$this->data['port'] = $result->fetch_assoc();
		}  
		$sql = "SELECT image, image_position FROM portfolio_images WHERE portfolio_id = '$pageId'"; 
		$result = $this->dbc->query($sql); 
		$this->data['Allimages'] = $result->fetch_all(MYSQLI_ASSOC);
	}
}