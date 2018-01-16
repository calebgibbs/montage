 










<?php 

$dbc = new mysqli('localhost', 'root', 'password', 'montage'); 
$currentURL

if (isset($_POST['login'])) {
	
	$email = $dbc->real_escape_string($_POST['email']);  

	$sql = "SELECT id, first_name, email, password, account_type, account_status 
			FROM users 
			WHERE email = '$email'";  
	$result = $dbc->query($sql); 

	if($result->num_rows == 1){ 
		$userData = $result->fetch_assoc(); 
		$passwordResult = password_verify( $_POST['password'], $userData['password'] );   
		if($passwordResult == true){
			$url = $_SESSION['currentPage'];  
			unset($_SESSION['currentPage']);	
			$_SESSION['id'] = $userData['id']; 
			$_SESSION['first_name'] = $userData['first_name']; 
			$_SESSION['email'] = $userData['email'];
			$_SESSION['company'] = $userData['company'];
			$_SESSION['account_type'] = $userData['account_type'];
			$_SESSION['account_status'] = $userData['account_status'];   
			return;
		}
	}



}else{ 
	header('Location: index.php?page=home');
} 

 