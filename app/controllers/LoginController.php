<?php  
class LoginController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->loggedOut(); 
		$this->dbc = $dbc; 
		if (isset($_POST['login'])) {
			$this->login();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('home', $this->data);
	} 
	private function login(){ 
		$lastPage = $_SERVER['HTTP_REFERER'];
		
		//links to be changed 
		if ($lastPage == 'http://localhost/~calebgibbs/montage/index.php?page=error404') {
			$lastPage = 'http://localhost/~calebgibbs/montage/index.php';
		} 


		$email = $this->dbc->real_escape_string($_POST['email']); 
		$password = $_POST['password'];
		$sql = "SELECT id, first_name, email, company, password, account_type, account_status FROM users WHERE email = '$email'";  
		$result = $this->dbc->query($sql); 
		if($result->num_rows == 1){ 
			$userData = $result->fetch_assoc(); 
			$passwordResult = password_verify( $password, $userData['password'] ); 
			if($passwordResult == true){ 
				$_SESSION['id'] = $userData['id']; 
				$_SESSION['first_name'] = $userData['first_name']; 
				$_SESSION['email'] = $userData['email'];
				$_SESSION['company'] = $userData['company'];
				$_SESSION['account_type'] = $userData['account_type'];
				$_SESSION['account_status'] = $userData['account_status']; 

				if(isset($_POST['keepMeLoggedIn'])){
					$id = $_SESSION['id'];
					$key = uniqid(); 
					setcookie("key", $key, time() + (86400 * 30), '/'); 
					$sql = "UPDATE users SET browser_key = '$key' WHERE id = '$id'"; 
					$this->dbc->query($sql);
				}
				
				$cookie = isset($_COOKIE['favourites']) ? $_COOKIE['favourites'] : "";
				$cookie = stripslashes($cookie);
				$cookie = json_decode($cookie, true);
				if (!$cookie) {
					$cookie = array(); 
				}

				$userId = $_SESSION['id'];

				$sql = "SELECT product_id FROM favourites WHERE user_id = '$userId'"; 
				$result = $this->dbc->query($sql); 

				if ($result) {
					$products = $result->fetch_all(MYSQLI_ASSOC);  
					$dbfav = array_column($products, 'product_id'); 
					$_SESSION['favourites'] = json_encode($dbfav);
				} 

				
				$difference = array_diff($cookie, $dbfav); 

				foreach ($difference as $key => $value) {
					$sql = "INSERT INTO favourites(user_id, product_id) VALUES('$userId', '$value')"; 
					$this->dbc->query($sql); 

					$fav = $_SESSION['favourites']; 
					$fav = json_decode($fav, true);  
					array_push($fav, $value); 

					$_SESSION['favourites'] = json_encode($fav); 

				}
				
				setcookie("favourites", '', time() - (86400 * 30), '/'); 
						

				if ($_SESSION['account_type'] == 'admin' && $_SESSION['account_status'] == 'not_active') {
					header('Location: index.php?page=change_password');
				}else{ 
					header('Location: '.$lastPage);
				}
			}
		}
	}  
}