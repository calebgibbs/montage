<?php  
class ResetController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		if(isset($_SESSION['id'])){ 
			header('Location: index.php?page=404');
		} 
		if(!isset($_GET['k'])){ 
			header('Location: index.php?page=404');
		}  
		if(isset($_POST['reset'])){ 
			$this->reset();
		}
		$this->getInfo();
	}  
	public function buildHTML(){ 
		echo $this->plates->render('reset',$this->data); 
	} 
	private function getInfo(){ 
		$key = $this->dbc->real_escape_string(trim($_GET['k'])); 
		$sql = "SELECT id, first_name FROM users WHERE browser_key ='$key'";
		$result = $this->dbc->query($sql); 
		if($result->num_rows == 1){ 
			$result = $result->fetch_assoc(); 
			$name = $result['first_name'];$name = strtok($name, " ");$name = trim($name); 
			$this->data['name'] = $name;
		}
	} 
	private function reset(){ 
		$errors = 0;  
		if (strlen($_POST['p1']) < 8) {
			$this->data['p1msg'] = '<span style="color: #d9534f">Password is too short</span>'; 
			$errors++;
 		}elseif($_POST['p1'] != $_POST['p2']){
 			$this->data['p2msg'] = '<span style="color: #d9534f">Passwords do not match</span>'; 
			$errors++;
 		}

		if ($errors == 0) {
			$key = $this->dbc->real_escape_string(trim($_GET['k'])); 
			$sql = "SELECT id FROM users WHERE browser_key = '$key'"; 
			$result = $this->dbc->query($sql);
			if($result->num_rows == 1){ 
				$result = $result->fetch_assoc(); 
				$id = $result['id']; 
 				$hash = password_hash($_POST['p2'], PASSWORD_BCRYPT); 
 				$sql = "UPDATE users SET password = '$hash' WHERE id = '$id'"; 
 				$this->dbc->query($sql);  
 				$sql = "SELECT id, first_name, email, company, password, account_type, account_status FROM users WHERE id = '$id'"; 
 				$result = $this->dbc->query($sql); 
 				if($result->num_rows == 1){ 
 					$userData = $result->fetch_assoc(); 
 					$_SESSION['id'] = $userData['id']; 
					$_SESSION['first_name'] = $userData['first_name']; 
					$_SESSION['email'] = $userData['email'];
					$_SESSION['company'] = $userData['company'];
					$_SESSION['account_type'] = $userData['account_type'];
					$_SESSION['account_status'] = $userData['account_status']; 
					//get favourites  
					$sql = "SELECT product_id FROM favourites WHERE user_id = '$id'"; 
					$result = $this->dbc->query($sql);  
					if($result->num_rows != 0){ 
						$products = $result->fetch_all(MYSQLI_ASSOC);  
						$dbfav = array_column($products, 'product_id'); 
						$_SESSION['favourites'] = json_encode($dbfav);
					}
					header('Location: index.php'); 
 				}
 			}
		}
	}
}