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
		$errors = 0; 
		if(strlen(trim($_POST['title'])) == 0){ 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*The title is required</span>'; 
			$errors++;
		}elseif(strlen($_POST['title']) > 50){ 
			$this->data['titleMessage'] = '<span style="color: #d9534f">*Title is too long</span>'; 
			$errors++; 	 
		} 
		if(strlen($_POST['client']) > 50){ 
			$this->data['clientMessage'] = '<span style="color: #d9534f">*Client name is too long</span>'; 
			$errors++; 	 
		} 
		if(strlen($_POST['date']) > 70){ 
			$this->data['dateMessage'] = '<span style="color: #d9534f">*The date is too long</span>'; 
			$errors++;
		}
		if(strlen($_POST['architect']) > 50){ 
			$this->data['arcMessage'] = '<span style="color: #d9534f">*Architect name is too long</span>'; 
			$errors++;	
		} 
		if(strlen(trim($_POST['contractor'])) > 50){ 
			$this->data['conMessage'] = '<span style="color: #d9534f">*Contractor name is too long</span>'; 
			$errors++;	
		} 
		if(strlen(trim($_POST['desc'])) == 0){ 
			$this->data['descMessage'] = '<span style="color: #d9534f">*This feild is required</span>'; 
			$errors++;	
		}elseif(strlen(trim($_POST['desc'])) > 1000){ 
			$this->data['descMessage'] = '<span style="color: #d9534f">*The description is too long</span>'; 
			$errors++;	
		} 
		for($i=1;$i<=5;$i++){
			$value = "image".$i; 
			${'img'.$i} = $_FILES[$value]; 
		}  

		if (in_array($img1['error'], [4])) {
			$errors++;
			$this->data['imgMsg1'] = '<span style="color: #d9534f">*You must upload an image</span>';
		} 

		for($i=1;$i<=5;$i++){ 
			$img = "image".$i;  
			$msg = "imgMsg".$i;
			if (!in_array($_FILES[$img]['error'], [4])) {
				if (in_array($_FILES[$img]['error'], [1,3])) {
					$errors++; 
					$this->data[$msg] = '<span style="color: #d9534f">*Image failed to upload</span>';
				}elseif (!in_array($_FILES[$img]['type'], $this->acceptableImageTypes)) {
					$errors++; 
					$this->data[$msg] = '<span style="color: #d9534f">*You must upload a valid image</span>';
				}
			}
		} 

		if($errors == 0){ 
			$this->addPortfolio();
		} 
	} 

	private function addPortfolio(){
		$title = $this->dbc->real_escape_string(trim($_POST['title'])); 
		$client = $this->dbc->real_escape_string(trim($_POST['client'])); 
		if(strlen($client) == 0){
			$client = 'N/A';	
		} 
		$date = $this->dbc->real_escape_string(trim($_POST['date']));
		if(strlen($date) == 0){
			$date = 'N/A';	
		} 
		$arc = $this->dbc->real_escape_string(trim($_POST['architect'])); 
		if(strlen($arc) == 0){
			$arc = 'N/A';	
		}
		$con = $this->dbc->real_escape_string(trim($_POST['contractor'])); 
		if(strlen($con) == 0){
			$con = 'N/A';	
		} 
		$desc = $this->dbc->real_escape_string(trim($_POST['desc']));
		$sql = "INSERT INTO portfolios(title, client, date, architect, contractor, description) VALUES('$title', '$client', '$date', '$arc', '$con', '$desc')";  
		$this->dbc->query($sql); 
		$sql = "SELECT id FROM portfolios WHERE title = '$title' AND description = '$desc'"; 
		$result = $this->dbc->query($sql); 
		if($result->num_rows != 0){ 
			$result = $result->fetch_assoc(); 
			$id = $result['id']; 
		}  
		for($i=1;$i<=5;$i++){ 
			$img = "image".$i; 
			if(!in_array($_FILES[$img]['error'], [4])){ 
				$manager = new ImageManager(); 
				$image = $manager->make( $_FILES[$img]['tmp_name'] ); 
				$fileExtension = $this->getFileExtension( $image->mime() ); 
				$fileName = uniqid(); 
				$image->save("img/portfolio/large/$fileName$fileExtension", 60); 
				$image->resize(250, 150); 
				$image->save("img/portfolio/thumbnail/$fileName$fileExtension", 60); 
				$sql = "INSERT INTO portfolio_images(portfolio_id, image, image_position)
						VALUES('$id','$fileName$fileExtension', '$i')";  
				$this->dbc->query($sql);
			}
		} 

		header('Location: index.php?page=portfolio&num='.$id);
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