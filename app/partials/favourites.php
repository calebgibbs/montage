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