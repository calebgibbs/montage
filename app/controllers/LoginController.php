<?php  
class LoginController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		if (isset($_POST['login'])) {
			$this->validateLogin();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('login', $this->data);
	} 

	private function validateLogin(){ 
		$email = $_POST['email'];  
		$password = $_POST['pwd']; 
		$totalErrors = 0; 

		if( strlen($email) < 6 ){ 
			$this->data['emailMessage'] = '<span class="error-message">Invalid email address</span>';
			$totalErrors++;
		} 

		if( strlen($password) < 8 ) {
			$this->data['passwordMessage'] = '<span class="error-message">Invalid password</span>';
			$totalErrors++;
		} 

		if( $totalErrors == 0 ){ 
			$this->processLogin(); 
			// die('processing');
		}

	}

	private function processLogin(){ 

		$filteredEmail = $this->dbc->real_escape_string($_POST['email']); 

		$sql = "SELECT id, first_name, last_name, email, password, account_status 
				FROM users 
				WHERE email = '$filteredEmail'"; 

		$result = $this->dbc->query($sql); 

		if( $result->num_rows == 1 ) {
			$userData = $result->fetch_assoc();  
			$passwordResult = password_verify( $_POST['pwd'], $userData['password'] ); 
			if($passwordResult == true) { 
				$_SESSION['id'] = $userData['id']; 
				$_SESSION['first_name'] = $userData['first_name'];
				$_SESSION['last_name'] = $userData['last_name']; 
				$_SESSION['email'] = $userData['email'];
				$_SESSION['account_status'] = $userData['account_status'];  

				if ($_SESSION['account_status'] == 'not_active') {
					header('Location: index.php?page=change_password');
				}else{ 
					header('Location: index.php');
				}

			}else{ 
				$this->data['buttonMessage'] = '<span class="error-message">Invalid email or password</span>';
			}
		}
	} 
}