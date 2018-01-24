<?php 
abstract class  PageController{ 
	protected $title; 
	protected $metaDesc; 
	protected $dbc; 
	protected $plates; 
	protected $data = []; 
	public function __construct() { 
		$this->plates = new League\Plates\Engine('app/partials'); 
	} 
	abstract public function buildHTML(); 
	public function privatePage() { 
		if(!isset($_SESSION['id'])){ 
			header('Location: index.php?page=error404'); 
		}elseif($_SESSION['account_status'] == 'not_active' && $_SESSION['account_type'] == 'admin'){ 
			header('Location: index.php?page=change_password');	
		}elseif ($_SESSION['account_type'] == 'user') {
			header('Location: index.php?page=error404');
		}
	} 
	public function nonActiveAccount(){ 
		if ($_SESSION['account_status'] != 'not_active') {
			header('Location: index.php?page=error404'); 
		}
	}   
	public function loggedOut(){ 
		if (isset($_SESSION['id'])) {
			header('Location: index.php');
		}
	}
} 