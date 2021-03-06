<?php  
class SettingsController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct(); 
		$this->privatePage();
		$this->dbc = $dbc; 
		$this->getAdmins();  
		$this->getMailList();  
		$this->getManagers();
		if(isset($_POST['removeAdmin'])){
			$this->removeAdmin();
		} 
		if (isset($_POST['addAdmin'])) {
			header('Location: index.php?page=register');
		}   
		if(isset($_POST['removeManager'])){
			$this->removeManager();
		}  
		if(isset($_POST['saveMan'])){ 
			$this->updateMan();
		}
		if(isset($_POST['add-man'])){ 
			$this->addMan();
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
	private function getManagers(){ 
		$sql = "SELECT * FROM managers"; 
		$result = $this->dbc->query($sql); 
		if(!$result || $result->num_rows != 0){ 
			$this->data['managers'] = $result->fetch_all(MYSQLI_ASSOC);
		}
	} 
	private function removeManager(){ 
		$id = $_POST['removeManager'];
		$sql = "DELETE FROM `managers` WHERE `managers`.`id` = '$id'"; 
		$this->dbc->query($sql); 
		header('Location: index.php?page=settings');
	}  
	private function updateMan(){ 
		$id = $_POST['saveMan']; 
		$n = 'name'.$id; $name = $this->dbc->real_escape_string(trim($_POST[$n]));
		$e = 'email'.$id; $email = $this->dbc->real_escape_string(trim($_POST[$e]));
		$p = 'phone'.$id; $phone = $this->dbc->real_escape_string(trim($_POST[$p])); 
		$sql = "UPDATE managers SET name = '$name', email = '$email', phone = '$phone' WHERE id = '$id'"; 
		$this->dbc->query($sql); 
		header('Location: index.php?page=settings');
	} 
	private function addMan(){ 
		$name = $this->dbc->real_escape_string(trim($_POST['add-name']));
		$email = $this->dbc->real_escape_string(trim($_POST['add-email'])); 
		$phone = $this->dbc->real_escape_string(trim($_POST['add-phone']));  
		$errors = 0;  
		if(strlen($name) == 0){ 
			$errors++;
		} 
		if(strlen($email) == 0){ 
			$errors++;
		} 
		if(strlen($phone) == 0){ 
			$errors++;
		} 
		if($errors === 0){ 
			$sql = "INSERT INTO managers(name, email, phone) VALUES('$name','$email','$phone')"; 
			$this->dbc->query($sql); 
			header('Location: index.php?page=settings');
		} 
	}
}