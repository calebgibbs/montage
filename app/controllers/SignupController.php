<?php  
class SignupController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->loggedOut(); 
		$this->dbc = $dbc; 
		if (isset($_POST['signup'])) {
			$this->processNewAccount();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('home', $this->data);
	} 
	private function processNewAccount(){ 
		
		// echo "<pre>"; 
		// print_r($_POST); 
		// echo "</pre>"; 
		// die();

		$lastPage = $_SERVER['HTTP_REFERER'];
		
		//links to be changed 
		if ($lastPage == 'http://localhost/~calebgibbs/montage/index.php?page=error404') {
			$lastPage = 'http://localhost/~calebgibbs/montage/index.php';
		} 

		$name = $this->dbc->real_escape_string(ucfirst($_POST['name']));  
		$email = $this->dbc->real_escape_string(lcfirst($_POST['email']));
		$company = $this->dbc->real_escape_string(ucfirst($_POST['company'])); 
		$hash = password_hash($_POST['password2'], PASSWORD_BCRYPT); 
		if (isset($_POST['email_list'])) {
			$emailList = 'yes';
		}else{ 
			$emailList = 'no';
		}
		
		$sql = "INSERT INTO users(first_name, email, company, password, account_type, account_status, email_list) 
			VALUES('$name', '$email', '$company', '$hash', 'user', 'active', '$emailList')"; 
		$this->dbc->query($sql); 

		if($this->dbc->affected_rows){ 
			$sql = "SELECT id FROM users WHERE email = '$email'"; 
			$result = $this->dbc->query($sql); $userId = $result->fetch_assoc(); 
			$userId = $userId['id'];  

			$_SESSION['id'] = $userId; 
			$_SESSION['name'] = $name; 
			$_SESSION['email'] = $email;
			$_SESSION['company'] = $company;
			$_SESSION['account_type'] = 'user';
			$_SESSION['account_status'] = 'active';	 

			//get cookie data 

			$cookie = isset($_COOKIE['favourites']) ? $_COOKIE['favourites'] : "";
			$cookie = stripslashes($cookie);
			$fav = json_decode($cookie, true);
			if (!$fav) {
				$fav = array();
			}
			$_SESSION['favourites'] = json_encode($fav);  

			foreach ($fav as $id) {
				$sql = "INSERT INTO favourites(user_id, product_id) VALUES ('$userId', '$id')"; 
				$this->dbc->query($sql);
			}  

			setcookie("favourites", '', time() - (86400 * 30), '/'); 

			header('Location: '.$lastPage);	
		}


	} 
}