<?php  
class EditProductController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc;  
		if ($_SESSION['account_type'] != 'admin') {
			header('Location: index.php?page=404');
		}
		$this->getData();
	}  
	public function buildHTML(){ 
		echo $this->plates->render('editProduct', $this->data); 
	} 

	private function getData(){ 
		$productId = $_GET['product']; 
		//get main data 
		$sql = "SELECT id, title, description, category FROM products WHERE id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		if( !$result || $result->num_rows == 0) { 
			header('Location: index.php?page=404');
		}else {  
			$this->data['product'] = $result->fetch_assoc();
		}

		//get features 
		$sql = "SELECT id, product_id, feature FROM product_features WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		$this->data['allFeatures'] = $result->fetch_all(MYSQLI_ASSOC); 
		$loopCounter = 0;
		foreach( $this->data['allFeatures'] as $feature ){ 
			$loopCounter++; 
			$this->data['feature'.$loopCounter] = $feature;
		}
		
		//get options 
		$sql = "SELECT id, product_id, product_option FROM product_options WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		$this->data['allOptions'] = $result->fetch_all(MYSQLI_ASSOC); 
		$loopCounter = 0;  
		foreach( $this->data['allOptions'] as $option ){ 
			$loopCounter++; 
			$this->data['option'.$loopCounter] = $option;
		}
		//get images 
		$sql = "SELECT id, product_id, image FROM images WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		$this->data['images'] = $result->fetch_all(MYSQLI_ASSOC); 
		$loopCounter = 0;
		foreach($this->data['images'] as $image){ 
			$loopCounter++; 
			$this->data['image'.$loopCounter] = $image;
		}
	}
}
