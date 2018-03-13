<?php  
class SettingsController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->privatePage();
		$this->dbc = $dbc; 
		$this->getAdmins();  
		$this->getMailList(); 
		if(isset($_POST['removeAdmin'])){
			$this->removeAdmin();
		} 
		if (isset($_POST['addAdmin'])) {
			header('Location: index.php?page=register');
		}  
	}  
	public function buildHTML(){ 
		echo $this->plates->render('settings',$this->data); 
	} 
	private function getAdmins(){
		$sql = "SELECT id, first_name, email, account_type, account_status 
		FROM users
		WHERE account_type = 'admin'
		AND id != 1"; 
		$result = $this->dbc->query($sql); 
		if ($result) {
			$this->data['allAdmins'] = $result->fetch_all(MYSQLI_ASSOC);
		}
	}  
	private function getMailList(){
		$sql = "SELECT first_name, email, company FROM users WHERE email_list = 'yes'"; 
		$result = $this->dbc->query($sql); 
		if($result){ 
			$this->data['emailList'] = $result->fetch_all(MYSQLI_ASSOC);
		}
	} 
	private function removeAdmin(){ 
		$id = $_POST['removeAdmin']; 
		$sql = "UPDATE users SET account_type = 'user' WHERE id = '$id'"; 
		$this->dbc->query($sql);  
		$_POST = array();
		header('Location: index.php?page=settings');
	}  
}