<?php  
date_default_timezone_set('Pacific/Auckland'); 

session_start();

require 'vendor/autoload.php';
require 'app/controllers/PageController.php';  

 
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$dbc = new mysqli('localhost', 'root', 'password', 'montage'); 

switch($page){ 
	case 'home':
		require 'app/controllers/HomeController.php'; 
		$controller = new HomeController($dbc);	 
	break; 

	case 'products':
		require 'app/controllers/ProductsController.php'; 
		$controller = new ProductsController($dbc);	 
	break;  

	case 'product':
		require 'app/controllers/ProductController.php'; 
		$controller = new ProductController($dbc);	 
	break; 

	case 'results':
		require 'app/controllers/ResultsController.php'; 
		$controller = new ResultsController($dbc);	 
	break;

	case 'login':
		require 'app/controllers/LoginController.php'; 
		$controller = new LoginController($dbc);	 
	break; 

	case 'logout':
		unset($_SESSION['id']);
		unset($_SESSION['first_name']);
		unset($_SESSION['last_name']);
		unset($_SESSION['email']); 
		header('Location: index.php');
	break;  

	case 'change_password':
		require 'app/controllers/ChangepwdController.php'; 
		$controller = new ChangepwdController($dbc);	 
	break; 

	case 'register':
		require 'app/controllers/RegisterController.php'; 
		$controller = new RegisterController($dbc);	 
	break;

	case 'add_product':
		require 'app/controllers/AddproductController.php'; 
		$controller = new AddproductController($dbc);	 
	break;

	default:
		require 'app/controllers/Error404Controller.php';
		$controller = new Error404Controller();
	break;
} 

$controller -> buildHTML();