<div id="overlay">
	<div id="favourites">
		<div class="fav-title">
			<h4>Favourites <button id="close-fav">&#10005;</button></h4>
		</div>  
		<?php if(!isset($_SESSION['id'])): ?>
			<div id="login-form">
				<button class="link-btn back-btn">&#8592; Favourites</button>
				<form id="logmein" method="post" action="index.php?page=login"> 
					<div>
						<input type="email" id="email" name="email" class="inputText" required"> 
						<span class="floating-label">Email</span>
						<span class="input-message" id="email-message"></span>
					</div>
					<div>
						<input type="password" id="password" name="password" class="inputText" required"> 
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
				<form>
					<div>
						<input type="text" name="name" class="inputText" required value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>"> 
						<span class="floating-label">Your name</span> 
						<?= $_SESSION['currentPage'] ?>
					</div>
					<div>
						<input type="email" name="email" class="inputText" required value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"> 
						<span class="floating-label">Your email</span>
					</div> 
					<div>
						<input type="text" name="company" class="inputText" required value="<?= isset($_POST['company']) ? $_POST['company'] : '' ?>"> 
						<span class="floating-label">Your company</span>
					</div>
					<div>
						<input type="password" name="password" class="inputText" required> 
						<span class="floating-label">Password</span>
					</div>
					<div>
						<input type="password" name="password2" class="inputText" required> 
						<span class="floating-label">Repeat password</span>
					</div>
					<div>
						<button>Sign up</button>
					</div>
				</form> 
				<button class="link-btn" id="gtli" >Already have an account? <i>Log in</i></button>
			</div>
		<?php endif ?> 
		<div id="favourite-products-all">
		<?php for( $i = 0; $i < 2; $i++ ): ?> 
			<div class="fav-prod">
				<img src="http://placehold.it/200x150"> 
				<span class="product title">Title</span>
			</div>
		<?php endfor ?>
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