<?php 
if(isset($_SESSION['favourites'])){
	$fav = json_decode($_SESSION['favourites'], true);  
	$fav = array_reverse($fav);
	if (!$fav) {
		$fav = array();
	}
}else{ 
	$cookie = isset($_COOKIE['favourites']) ? $_COOKIE['favourites'] : "";
	$cookie = stripslashes($cookie);
	$fav = json_decode($cookie, true);
	if (!$fav) {
		$fav = array();
	}
} 
$favTotal = count($fav); 
?>
<nav id="navigation">
	<div class="mobile-nav">
		<a href="index.php?page=home"><img src="img/logo.png" alt="Montage interiors logo"></a> 
		<button class="menu-button">
			<div id="hamburger-btn" class="nav-icon cross"> 
				<div class="span"></div>
			</div>
		</button> 
	</div>  	
	<div id="menu"> 
		<ul> 	
			<li class="mobileSearch">
				<form  method="post" action="index.php?page=search">
					<input type="text" name="s" id="search-feild-mobile"><button class="search-button"><i class="fa fa-search search-btn" aria-hidden="true"></i></button> 
				</form>	
			</li>
			<li class="main-menu menu-item homeIcn"><a href="index.php" class="main-menu"><span class="desktop-link"><i class="fa fa-home"></i></span></a></li>
			<li class="main-menu menu-item"><a href="index.php?page=our_story" class="main-menu"><span class="desktop-link">Our Story</span></a></li>
			<li class="main-menu">
				<a href="index.php?page=products" class="main-menu drop-trigger desktop-link">Products</a>
				<ul id="drop-down">
					<li><a class="drop-item" href="index.php?page=desks_screens">Desks + Screens</a></li> 
					<li><a class="drop-item" href="index.php?page=storage">Storage</a></li>
					<li><a class="drop-item" href="index.php?page=agile_furniture">Agile Furniture</a></li>
					<li><a class="drop-item" href="index.php?page=seating">Seating</a></li>
					<li><a class="drop-item" href="index.php?page=tech_accesories">Tech + Accesories</a></li>
					<li><a class="drop-item" href="index.php?page=tables">Tables</a></li> 
					<li><a class="drop-item" href="index.php?page=joinery_custom">Joinery + Custom</a></li>
				</ul>
			</li> 
			<li class="main-menu menu-item"><a href="index.php?page=portfolios" class="main-menu">Portfolio</a></li> 
			<li class="main-menu menu-item tabletBreak"></li> 	
			<li class="main-menu menu-item contact"><a href="index.php?page=contact" class="main-menu">Contact</a></li> 
			<li class="main-menu menu-item favourites-nav"><a href="#" class="fav-tog">Favourites <span class="mobile-f-counter"><?php if($favTotal != 0): ?>(<?= $favTotal ?>)<?php endif ?></span></a><span class="hide-sm"><div id="diamond-narrow"></div></span><?php if($favTotal != 0): ?><div class="circleCounter"><p><?= $favTotal ?></p></div><?php endif ?></li> 
			<li class="main-menu menu-item mobile-fav"><a href="index.php?page=favourites">Favourites<span class="mobile-f-counter"><?php if($favTotal != 0): ?>(<?= $favTotal ?>)<?php endif ?></span></a></li>
			<li class="search desktopSearch" id="safari-search"> 
				<form id="desktopSearchBar" action="index.php?page=search" method="post">
					<input type="text" name="s"><button class="search-button"><i class="fa fa-search search-btn" aria-hidden="true"></i></button> 
				</form>
			</li> 	
		</ul>
	</div> 
</nav>  