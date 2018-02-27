<?php 

require 'config.inc.php';    
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  

if(isset($_COOKIE['key'])){ 
	$key = $_COOKIE['key']; 
	$sql = "SELECT id, first_name, email, company, account_status, account_type
	FROM users 
	WHERE browser_key = '$key'";  
	$result = $dbc->query($sql);  
	if ($result) {
		$userData = $result->fetch_assoc(); 
		$_SESSION['id'] = $userData['id']; 
		$_SESSION['first_name'] = $userData['first_name']; 
		$_SESSION['email'] = $userData['email'];  
		$_SESSION['email'] = $userData['email']; 
		$_SESSION['company'] = $userData['company']; 
		$_SESSION['account_status'] = $userData['account_status']; 
		$_SESSION['account_type'] = $userData['account_type'];  
		// get favourites  
		$id = $userData['id'];  
		$sql = "SELECT product_id FROM favourites WHERE user_id = '$id'";  
		$result = $dbc->query($sql);
		if ($result) {
			$products = $result->fetch_all(MYSQLI_ASSOC);   
			$dbfav = array_column($products, 'product_id');  
			$_SESSION['favourites'] = json_encode($dbfav); 
		}  
		setcookie("key", $key, time() + (86400 * 30), '/');
		header('Location: index.php');    
	}else{ 
		header('Location: index.php?page=logout');
	} 
} 