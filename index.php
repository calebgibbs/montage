<?php   
date_default_timezone_set('Pacific/Auckland'); 

session_start();  

if(isset($_SESSION['id'])){ 
	if ($_SESSION['id'] == 1) {
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
	}
}

if(!isset($_SESSION['id'])){ 	
	if (isset($_COOKIE['key'])) {
		require 'app/controllers/autologin.php';
	}
}
require 'vendor/autoload.php';
require 'app/controllers/PageController.php';   

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

require_once '../config.inc.php';  
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);   



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

	case 'bespoke':
	require 'app/controllers/BespokeController.php'; 
	$controller = new BespokeController($dbc);
	break; 

	case 'personal':
	require 'app/controllers/PersonalController.php'; 
	$controller = new PersonalController($dbc);
	break; 

	case 'team':
	require 'app/controllers/TeamController.php'; 
	$controller = new TeamController($dbc);
	break;

	case 'agile_furniture':
	require 'app/controllers/AgileFurnitureController.php'; 
	$controller = new AgileFurnitureController($dbc);
	break;  

	case 'team_collab': 
	require 'app/controllers/TeamCollabController.php'; 
	$controller = new TeamCollabController($dbc); 
	break; 

	case 'breakout': 
	require 'app/controllers/BreakoutController.php'; 
	$controller = new BreakoutController($dbc); 
	break;

	case 'focus': 
	require 'app/controllers/FocusController.php'; 
	$controller = new FocusController($dbc); 
	break;

	case 'seating':
	require 'app/controllers/ChairsController.php'; 
	$controller = new ChairsController($dbc);
	break; 

	case 'soft':
	require 'app/controllers/SoftController.php'; 
	$controller = new SoftController($dbc);
	break;

	case 'task':
	require 'app/controllers/TaskController.php'; 
	$controller = new TaskController($dbc);
	break; 

	case 'visitor_hospitality':
	require 'app/controllers/VisitorHospController.php'; 
	$controller = new VisitorHospController($dbc);
	break; 

	case 'stools':
	require 'app/controllers/StoolController.php'; 
	$controller = new StoolController($dbc);
	break; 

	case 'meeting_room':
	require 'app/controllers/MeetingRoomController.php'; 
	$controller = new MeetingRoomController($dbc);
	break;

	case 'tech_accesories':
	require 'app/controllers/TechAndAccesoriesController.php'; 
	$controller = new TechAndAccesoriesController($dbc);
	break; 

	case 'screen_workstation':
	require 'app/controllers/ScreenWorkstationController.php'; 
	$controller = new ScreenWorkstationController($dbc);
	break; 

	case 'tech':
	require 'app/controllers/TechController.php'; 
	$controller = new TechController($dbc);
	break;  

	case 'monitor_arms':
	require 'app/controllers/MonitorController.php'; 
	$controller = new MonitorController($dbc);
	break; 

	case 'miscellaneous':
	require 'app/controllers/MiscellaneousController.php'; 
	$controller = new MiscellaneousController($dbc);
	break;

	case 'tables':
	require 'app/controllers/TablesController.php'; 
	$controller = new TablesController($dbc);
	break; 

	case 'meeting_breakout':
	require 'app/controllers/MeetingBreakoutController.php'; 
	$controller = new MeetingBreakoutController($dbc);
	break;  

	case 'coffeeTables':
	require 'app/controllers/CoffeeTablesController.php'; 
	$controller = new CoffeeTablesController($dbc);
	break; 

	case 'leaners':
	require 'app/controllers/LeanersController.php'; 
	$controller = new LeanersController($dbc);
	break;

	case 'joinery_custom':
	require 'app/controllers/JoineryAndCustomController.php'; 
	$controller = new JoineryAndCustomController($dbc);
	break;  

	case 'joinery':
	require 'app/controllers/JoineryController.php'; 
	$controller = new JoineryController($dbc);
	break; 

	case 'custom':
	require 'app/controllers/CustomController.php'; 
	$controller = new CustomController($dbc);
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
	unset($_SESSION['favourites']); 
	setcookie("key", '', time() - (86400 * 30), '/'); 
	header('Location: index.php'); 
	break;  

	case 'change_password':
	require 'app/controllers/ChangepwdController.php'; 
	$controller = new ChangepwdController($dbc);	 
	break; 

	case 'register':
	require 'app/controllers/AdminController.php'; 
	$controller = new AdminController($dbc);	 
	break;

	case 'add_product':
	require 'app/controllers/AddproductController.php'; 
	$controller = new AddproductController($dbc);	 
	break;  

	case 'add_portfolio':
	require 'app/controllers/AddPortfolioController.php'; 
	$controller = new AddPortfolioController($dbc);	 
	break; 

	case 'settings': 
	require 'app/controllers/SettingsController.php'; 
	$controller = new SettingsController($dbc); 
	break; 

	case 'reset': 
	require 'app/controllers/ResetController.php'; 
	$controller = new ResetController($dbc); 
	break;

	case 'help':
	require 'app/controllers/HelpController.php'; 
	$controller = new HelpController($dbc);	 
	break;

	case 'edit':
	require 'app/controllers/EditProductController.php'; 
	$controller = new EditProductController($dbc);	 
	break;

	case 'edit_port':
	require 'app/controllers/EditPortfolioController.php'; 
	$controller = new EditPortfolioController($dbc);	 
	break;

	default:
	require 'app/controllers/Error404Controller.php';
	$controller = new Error404Controller();
	break;
} 
$controller -> buildHTML();   


