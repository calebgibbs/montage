<?php
$fav = [];

if(isset($_SESSION['id'])){ 
	$dbc = new mysqli('localhost', 'root', 'password', 'montage'); 
	$id = $_SESSION['id'];
	$sql = "SELECT product_id FROM favourites WHERE user_id = '$id'"; 
	$result = $dbc->query($sql);  
	if (!$result || $result->num_rows == 0) { 
		$favoutitesEmpty = "No favourites";
	}else{ 
		$products = $result->fetch_all(MYSQLI_ASSOC);  
		$fav = array_column($products, 'product_id'); 
	} 
} 
?>
<div id="overlay">
	<div id="favourites">
		<div class="fav-title">
			<h4><span id="fav-tab-title">Favourites</span> <button id="close-fav">&#10005;</button></h4>
		</div>  
		<?php if(!isset($_SESSION['id'])): ?>
			<div id="login-form">
				<button class="link-btn back-btn">&#8592; Favourites</button>
				<form id="logmein" method="post" action="index.php?page=login" novalidate> 
					<div>
						<input type="email" id="email" name="email" class="inputText" required> 
						<span class="floating-label">Email</span>
						<span class="input-message" id="email-message"></span>
					</div>
					<div>
						<input type="password" id="password" name="password" class="inputText" required> 
						<span class="floating-label">Password</span>
						<span class="input-message" id="password-message"></span>
					</div> 
					<div>
						<button id="log-in-button" name="login">Sign in</button>
					</div>
				</form> 
				<button class="link-btn" id="gtsu">Don't have an account? <i>Sign up</i></button>
			</div>
			<div id="signup-form">
				<button class="link-btn back-btn">&#8592; Favourites</button>
				<form method="post" action="index.php?page=signup">
					<div>
						<input id="SUname" type="text" name="name" class="inputText" required> 
						<span class="floating-label">Your name</span> 
						<span class="input-message" id="su-name-message"></span>
					</div>
					<div>
						<input id="SUemail" type="email" name="email" class="inputText" required> 
						<span class="floating-label">Your email</span>
						<span class="input-message" id="su-email-message"></span>
					</div> 
					<div>
						<input id="SUcompany" type="text" name="company" class="inputText" required> 
						<span class="floating-label">Your company</span>
						<span class="input-message" id="su-company-message"></span>
					</div>
					<div>
						<input id="SUpwd1" type="password" name="password" class="inputText" required> 
						<span class="floating-label">Password</span>
						<span class="input-message" id="su-pass1-message"></span>
					</div>
					<div>
						<input id="SUpwd2" type="password" name="password2" class="inputText" required> 
						<span class="floating-label">Repeat password</span>
						<span class="input-message" id="su-pass2-message"></span>
					</div> 
					<div> 
						<p><input type="checkbox" value="yes" name="email_list" id="checkbox"> I'd like to be contacted with the latest details from Montage</p>
					</div>
					<div>
						<button id="signup-button" name="signup">Sign up</button>
					</div>
				</form> 
				<button class="link-btn" id="gtli" >Already have an account? <i>Sign in</i></button>
			</div>
		<?php endif ?> 
		<div id="favourite-products-all">
			<?php if(!empty($fav)): ?>
				<?php foreach($fav as $favourite): ?> 
					<?php 
					$sql = "SELECT image FROM product_images WHERE product_id = '$favourite' AND image_position = '1'"; 
					$result = $dbc->query($sql); 
					$image = $result->fetch_all(MYSQLI_ASSOC); 
					?>
					<div class="fav-prod">
						<a href="index.php?page=product&productnum=<?= $favourite ?>">
						<img src="img/products/thumbnail/<?= $image[0]['image'] ?>" width="200px" height="150px"> 
						</a>
						<?php 
						$sql = "SELECT title FROM products WHERE id = '$favourite'"; 
						$result = $dbc->query($sql); 
						$title = $result->fetch_all(MYSQLI_ASSOC); 
						?>
						<h5 class="product-title"><span><?= $title[0]['title'] ?></span><button class="favDel" id="<?= $favourite ?>:<?= $_SESSION['id'] ?>">&#10005;</button></h5>
					</div> 
				<?php endforeach ?>  
			<?php endif ?> 
			<?php if(empty($fav)): ?> 
				<div class="favempty">Your favourites is currently empty</div>
			<?php endif ?>
		</div>
		<div class="buttons">
			<?php if(!isset($_SESSION['id'])): ?>
				<div>
					<button id="login-trig">Sign in</button>
				</div> 
				<div>
					<button id="signup-trig">Sign up</button>
				</div>
			<?php endif ?> 
			<?php if(isset($_SESSION['id'])): ?>
				<div>
					<a href="index.php?page=logout">Log out</a>
				</div>
			<?php endif ?>
		</div>
	</div> 
</div> 