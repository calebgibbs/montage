<?php  
class ManageProductsController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->privatePage(); 
		$this->dbc = $dbc; 
		$this->getAllProducts();
	}  
	public function buildHTML(){ 
		echo $this->plates->render('manageproducts', $this->data); 
	} 

	private function getAllProducts(){ 
		$sql = "SELECT id, title, description, category FROM products"; 
		$result = $this->dbc->query($sql); 
		$this->data['allProducts'] = $result->fetch_all(MYSQLI_ASSOC); 
		// echo "<pre>"; 
		// print_r($data['allProducts'])
		// echo "</pre>";  
 	}
}