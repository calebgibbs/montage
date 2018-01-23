<?php  

$dbc = new mysqli('localhost', 'root', 'password', 'montage'); 

if(isset($_POST['email'])){ 
	$email = $_POST['email'];
	$email = $email = $dbc->real_escape_string($email); 

	$sql = "SELECT email FROM users WHERE email = '$email'"; 

	$result = $dbc->query($sql);  

	if(!$result){
		echo "noEmail";
	}elseif($result->num_rows == 1){
		echo "emailFound";
	}else{ 
		echo "error";
	}

}