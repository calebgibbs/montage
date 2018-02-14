<?php 
require '../../config.inc.php';  
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
if (isset($_POST['product'])) {
	$productId = $dbc->real_escape_string($_POST['product']); 
	$userId = $dbc->real_escape_string($_POST['user']); 
	$sql = "DELETE FROM favourites WHERE user_id = '$userId' AND product_id = '$productId'"; 
	$dbc->query($sql); 
	echo "Success"; 
	$_POST = array();
}
