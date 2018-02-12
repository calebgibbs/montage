<?php 
use Intervention\Image\ImageManager; 
class AddPortfolioController extends PageController { 
	private $acceptableImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->privatePage();  
		if (isset($_POST['addPort'])) {
			$this->validate();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('addportfolio', $this->data);
	}  

	private function validate(){ 
		$title = $this->dbc->real_escape_string(trim($_POST['title'])); 
		$desc = $this->dbc->real_escape_string(trim($_POST['desc'])); 
		$errors = 0;
		if (strlen($title) === 0) {
			$this->data['titleMessage'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;
		}elseif(strlen($title) > 150){ 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*Title must be 150 characters or less</span>'; 
			$errors++;	
		} 

		if (strlen($desc) === 0) {
			$this->data['descMessage'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;
		}elseif(strlen($desc) > 1000){
			$this->data['descMessage'] = '<span style="color: #d9534f">*Description must be 1,000 characters or less</span>'; 
			$errors++;
		} 

		//images  

		
		if( in_array($_FILES['image1']['error'], [4]) ){ 
			$this->data['imgMessage1'] = '<span style="color: #d9534f">*You most upload the main image</span>';
			$errors++;
		}elseif( in_array($_FILES['image1']['error'], [1,3]) ){ 
			$this->data['imgMessage1'] = '<span style="color: #d9534f">*Image failed to upload</span>';
			$errors++;
		}elseif( !in_array( $_FILES['image1']['type'], $this->acceptableImageTypes) ){ 
			$this->data['imgMessage1'] = '<span style="color: #d9534f">*You must upload a valid image</span>';
			$errors++;
		} 

		if( !in_array($_FILES['image2']['error'], [4]) ){ 
			if( in_array($_FILES['image2']['error'], [1,3]) ){ 
				$this->data['imgMessage2'] = '<span style="color: #d9534f">*Image failed to upload</span>';
				$errors++;
			}elseif( !in_array( $_FILES['image2']['type'], $this->acceptableImageTypes) ){ 
				$this->data['imgMessage2'] = '<span style="color: #d9534f">*You must upload a valid image</span>';
				$errors++;
			}
		} 

		if( !in_array($_FILES['image3']['error'], [4]) ){ 
			if( in_array($_FILES['image3']['error'], [1,3]) ){ 
				$this->data['imgMessage3'] = '<span style="color: #d9534f">*Image failed to upload</span>';
				$errors++;
			}elseif( !in_array( $_FILES['image3']['type'], $this->acceptableImageTypes) ){ 
				$this->data['imgMessage3'] = '<span style="color: #d9534f">*You must upload a valid image</span>';
				$errors++;
			}
		} 

		if( !in_array($_FILES['image4']['error'], [4]) ){ 
			if( in_array($_FILES['image4']['error'], [1,3]) ){ 
				$this->data['imgMessage4'] = '<span style="color: #d9534f">*Image failed to upload</span>';
				$errors++;
			}elseif( !in_array( $_FILES['image4']['type'], $this->acceptableImageTypes) ){ 
				$this->data['imgMessage4'] = '<span style="color: #d9534f">*You must upload a valid image</span>';
				$errors++;
			}
		} 

		if( !in_array($_FILES['image5']['error'], [4]) ){ 
			if( in_array($_FILES['image5']['error'], [1,3]) ){ 
				$this->data['imgMessage5'] = '<span style="color: #d9534f">*Image failed to upload</span>';
				$errors++;
			}elseif( !in_array( $_FILES['image5']['type'], $this->acceptableImageTypes) ){ 
				$this->data['imgMessage5'] = '<span style="color: #d9534f">*You must upload a valid image</span>';
				$errors++;
			}
		} 

		if( $errors == 0 ){ 
			$this->processPortfolio();
		}
		
	} 

	private function processPortfolio(){
		$title = $this->dbc->real_escape_string(trim($_POST['title'])); 
		$desc = $this->dbc->real_escape_string(trim($_POST['desc'])); 
		$img1 = $_FILES['image1'];
		$img2 = $_FILES['image2'];
		$img3 = $_FILES['image3'];
		$img4 = $_FILES['image4'];
		$img5 = $_FILES['image5']; 

		$sql = "INSERT INTO portfolios(title, description) VALUES('$title', '$desc')";
		$this->dbc->query($sql); 
		$sql = "SELECT id FROM portfolios WHERE title = '$title' AND description = '$desc'";
		$result = $this->dbc->query($sql); 
		$portId = $result->fetch_assoc();  
		$portId = $portId['id']; 

		for($i = 1; $i <= 5; $i++){ 
			if(!in_array(${'img'.$i}['error'],[4])) {
				$manager = new ImageManager();
				$image = $manager->make( ${'img'.$i}['tmp_name'] );   
				$fileExtension = $this->getFileExtension( $image->mime() ); 
				$fileName = uniqid(); 
				$image->resize(250, 150); 
				$image->save("img/portfolio/thumbnail/$fileName$fileExtension");  
				$image->resize(770, 400); 
				$image->save("img/portfolio/large/$fileName$fileExtension"); 
				$sql = "INSERT INTO portfolio_images(portfolio_id, image, image_position) VALUES( '$portId', '$fileName$fileExtension', '$i' )";  
				$this->dbc->query($sql);
			}
		} 

		if($this->dbc->affected_rows) { 
				//locate to new page 
			header('Location: index.php?page=portfolio&num='.$portId);
				
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