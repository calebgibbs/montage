<?php  
class RegisterController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->dbc = $dbc; 
		if(isset($_POST['register'])){ 
			$this->validateRegistration();
		}
	}  
	public function buildHTML(){ 
		echo $this->plates->render('register', $this->data);
	} 

	private function validateRegistration(){ 
		$fname = $_POST['fname']; 
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$email2 = $_POST['email2']; 
		$totalErrors = 0; 

		if( $fname == '' ){ 
			$this->data['fnameMessage'] = '<span class="error-message">Please enter users first name</span>';
			$totalErrors++;  
		} 

		if( $lname == '' ){ 
			$this->data['lnameMessage'] = '<span class="error-message">Please enter users last name</span>';
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
		$filteredLastName = $this->dbc->real_escape_string( ucfirst($_POST['lname']) );	
		$filteredEmail = $this->dbc->real_escape_string( lcfirst($_POST['email']) );
		$hash = password_hash($_POST['email2'], PASSWORD_BCRYPT); 

		$sql = "INSERT INTO users(first_name, last_name, email, password, account_status)
				VALUES('$filteredFirstName','$filteredLastName','$filteredEmail','$hash','not_active')"; 
		$this->dbc->query($sql); 

		if($this->dbc->affected_rows) { 
			header('Location: index.php?page=home');
			}else { 
				die('error');
			}   

	}
}