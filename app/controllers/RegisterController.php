<?php  
class RegisterController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->privatePage();
		if(isset($_POST['register'])){ 
			$this->validateRegistration();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('register', $this->data);
	} 
	private function validateRegistration(){ 
		$fname = $_POST['fname']; 
		$email = $_POST['email'];
		$email2 = $_POST['email2']; 
		$totalErrors = 0; 

		if( $fname == '' ){ 
			$this->data['fnameMessage'] = '<span class="error-message">Please enter users first name</span>';
			$totalErrors++;  
		} 
		if( $email == '' ){ 
			$this->data['email1Message'] = '<span class="error-message">Please enter users email address</span>';
			$totalErrors++;  
		} 
		if( strlen($email) < 6 ){ 
			$this->data['email1Message'] = '<span class="error-message">Please enter a valid email address</span>';
			$totalErrors++;  
		} 

		$filteredEmail = $this->dbc->real_escape_string( lcfirst($email) ); 

		$sql = "SELECT email
				FROM users
				WHERE email = '$filteredEmail'  ";  
		$result = $this->dbc->query($sql);

		if( !$result || $result->num_rows > 0 ) {
			$this->data['email1Message'] = '<span class="error-message">This email address is already in use</span>';
			$totalErrors++;
		} 

		if ($email2 != $email) {
			$this->data['email2Message'] = '<span class="error-message">Email does not match</span>'; 
			$totalErrors++;
		} 

		if ($totalErrors == 0) {
			$this->processRegistration();
		}
	} 

	private function processRegistration(){ 
		$filteredFirstName = $this->dbc->real_escape_string( ucfirst($_POST['fname']) ); 	
		$filteredEmail = $this->dbc->real_escape_string( lcfirst($_POST['email']) ); 
		$hash = password_hash($_POST['email2'], PASSWORD_BCRYPT); 

		$sql = "INSERT INTO users(first_name, email, company, password, account_type, account_status)
				VALUES('$filteredFirstName','$filteredEmail',  'Montage Interiors','$hash', 'admin', 'not_active')"; 
		$this->dbc->query($sql);  
		// echo "<pre>";
		// print_r($sql); 
		// echo "</pre>";

		if($this->dbc->affected_rows) { 
			header('Location: index.php?page=manage_accounts');
			}else { 
				die('error');
			}   

	}
}