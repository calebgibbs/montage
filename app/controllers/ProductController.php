<?php  
class ProductController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->getProductData();
	}  
	public function buildHTML(){ 
		echo $this->plates->render('product', $this->data);
	} 

	private function getProductData(){
		$productId = $this->dbc->real_escape_string( $_GET['productnum'] ); 
		$sql = "SELECT title, description, category FROM products WHERE id = '$productId'";
		$result = $this->dbc->query($sql);  
		if( !$result || $result->num_rows == 0) { 
			header('Location: index.php?page=404');
		}else {  
			$this->data['product'] = $result->fetch_assoc();
		} 
		//get product features
		$sql = "SELECT feature, position FROM product_features WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql);
		$this->data['Allfeatures'] = $result->fetch_all(MYSQLI_ASSOC); 

		//get prodcut options 
		$sql = "SELECT product_option, position FROM product_options WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql);
		$this->data['Alloptions'] = $result->fetch_all(MYSQLI_ASSOC); 

		//get images  
		$sql = "SELECT image, image_position FROM images WHERE product_id = '$productId'";
		$result = $this->dbc->query($sql);
		$this->data['Allimages'] = $result->fetch_all(MYSQLI_ASSOC);
	} 
}