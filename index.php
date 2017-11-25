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

	default:
		require 'app/controllers/Error404Controller.php';
		$controller = new Error404Controller();
	break;
} 

$controller -> buildHTML();