<?php  
class ChangepwdController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->nonActiveAccount();
		$this->dbc = $dbc; 
		if (isset($_POST['update'])) {
			$this->updatePassword();
		} 
	}  
	public function buildHTML(){ 
		echo $this->plates->render('changepwd', $this->data);
	} 

	private function updatePassword(){ 
		$pwd1 = $_POST['pwd1']; 
		$pwd2 = $_POST['pwd2']; 
		$totalErrors = 0; 

		if( strlen($pwd1) < 8 ){ 
			$this->data['password1Message'] = '<span class="error-message">Your password must be longer than 8 characters</span>'; 
			$totalErrors++;
		} 

		if( $pwd1 != $pwd2 ){ 
			$this->data['password2Message'] = '<span class="error-message">Your passwords no not match</span>'; 
			$totalErrors++;
		} 

		if($totalErrors == 0){ 
			$hash = password_hash($_POST['pwd2'], PASSWORD_BCRYPT);  
			$id = $_SESSION['id'];
			$sql = "UPDATE users SET password = '$hash', account_status = 'active' WHERE id = '$id'"; 
			$this->dbc->query($sql); 
			$_SESSION['account_status'] = 'active'; 
			header('Location: index.php?page=home');

		}

	}
}