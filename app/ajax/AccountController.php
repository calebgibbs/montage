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