<?php 
use Intervention\Image\ImageManager; 
class AddproductController extends PageController { 
	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->privatePage(); 
		$this->getSelects();
		if(isset($_POST['addProduct'])){ 
			$this->validateForm();
		} 
	}  
	public function buildHTML(){ 
		echo $this->plates->render('addproduct', $this->data);
	} 
	
	private function getSelects(){ 
		//get suppliers 
		$sql = "SELECT SUBSTRING(COLUMN_TYPE,5) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='montage' AND TABLE_NAME='products' AND COLUMN_NAME='supplier'"; 
		$result = $this->dbc->query($sql);  
		if ($result) {
			$result = $result->fetch_assoc(); 
			$result = $result['SUBSTRING(COLUMN_TYPE,5)']; 
			$result = str_replace("(","",$result); 
			$result = str_replace(")","",$result);
			$result = str_replace("'","",$result); 
			$info = explode(',', $result); 
			$this->data['suppliers'] = $info;
		}
	}
	private function validateForm(){ 
		$title = trim($_POST['title']); 
		$category = strtolower($_POST['category']);
		$supplier = strtolower($_POST['supplier']); 
		$description = trim($_POST['desc']); 
		for($i=1;$i<=10;$i++){
			$value = "feat_".$i; 
			${'feat'.$i} = trim($_POST[$value]); 
		}  
		for($i=1;$i<=10;$i++){
			$value = "opt_".$i; 
			${'opt'.$i} = trim($_POST[$value]); 
		}  
		for($i=1;$i<=5;$i++){
			$value = "opt_text_".$i; 
			${'optT'.$i} = trim($_POST[$value]); 
		} 
		for($i=1;$i<=5;$i++){
			$value = "opt_link_".$i; 
			${'optL'.$i} = trim($_POST[$value]); 
		}
		for($i=1;$i<=5;$i++){
			$value = "image".$i; 
			${'img'.$i} = $_FILES[$value]; 
		}  
		$errors = 0; 

		if (strlen($title) === 0) {
			$errors++; 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*This feild is required</span>'; 
		}elseif(strlen($title) > 50){ 
			$errors++; 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*Title is too long</span>';	
		} 

		if ($category == '0') {
			$errors++;
			$this->data['categoryError'] = 'style="background: #d9534f"';
		} 

		if ($supplier == '0') {
			$errors++;
			$this->data['supplierError'] = 'style="background: #d9534f"';
		} 

		if (strlen($description) === 0) {
			$errors++; 
			$this->data['descMessage'] = '<span style="color: #d9534f">*This feild is required</span>';
		}elseif(strlen($description) > 1000){ 
			$errors++; 
			$this->data['descMessage'] = '<span style="color: #d9534f">*Description is too long</span>';
		} 

		if (strlen($feat1) === 0) {
			$errors++; 
			$this->data['feat1Message'] = '<span style="color: #d9534f">*This feild is required</span>';
		}elseif(strlen($feat1) > 300){ 
			$errors++; 
			$this->data['feat1Message'] = '<span style="color: #d9534f">*Feature is too long</span>';
		} 

		for($i=2;$i<=10;$i++){ 
			$message = "feat".$i."Message"; 
			$feat = ${'feat'.$i};
			if (strlen($feat) > 300) {
				$errors++; 
				$this->data[$message] = '<span style="color: #d9534f">*Feature is too long</span>';	
			}
		} 

		if (strlen($opt1) === 0) {
			$errors++; 
			$this->data['opt1Message'] = '<span style="color: #d9534f">*This feild is too long</span>';	
		}elseif(strlen($opt1) > 300){
			$errors++; 
			$this->data['opt1Message'] = '<span style="color: #d9534f">*Option is too long</span>';
		} 

		for($i=2;$i<=10;$i++){ 
			$message = "opt".$i."Message"; 
			$opt = ${'opt'.$i}; 
			if (strlen($opt) > 300) {
				$errors++; 
				$this->data[$message] = '<span style="color: #d9534f">*Option is too long</span>';
			}
		} 

		for($i=1;$i<=5;$i++){
			$text = ${'optT'.$i}; 
			$link = ${'optL'.$i}; 
			$linkM = "optLink".$i;
			$textM = "optText".$i; 
			if (strlen($text) != 0) { 
				if (strlen($link) === 0) {
					$errors++; 
					$this->data[$linkM] = '<span style="color: #d9534f">*This feild is required</span>';
				}
			}elseif (strlen($link) != 0) {
				if (strlen($text) === 0) {
					$errors++;
					$this->data[$textM] = '<span style="color: #d9534f">*This feild is required</span>';
				}
			} 
			if (strlen($text) > 100) {
				$errors++; 
				$this->data[$textM] = '<span style="color: #d9534f">*Option text is too long</span>';
			} 
			if (strlen($link) > 200) {
				$errors++; 
				$this->data[$linkM] = '<span style="color: #d9534f">*Option link is too long</span>';
			}
		} 

		if (in_array($img1['error'], [4])) {
			$errors++;
			$this->data['imgMsg1'] = '<span style="color: #d9534f">*You must upload an image</span>';
		} 

		for($i=1;$i<=5;$i++){ 
			$img = "image".$i;
			$img = "img".$i;
			$msg = "imgMsg".$i;
			if (in_array($_FILES[$img]['error'], [4])) {
				if (in_array($_FILES[$img]['error'], [1,3])) {
					$errors++; 
					$this->data[$msg] = '<span style="color: #d9534f">*Image failed to upload</span>';
				}elseif (!in_array($_FILES[$img]['type'], $this->acceptableImageTypes)) {
					$errors++; 
					$this->data[$msg] = '<span style="color: #d9534f">*You must upload a valid image</span>';
				}
			}
		} 

		if ($errors === 0) {
			$this->ProcessProduct();
		} 

		
	}  
	private function ProcessProduct(){ 
		$title = trim($_POST['title']); 
		$category = strtolower($_POST['category']);
		$supplier = strtolower($_POST['supplier']); 
		$description = trim($_POST['desc']); 
		for($i=1;$i<=10;$i++){
			$value = "feat_".$i; 
			${'feat'.$i} = trim($_POST[$value]); 
		}  
		for($i=1;$i<=10;$i++){
			$value = "opt_".$i; 
			${'opt'.$i} = trim($_POST[$value]); 
		}  
		for($i=1;$i<=5;$i++){
			$value = "opt_text_".$i; 
			${'optT'.$i} = trim($_POST[$value]); 
		} 
		for($i=1;$i<=5;$i++){
			$value = "opt_link_".$i; 
			${'optL'.$i} = trim($_POST[$value]); 
		}
		
		$sql = "INSERT INTO products(title, description, category, supplier) 
				VALUES('$title', '$description', '$category', '$supplier')"; 
		$this->dbc->query($sql); 
		$sql = "SELECT id FROM products WHERE title = '$title'
				AND description = '$description'
				AND category = '$category'
				AND supplier = '$supplier'";
		$result = $this->dbc->query($sql);	 
		$prodId = $result->fetch_assoc();  
		$prodId = $prodId['id']; 

		//insert features 
		for($i=1;$i<=10;$i++){ 
			$feat = ${'feat'.$i}; 
			if (strlen($feat) != 0) {
				$sql = "INSERT INTO product_features(product_id, feature, position)
						VALUES('$prodId', '$feat', '$i')"; 
				$this->dbc->query($sql);
			}
		} 

		//insert options 
		for($i=1;$i<=10;$i++){ 
			$opt = ${'opt'.$i}; 
			if (strlen($opt) != 0) {
				$sql = "INSERT INTO product_options(product_id, product_option, position)
						VALUES('$prodId', '$opt', '$i')"; 
				$this->dbc->query($sql);
			}
		} 

		//insert links 
		for($i=1;$i<=5;$i++){
			$text = ${'optT'.$i};
			$link = ${'optL'.$i}; 
			if (strlen($link) != 0) {
				$sql = "INSERT INTO product_links(product_id, href, link_text, position)
						VALUES('$prodId', '$link', '$link', '$i')"; 
				$this->dbc->query($sql);
			}
		} 

		//insert images 
		for($i=1;$i<=5;$i++){ 
			$img = "image".$i;
			if (!in_array($_FILES[$img]['error'], [4])) {
				$manager = new ImageManager();
				$image = $manager->make( $_FILES[$img]['tmp_name'] );   
				$fileExtension = $this->getFileExtension( $image->mime() ); 
				$fileName = uniqid(); 
				$image->resize(250, 150); 
				$image->save("img/products/thumbnail/$fileName$fileExtension");  
				$image->resize(770, 400); 
				$image->save("img/products/large/$fileName$fileExtension"); 
				$sql = "INSERT INTO product_images(product_id, image, image_position) 
						VALUES( '$prodId', '$fileName$fileExtension', '$i' )";  
				$this->dbc->query($sql);
			}
		} 

		if($this->dbc->affected_rows) { 
			header('Location: index.php?page=product&productnum='.$prodId);	
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