<?php  
class ManageAccountsController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->privatePage(); 
		$this->dbc = $dbc; 
		if(isset($_POST['resetPassword'])){ 
			$this->resetUserPassword();
		}
	}  
	public function buildHTML(){ 
		$allData = $this->getUsers(); 
		$data = []; 
		$data['allUsers'] = $allData;
		echo $this->plates->render('manageaccounts', $data); 
	} 

	private function getUsers(){ 
		$currentId = $_SESSION['id'];
 		$sql = "SELECT id, first_name, email, company, account_type, account_status FROM users WHERE id <> '$currentId'"; 
		$result = $this->dbc->query($sql); 
		$allData = $result->fetch_all(MYSQLI_ASSOC);  
		return $allData; 
	} 

	private function resetUserPassword(){ 
		$userId = $_POST['resetPassword']; 
		$sql = "SELECT email FROM users WHERE id = '$userId'"; 
		$result = $this->dbc->query($sql);  
		// $userName = $result['user_name'];
		$userData = $result->fetch_assoc();   
		$_SESSION['save'] = $userData['email']; 
		// die($_SESSION['save']);
		$passowrdReset = password_hash($_SESSION['email'], PASSWORD_BCRYPT); 
		$sql = "UPDATE users SET password = '$passowrdReset', account_status = 'not_active' WHERE id = '$userId'"; 
		$this->dbc->query($sql);
		unset($_SESSION['save']);

	}

}