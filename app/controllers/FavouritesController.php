<?php 

require '../config.inc.php';  
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  

//getting favourites for 
if(isset($_SESSION['favourites'])){
	$fav = json_decode($_SESSION['favourites'], true);  

	$fav = array_reverse($fav);
} 

if(isset($_POST['addfav'])){ 
	// die('set');
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
	} 

	$_POST = array(); 
	header('Location: '.$lastPage);

} 
