<?php 

require '../../../config.inc.php'; 
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  

if (isset($_POST['name'])) {
	$id = $_POST['id'];  
	$name = $dbc->real_escape_string($_POST['name']); 
	$sql = "UPDATE users SET first_name = '$name' WHERE id = '$id'"; 
	$dbc->query($sql);
	echo 'success';
} 

if (isset($_POST['testEmail'])) {
	$email = $dbc->real_escape_string(trim($_POST['testEmail'])); 
	$sql = "SELECT email FROM users WHERE email = '$email'"; 
	$result = $dbc->query($sql); 
	if (!$result) {
		echo "something went wrong";
	}elseif($result->num_rows != 1){ 
		echo "valid";
	}else{ 
		echo "invalid";
	}
} 

if(isset($_POST['newEmail'])){
	$email = $dbc->real_escape_string(trim($_POST['newEmail'])); 
	$id = $_POST['id']; 

	$sql = "UPDATE users SET email = '$email' WHERE id = '$id'"; 
	$dbc->query($sql); 

	if ($dbc->affected_rows == 0) {
		echo "something went wrong";
	}else{ 
		echo "updateSuccess";
	}

} 

if(isset($_POST['company'])){ 
	$company = $dbc->real_escape_string(trim($_POST['company'])); 
	$id = $_POST['id']; 

	$sql = "UPDATE users SET company = '$company' WHERE id = '$id'"; 
	$dbc->query($sql); 

	if ($dbc->affected_rows != 1) {
		echo "something went wrong";
	}elseif($dbc->affected_rows == 1){ 
		echo "updateSuccess";
	}

} 

if(isset($_POST['data'])){
	$option = $_POST['data']; 
	$id = $_POST['id']; 
	$sql = "UPDATE users SET email_list = '$option' WHERE id = '$id'"; 
	// echo $sql;
	$dbc->query($sql); 


	if($dbc->affected_rows != 1){
		echo "fail";
	}else{ 
		echo "success";
	} 
} 

if(isset($_POST['cPwd'])){
	$id = $_POST['id']; 
	$pwd = $_POST['cPwd']; 

	$sql = "SELECT password FROM users WHERE id = '$id'"; 
	$result = $dbc->query($sql); 

	if($result->num_rows == 1){ 
		$userData = $result->fetch_assoc(); 
		$passwordResult = password_verify( $pwd, $userData['password'] ); 
		if($passwordResult == true) {
			echo "passwordSuccess";  
		}else{ 
			echo "passwordFail";
		}
	}
} 

if(isset($_POST['uPwd'])){
	$id = $_POST['id']; 
	$pwd = password_hash($_POST['uPwd'], PASSWORD_BCRYPT); 
	$sql = "UPDATE users SET password = '$pwd' WHERE id = '$id'"; 
	$dbc->query($sql);
	if($dbc->affected_rows == 1){
		echo "success";
	}
} 

if(isset($_POST['delP'])){
	$id = $_POST['id']; 
	$pwd = $_POST['delP']; 
	$sql = "SELECT password FROM users WHERE id = '$id'"; 
	$result = $dbc->query($sql); 
	if($result->num_rows == 1){ 
		$userData = $result->fetch_assoc(); 
		$passwordResult = password_verify( $pwd, $userData['password'] ); 
		if($passwordResult == true) {
			echo "passwordSuccess";  
		}else{ 
			echo "passwordFail";
		}
	}	
} 

if(isset($_POST['delId'])){
	$id = $_POST['delId']; 
	$sql = "DELETE FROM users WHERE id = '$id'"; 
	$dbc->query($sql); 
	if($dbc->affected_rows != 1){ 
		echo "success";
	}else{ 
		echo "fail";
	} 	
} 

if(isset($_POST['Testemail'])){ 	
	$email = $dbc->real_escape_string(trim($_POST['Testemail'])); 
	$sql = "SELECT email, account_type FROM users WHERE email = '$email'"; 
	$result = $dbc->query($sql); 
	if ($result->num_rows == 1) {
		$result = $result->fetch_assoc(); 
		$priv = $result['account_type'];  
		if ($priv === 'user') {
			echo "success";
		}
	}
} 

if(isset($_POST['resEmail'])){ 
	$email = $dbc->real_escape_string(trim($_POST['resEmail'])); 
	$sql = "SELECT email FROM users WHERE email = '$email'"; 
	$result = $dbc->query($sql); 
	if($result->num_rows == 1){ 
		echo 'success';
	}
} 
if(isset($_POST['passwordReset'])){
	//get email 
	$email = $dbc->real_escape_string(trim($_POST['passwordReset'])); 
	$key = uniqid();  
	$key = $dbc->real_escape_string($key);
	$sql = "UPDATE users SET browser_key  = '$key' WHERE email = '$email'"; 
	$dbc->query($sql); 
	$link = 'https://montagenz.co.nz/index.php?page=reset&k='.$key; 
	$message = 'To reset you password please click this link: '.$link;  
	//send email 
	$to = $email; 
	$subject = "Montage Interiors password reset";   
	$from = 'noreply@montagenz.co.nz';
	$headers = 'From: ' . $from ; 
	mail($to, $subject, $message, $headers);  
	echo 'sent';
} 
if(isset($_POST['Helppwd'])){ 
	$id = $_POST['Helpid']; 
	$pwd = $dbc->real_escape_string($_POST['Helppwd']);
	$sql = "SELECT password FROM users WHERE id = '$id'"; 
	$result = $dbc->query($sql); 
	if($result->num_rows != 0){ 
		$result = $result->fetch_assoc(); 
		$passwordVerify = password_verify( $pwd, $result['password'] ); 
		if($passwordVerify === true){ 
			echo 'montage19:fk6]HUK*m3';
		}else{ 
			echo "wrongPwd";
		}
	}
}