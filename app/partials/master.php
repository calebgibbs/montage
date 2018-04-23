<?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>
	<meta name="description" content="<?= $desc ?>"> 
	<link rel="stylesheet" type="text/css" href="css/styles.css">  
	<link rel="icon" href="img/favicon.png" type="image/x-icon" />
	<script src="https://use.fontawesome.com/228e8d7980.js"></script> 
</head>
<body> 
	<?= $this->insert('favourites') ?>
	<?= $this->insert('nav') ?> 
	<?php if($_SESSION['account_type'] == 'admin'): ?>
		<?= $this->insert('sitenav') ?> 
	<?php endif; ?>
	<div id="main-page">  
		<?= $this->section('content') ?>
		<?= $this->insert('footer') ?> 
	</div>
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>  
	<script type="text/javascript" src="js/menu-min.js"></script> 
	<script type="text/javascript" src="js/animation-min.js"></script>
	<script type="text/javascript" src="js/favourites-min.js"></script>  
	<script type="text/javascript" src="js/signupValidation-min.js"></script>
	<script type="text/javascript" src="js/loginValidation-min.js"></script>  
	<script type="text/javascript" src="js/search-min.js"></script> 
	<?php if(isset($_SESSION['id'])): ?> 
		<script type="text/javascript" src="js/account.js"></script> 
	<?php endif ?> 
	<?php if($_SESSION['account_type'] == 'admin'): ?> 
		<script type="text/javascript" src="js/admin.js"></script>
		<script type="text/javascript" src="js/validation-min.js"></script> 
	<?php endif ?>
</body>
</html> 