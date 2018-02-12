<?php 
use Intervention\Image\ImageManager; 
class AddproductController extends PageController { 
	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->privatePage(); 
		if(isset($_POST['addProduct'])){ 
			$this->validateForm();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('addproduct', $this->data);
	} 
	private function validateForm(){ 
		$title = $_POST['title']; 
		$desc = $_POST['desc'];
		$feat1 = $_POST['feat_1']; 
		$feat2 = $_POST['feat_2'];
		$feat3 = $_POST['feat_3'];
		$option1 = $_POST['opt_1'];
		$option2 = $_POST['opt_2'];
		$option3 = $_POST['opt_3'];  
		$errors = 0; 
		if (strlen($title) == 0) {
			$this->data['titleMessage'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;
		} 
		if(strlen($title) > 50){ 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*Title is too long</span>'; 
			$errors++;	
		} 
		if( isset($_POST['category']) && $_POST['category'] == '0' ){ 
			$this->data['categoryError'] = 'style="background: #d9534f"';	
			$errors++;
		} 
		if (strlen($desc) == 0) {
			$this->data['descMessage'] = '<span style="color: #d9534f">This feild is required</span>'; 
			$errors++;	
		} 
		if (strlen($desc) > 1000) {
			$this->data['descMessage'] = '<span style="color: #d9534f">*Description is too long</span>'; 
			$errors++;	
		} 
		if (strlen($feat1) == 0) {
			$this->data['feat1Message'] = '<span style="color: #d9534f">This feild is required</span>'; 
			$errors++;	
		} 
		if (strlen($feat1) > 300) {
			$this->data['feat1Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}
		if (strlen($feat2) > 300) {
			$this->data['feat2Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if (strlen($feat3) > 300) {
			$this->data['feat3Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}
		if (strlen($_POST['feat_4']) > 300) {
			$this->data['feat4Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}
		if (strlen($_POST['feat_5']) > 300) {
			$this->data['feat5Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}
		if (strlen($_POST['feat_6']) > 300) {
			$this->data['feat6Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if (strlen($_POST['feat_7']) > 300) {
			$this->data['feat7Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if (strlen($_POST['feat_8']) > 300) {
			$this->data['feat8Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if (strlen($_POST['feat_9']) > 300) {
			$this->data['feat9Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		}
		if (strlen($_POST['feat_10']) > 300) {
			$this->data['feat10Message'] = '<span style="color: #d9534f">*Feature is too long</span>'; 
			$errors++;	
		} 
		if(strlen($option1) == 0){ 
			$this->data['opt1Message'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;	
		} 
		if(strlen($option1) > 300){ 
			$this->data['opt1Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($option2) == 0){ 
			$this->data['opt2Message'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;	
		} 
		if(strlen($option2) > 300){ 
			$this->data['opt2Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		}  
		if(strlen($option3) > 300){ 
			$this->data['opt3Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_4']) > 300){ 
			$this->data['opt4Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_5']) > 300){ 
			$this->data['opt5Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		}
		if(strlen($_POST['opt_6']) > 300){ 
			$this->data['opt6Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		}
		if(strlen($_POST['opt_7']) > 300){ 
			$this->data['opt7Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_8']) > 300){ 
			$this->data['opt8Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_9']) > 300){ 
			$this->data['opt9Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if(strlen($_POST['opt_10']) > 300){ 
			$this->data['opt10Message'] = '<span style="color: #d9534f">*Option is too long</span>'; 
			$errors++;	
		} 
		if( in_array( $_FILES['image1']['error'], [1,3,4] ) ) {
			$this->data['image1message'] = '<span style="color: #d9534f">*Image failed to upload</span>';
			$errors++; 
		}elseif( !in_array( $_FILES['image1']['type'], $this->acceptableImageTypes ) ) {  
			$this->data['image1message'] = '<span style="color: #d9534f">*You must upload a valid image</span>'; 
			$errors++;
		}
		if( in_array( $_FILES['image2']['error'], [1,3] ) ) {
			$this->data['image2message'] = '<span style="color: #d9534f">*Image failed to upload</span>';
			$errors++; 
		}elseif( !in_array( $_FILES['image2']['type'], $this->acceptableImageTypes ) ) {  
			$this->data['image2message'] = '<span style="color: #d9534f">*You must upload a valid image</span>'; 
			$errors++;
		}
		if( in_array( $_FILES['image3']['error'], [1,3] ) ) {
			$this->data['image3message'] = '<span style="color: #d9534f">*Image failed to upload</span>';
			$errors++; 
		}elseif( !in_array( $_FILES['image3']['type'], $this->acceptableImageTypes ) ) {  
			$this->data['image3message'] = '<span style="color: #d9534f">*You must upload a valid image</span>'; 
			$errors++;
		}
		if( in_array( $_FILES['image4']['error'], [1,3] ) ) {
			$this->data['image4message'] = '<span style="color: #d9534f">*Image failed to upload</span>';
			$errors++; 
		}elseif( !in_array( $_FILES['image4']['type'], $this->acceptableImageTypes ) ) {  
			$this->data['image4message'] = '<span style="color: #d9534f">*You must upload a valid image</span>'; 
			$errors++;
		}
		if( in_array( $_FILES['image5']['error'], [1,3] ) ) {
			$this->data['image5message'] = '<span style="color: #d9534f">*Image failed to upload</span>';
			$errors++; 
		}elseif( !in_array( $_FILES['image5']['type'], $this->acceptableImageTypes ) ) {  
			$this->data['image5message'] = '<span style="color: #d9534f">*You must upload a valid image</span>'; 
			$errors++;
		}
		if ($errors == 0) {
			$this->ProcessProduct();
		}
	}  
	private function ProcessProduct(){ 
		$title = $this->dbc->real_escape_string($_POST['title']);
		$desc = $this->dbc->real_escape_string($_POST['desc']);
		$category = $this->dbc->real_escape_string($_POST['category']);
		$sql = "INSERT INTO products(title, description, category) VALUES('$title', '$desc', '$category')";  
		$this->dbc->query($sql); 
		$sql = "SELECT id FROM products WHERE title = '$title' AND description = '$desc' AND category = '$category'"; 
		$result = $this->dbc->query($sql); $productId = $result->fetch_assoc();  
		
		$productId = $productId['id'];   
		$feat1 = $this->dbc->real_escape_string($_POST['feat_1']); 
		$feat2 = $this->dbc->real_escape_string($_POST['feat_2']); 
		$feat3 = $this->dbc->real_escape_string($_POST['feat_3']);
		$feat4 = $this->dbc->real_escape_string($_POST['feat_4']);
		$feat5 = $this->dbc->real_escape_string($_POST['feat_5']);
		$feat6 = $this->dbc->real_escape_string($_POST['feat_6']);
		$feat7 = $this->dbc->real_escape_string($_POST['feat_7']);
		$feat8 = $this->dbc->real_escape_string($_POST['feat_8']);
		$feat9 = $this->dbc->real_escape_string($_POST['feat_9']);
		$feat10 = $this->dbc->real_escape_string($_POST['feat_10']); 
		for($i = 1; $i <= 10; $i++){ 
			if(${'feat'.$i} != ''){ 
				$sql = "INSERT INTO product_features(product_id, feature, position) VALUES('$productId', '${'feat'.$i}', '$i')"; 
				$this->dbc->query($sql);
			}
		} 
		$option1 = $this->dbc->real_escape_string($_POST['opt_1']);
		$option2 = $this->dbc->real_escape_string($_POST['opt_2']);
		$option3 = $this->dbc->real_escape_string($_POST['opt_3']);
		$option4 = $this->dbc->real_escape_string($_POST['opt_4']);
		$option5 = $this->dbc->real_escape_string($_POST['opt_5']);
		$option6 = $this->dbc->real_escape_string($_POST['opt_6']);
		$option7 = $this->dbc->real_escape_string($_POST['opt_7']);
		$option8 = $this->dbc->real_escape_string($_POST['opt_8']);
		$option9 = $this->dbc->real_escape_string($_POST['opt_9']);
		$option10 = $this->dbc->real_escape_string($_POST['opt_10']); 
		for($i = 1; $i <= 10; $i++){ 
			if(${'option'.$i} != ''){ 
				$sql = "INSERT INTO product_options(product_id, product_option, position) VALUES('$productId', '${'option'.$i}', '$i')"; 
				$this->dbc->query($sql);
			}
		}  
		$image1 = $_FILES['image1'];
		$image2 = $_FILES['image2'];
		$image3 = $_FILES['image3'];
		$image4 = $_FILES['image4'];
		$image5 = $_FILES['image5']; 
		for($i = 1; $i <= 5; $i++){ 
			if(!in_array(${'image'.$i}['error'],[4])) {
				$manager = new ImageManager();
				$image = $manager->make( ${'image'.$i}['tmp_name'] );   
				$fileExtension = $this->getFileExtension( $image->mime() ); 
				$fileName = uniqid(); 
				$image->resize(250, 150); 
				$image->save("img/products/thumbnail/$fileName$fileExtension");  
				$image->resize(770, 400); 
				$image->save("img/products/large/$fileName$fileExtension"); 
				$sql = "INSERT INTO product_images(product_id, image, image_position) VALUES( '$productId', '$fileName$fileExtension', '$i' )";  
				$this->dbc->query($sql);
			}
		}  
		
		if($this->dbc->affected_rows) { 
				//locate to new page 
				header('Location: index.php?page=product&productnum='.$productId);
				
			}else { 
				$this->data['failMessage'] = '<h2 style="color: #d9534f"><b>Something went wrong! <br />
				<i>The product could not be processed at this time <br />
				Please try again later</i></b></h2>'; 		
			}
	} 
	private function getFileExtension( $mimeType ) {
		switch($mimeType) {
			case 'image/png':
				return '.png';
			break;
			case 'image/gif':
				return '.gif';
			break;
			case 'image/jpeg':
				return '.jpg';
			break;
			case 'image/bmp':
				return '.bmp';
			break;
			case 'image/tiff':
				return '.tif';
			break;
		}
	}
}