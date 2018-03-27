<?php  
class ProductController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->getProductData(); 
		if (isset($_GET['delete'])) {
			$this->deleteProduct();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('product', $this->data);
	} 

	private function getProductData(){
		$productId = $this->dbc->real_escape_string( $_GET['productnum'] ); 
		$sql = "SELECT title, description, category, supplier FROM products WHERE id = '$productId'";
		$result = $this->dbc->query($sql);  
		if( !$result || $result->num_rows == 0) { 
			header('Location: index.php?page=404');
		}else {  
			$this->data['product'] = $result->fetch_assoc();
		} 
		//get product features
		$sql = "SELECT feature, position FROM product_features WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql);
		if(!$result || $result->num_rows == 0){ 
			$this->data['Allfeatures'] = 'noFeatures';
		}else{ 
			$this->data['Allfeatures'] = $result->fetch_all(MYSQLI_ASSOC);
		} 

		//get prodcut options 
		$sql = "SELECT product_option, position FROM product_options WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		if(!$result || $result->num_rows == 0){ 
			$this->data['Alloptions'] = 'noOptions';
		}else{ 
			$this->data['Alloptions'] = $result->fetch_all(MYSQLI_ASSOC);
		}
		//get images  
		$sql = "SELECT image, image_position FROM product_images WHERE product_id = '$productId'";
		$result = $this->dbc->query($sql);
		$this->data['Allimages'] = $result->fetch_all(MYSQLI_ASSOC);

		//get links 
		$sql = "SELECT href, link_text, position FROM product_links WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		if(!$result || $result->num_rows == 0){ 
			$this->data['links'] = 'noLinks';
		}else{ 
			$this->data['links'] = $result->fetch_all(MYSQLI_ASSOC);
		}  
		//get dim
		$sql = "SELECT dimension_type, dimension, position FROM product_dimensions WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		if(!$result || $result->num_rows == 0){ 
			$this->data['dim'] = 'noDim';
		}else{ 
			$this->data['dim'] = $result->fetch_all(MYSQLI_ASSOC);
		}
		//get downloads
		$sql = "SELECT download_link, title, position FROM downloads WHERE product_id = '$productId'"; 
		$result = $this->dbc->query($sql); 
		if(!$result || $result->num_rows == 0){ 
			$this->data['downloads'] = 'noDwn'; 
		}else{ 
			$this->data['downloads'] = $result->fetch_all(MYSQLI_ASSOC);	
		}

		
	} 

	private function deleteProduct(){ 
		$productId = $this->dbc->real_escape_string($_GET['productnum']);
		if($_SESSION['account_type'] == 'admin') {
		
			$sql = "SELECT id, image FROM images WHERE product_id = '$productId'"; 
			$result = $this->dbc->query($sql); 
			if( !$result || $result->num_rows == 0 ) {
				return;
			}
 			
 			$images = $result->fetch_all(MYSQLI_ASSOC); 

 			foreach ($images as $image) {
 				$filename = $image['image']; 
				unlink("img/products/large/$filename");
 				unlink("img/products/thumbnail/$filename"); 
 			}  

 			$sql = "DELETE FROM products WHERE id = '$productId'"; 
 			$this->dbc->query($sql); 

 			header('Location: index.php?page=home');

		}else{ 
			header('Location: index.php?page=product&productnum='.$productId);
		}
	} 
}