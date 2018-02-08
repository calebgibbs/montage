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

	case 'sustainability':
		require 'app/controllers/SustainabilityController.php'; 
		$controller = new SustainabilityController($dbc);	 
	break; 

	case 'our_story':
		require 'app/controllers/OurStoryController.php'; 
		$controller = new OurStoryController($dbc);	 
	break;

	case 'products':
		require 'app/controllers/ProductsController.php'; 
		$controller = new ProductsController($dbc);	 
	break;  

	case 'product':
	 	require 'app/controllers/ProductController.php'; 
		$controller = new ProductController($dbc);
	break;  

	case 'portfolio':
	 	require 'app/controllers/PortfolioController.php'; 
		$controller = new PortfolioController($dbc);
	break;  

	case 'portfolios':
	 	require 'app/controllers/PortfoliosController.php'; 
		$controller = new PortfoliosController($dbc);
	break;  

	case 'search':
	 	require 'app/controllers/SearchController.php'; 
		$controller = new SearchController($dbc);
	break;

	case 'workstations_screens':
	 	require 'app/controllers/WorkstationsScreensController.php'; 
		$controller = new WorkstationsScreensController($dbc);
	break; 

	case 'storage':
	 	require 'app/controllers/StorageController.php'; 
		$controller = new StorageController($dbc);
	break;

	case 'agile_furniture':
	 	require 'app/controllers/AgileFurnitureController.php'; 
		$controller = new AgileFurnitureController($dbc);
	break; 

	case 'chairs':
	 	require 'app/controllers/ChairsController.php'; 
		$controller = new ChairsController($dbc);
	break;  

	case 'tech_accesories':
	 	require 'app/controllers/TechAndAccesoriesController.php'; 
		$controller = new TechAndAccesoriesController($dbc);
	break; 

	case 'tables':
	 	require 'app/controllers/TablesController.php'; 
		$controller = new TablesController($dbc);
	break; 

	case 'joinery_custom':
	 	require 'app/controllers/JoineryAndCustomController.php'; 
		$controller = new JoineryAndCustomController($dbc);
	break;

	case 'manage_accounts':
		require 'app/controllers/ManageAccountsController.php'; 
		$controller = new ManageAccountsController($dbc);	 
	break;  

	case 'manage_products':
		require 'app/controllers/ManageProductsController.php'; 
		$controller = new ManageProductsController($dbc);	 
	break;

	case 'results':
		require 'app/controllers/ResultsController.php'; 
		$controller = new ResultsController($dbc);	 
	break; 

	case 'downloads':
		require 'app/controllers/DownloadsController.php'; 
		$controller = new DownloadsController($dbc);	 
	break; 

	case 'contact':
		require 'app/controllers/ContactController.php'; 
		$controller = new ContactController($dbc);	 
	break;

	case 'login':
		require 'app/controllers/LoginController.php'; 
		$controller = new LoginController($dbc);	 
	break; 

	case 'signup':
		require 'app/controllers/SignupController.php'; 
		$controller = new SignupController($dbc);	 
	break; 

	case 'logout':
		unset($_SESSION['id']);
		unset($_SESSION['first_name']);
		unset($_SESSION['email']);
		unset($_SESSION['company']);
		unset($_SESSION['account_status']);
		unset($_SESSION['account_type']); 
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

	case 'help':
		require 'app/controllers/HelpController.php'; 
		$controller = new HelpController($dbc);	 
	break;

	case 'edit':
		require 'app/controllers/EditProductController.php'; 
		$controller = new EditProductController($dbc);	 
	break;

	default:
		require 'app/controllers/Error404Controller.php';
		$controller = new Error404Controller();
	break;
} 

$controller -> buildHTML();