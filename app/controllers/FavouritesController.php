<?php 

require '../config.inc.php';  
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  

if(isset($_SESSION['favourites'])){
	$fav = json_decode($_SESSION['favourites'], true);  
	$fav = array_reverse($fav);
}else{ 
	$cookie = isset($_COOKIE['favourites']) ? $_COOKIE['favourites'] : "";
	$cookie = stripslashes($cookie);
	$fav = json_decode($cookie, true);
	if (!$fav) {
		$fav = array();
	}
	$fav = array_reverse($fav);
}  

if(isset($_POST['addfav'])){ 
	addToFavourites();   
}

function addToFavourites(){ 
	$value = $_POST['addfav'];
	$_POST = array();
	$lastPage = $_SERVER['HTTP_REFERER'];
	if(isset($_SESSION['id'])){ 
		$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

		$current = json_decode($_SESSION['favourites'], true);  

		array_push($current, $value); 

		//updating cookie
		$_SESSION['favourites'] = json_encode($current); 

		$user = $_SESSION['id']; 

		$sql = "SELECT product_id FROM favourites WHERE user_id = '$user'"; 
		$result = $dbc->query($sql);

		if($result){ 
			$results = $result->fetch_all(MYSQLI_ASSOC);  
			$dbfav = array_column($results, 'product_id');  
			if (!in_array($value, $dbfav)) {
				$sql = "INSERT INTO favourites(user_id, product_id) VALUES('$user', '$value')"; 
				$dbc->query($sql); 
				$_POST = array();
			}
		}		
	}else{ 
		$cookie = isset($_COOKIE['favourites']) ? $_COOKIE['favourites'] : "";
		$cookie = stripslashes($cookie);
		$savedCookieItems = json_decode($cookie, true); 
		if(!$savedCookieItems){ 
			$savedCookieItems = array();
		} 

		if(in_array($value, $savedCookieItems)){
 			$_POST = array(); 
			die('added already');
			header('Location: '.$lastPage);	 

		}else{
			array_push($savedCookieItems, $value); 
			$json = json_encode($savedCookieItems, true);	
			setcookie("favourites", $json, time() + (86400 * 30), '/'); 
			$_COOKIE['favourites'] = $json;  
		}

	}

	$_POST = array(); 
	header('Location: '.$lastPage);

}   

if (isset($_POST['delfav'])) {
	$value = $_POST['delfav'];
	$lastPage = $_SERVER['HTTP_REFERER'];
	if (isset($_SESSION['favourites'])) {
		$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$user = $_SESSION['id'];
		$sql = "DELETE FROM favourites WHERE user_id = '$user' AND product_id = '$value'"; 
		$dbc->query($sql);

		$favourites = json_decode($_SESSION['favourites'], true);	 
		
		$inArray = array_search($value, $favourites);  

		unset($favourites[$inArray]); 

		$_SESSION['favourites'] = json_encode($favourites); 
	} 
	$_POST = array(); 
	header('Location: '.$lastPage);
}
