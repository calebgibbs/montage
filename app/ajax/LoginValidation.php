<?php  

require '../../config.inc.php';  
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

if (isset($_POST['email'])) {
	$email = $_POST['email']; 

	$email = $dbc->real_escape_string($email); 

	$sql = "SELECT email FROM users WHERE email = '$email'"; 

	$result = $dbc->query($sql); 

	if(!$result){
		echo "Something went wrong";
	}elseif($result->num_rows == 1){
		echo "emailSuccess";
	}else{ 
		echo "emailFail";
	} 
} 

if (isset($_POST['password'])) {
	$password = $_POST['password'];  
	$entdEmail = $_POST['entdEmail'];
	$entdEmail = $dbc->real_escape_string($entdEmail); 

	$sql = "SELECT password FROM users WHERE email = '$entdEmail'"; 
	$result = $dbc->query($sql);  

	if(!$result){ 
		echo "something went wrong";
	}elseif($result->num_rows == 1){ 
		$userData = $result->fetch_assoc(); 
		$passwordResult = password_verify( $password, $userData['password'] ); 
		if($passwordResult == true) {
			echo "passwordSuccess";  
		}
	}else{  
		echo "passwordFail";
	}

}
