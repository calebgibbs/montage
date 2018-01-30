<nav id="navigation">
	<div class="mobile-nav">
		<a href="index.php?page=home"><img src="img/logo1.png" alt="Montage interiors logo"></a> 
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
					<input type="text" name="searchResult" id="search-feild-mobile"><button class="search-button"><i class="fa fa-search search-btn" aria-hidden="true"></i></button> 
				</form>	
			</li>
			<li class="main-menu menu-item"><a href="index.php?page=home" class="main-menu"><span class="desktop-link">Our Story</span></a></li>
			<li class="main-menu">
				<a href="index.php?page=products" class="main-menu drop-trigger desktop-link">Products</a>
				<ul id="drop-down">
					<li><a class="drop-item" href="index.php?page=workstations_screens">Workstations</a></li> 
					<li><a class="drop-item" href="index.php?page=workstations_screens">Screens</a></li>
					<li><a class="drop-item" href="index.php?page=storage">Storage</a></li>
					<li><a class="drop-item" href="index.php?page=agile_furniture">Agile Furniture</a></li>
					<li><a class="drop-item" href="index.php?page=chairs">Chairs</a></li>
					<li><a class="drop-item" href="index.php?page=tech_accesories">Tech &amp; Accesories</a></li>
					<li><a class="drop-item" href="index.php?page=tables">Tables</a></li> 
					<li><a class="drop-item" href="index.php?page=joinery_custom">Joinery &amp; Custom</a></li>
				</ul>
			</li> 
			<li class="main-menu menu-item"><a href="#" class="main-menu">Portfolio</a></li> 
			<li class="main-menu menu-item tabletBreak"></li> 	
			<li class="main-menu menu-item hide-sm"><a href="index.php?page=downloads" class="main-menu">Downloads</a></li>
			<li class="main-menu menu-item contact"><a href="index.php?page=contact" class="main-menu">Contact</a></li> 
			<li class="main-menu menu-item favourites-nav"><a href="#" class="fav-tog">Favourites</a><span class="hide-sm"><div id="diamond-narrow"></div></span></li> 
			<li class="main-menu menu-item tabletSearch">
				<button class="openSearch"><i class="fa fa-search search-btn" aria-hidden="true"></i></button> 
			</li>
			<li class="search desktopSearch"> 
				<form  method="post" action="index.php?page=search">
					<input type="text" name="searchResult" id="search-feild"><button class="search-button"><i class="fa fa-search search-btn" aria-hidden="true"></i></button> 
				</form>
			</li> 	
		</ul>
	</div> 
</nav>