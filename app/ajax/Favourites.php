<?php 
	// require '../../index.php';
	$dbc = new mysqli('localhost', 'root', 'password', 'montage');  
	if (isset($_POST['product'])) {
		$productId = $dbc->real_escape_string($_POST['product']); 
		$userId = $dbc->real_escape_string($_POST['user']); 
		$sql = "DELETE FROM favourites WHERE user_id = '$userId' AND product_id = '$productId'"; 
		$dbc->query($sql); 
		echo "Success";
	}
?>