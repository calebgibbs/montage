<?php
require 'app/controllers/FavouritesController.php';   
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
						<input type="text" id="email" name="email" class="inputText" required> 
						<span class="floating-label">Email</span>
						<span class="input-message" id="email-message"></span>
					</div>
					<div>
						<input type="password" id="password" name="password" class="inputText" required> 
						<span class="floating-label">Password</span>
						<span class="input-message" id="password-message"></span>
					</div>  
					<div>
						<input type="checkbox" name="keepMeLoggedIn">Keep me logged in
					</div>
					<div>
						<button id="log-in-button" name="login">Sign in</button>
					</div>
				</form> 
				<button class="link-btn" id="gtsu">Don't have an account? <i>Sign up</i></button>
				<button class="link-btn" id="gtcp">Forget your password? </button>
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
						<input id="SUemail" type="text" name="email" class="inputText" required> 
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
			<div id="passwordReset">
				<button class="link-btn back-btn">&#8592; Favourites</button> 
				<form>
					<div class="reset-form">
						<div>
							<input type="text" name="emailReset" id="emailReset" required> 
							<span class="floating-label">Your email</span>
							<span class="input-message" id="reset-email-message"></span>
						</div> 
						<div>
							<button id="change-p-btn" name="reset">Reset password</button>
						</div>
					</div>
				</form>  
				<button class="link-btn" id="gtsi">&#8592; Back</button> 
				<div class="reset-success">
					<span>Thank you</span> 
					<span>A password reset link has been sent to your email.</span>
				</div>
			</div>
		<?php endif ?>  
		<?php if(isset($_SESSION['id'])): ?> 
			<div id="account-form">
				<button class="link-btn back-btn">&#8592; Favourites</button>
				<form method="post">
					<div>
						<input id="MAname" type="text" name="name" class="inputText" value="<?= $name ?>" required> 
						<span class="floating-label">Your name</span>  
						<span class="input-message" id="MAaccountMsg"></span>
						<button id="nameUpdate" value="<?= $_SESSION['id'] ?>" type="sumbit" name="updateName">Update</button>
					</div>
				</form>
				<form method="post">
					<div>
						<input id="MAemail" type="text" name="email" class="inputText" value="<?= $email ?>" required> 
						<span class="floating-label">Your email</span>
						<span class="input-message" id="MAemailMsg"></span> 
						<button id="emailUpdate" value="<?= $_SESSION['id'] ?>" type="sumbit" name="updateEmail">Update</button>
					</div> 
				</form>
				<form method="post">
					<div>
						<input id="MAcompany" type="text" name="company" class="inputText" value="<?= $company ?>" required> 
						<span class="floating-label">Your company</span>
						<span class="input-message" id="MAcompanyMsg"></span>
						<button id="companyUpdate" value="<?= $_SESSION['id'] ?>" type="sumbit" name="updateCompany">Update</button>
					</div>
				</form> 

				<button id="changePwdTrig" value="<?= $_SESSION['id'] ?>">Change Password</button>
				<?php if($emailStatus === 'yes'): ?>
					<div>
						<button id="elistUn" value="<?= $_SESSION['id'] ?>">Unsubscribe from mailing list</button>
					</div> 
				<?php endif ?> 
				<?php if($emailStatus != 'yes'): ?>
					<div>
						<button id="elistSub" value="<?= $_SESSION['id'] ?>">Subscribe to mailing list</button>
					</div> 
				<?php endif ?> 
				<div>
					<button id="delAccount" value="<?= $_SESSION['id'] ?>">Delete Account</button> 
					<div id="delPinput">
						<form>
							<input id="DelaccPwd" type="password" name="company" class="inputText"" required> 
							<span class="floating-label">Confirm with password</span> 
							<button id="delConfirm" value="<?= $_SESSION['id'] ?>" type="sumbit" name="updateCompany">Delete</button>	
						</form>
					</div>
				</div>
				
			</div>  
			<div id="changePasswords">
				<button class="link-btn to-details">&#8592; My Details</button> 
				<form method="post">
					<div>
						<input id="MAcurrentPwd" type="password" class="inputText" required> 
						<span class="floating-label">Current Password</span>
						<span class="input-message" id="MAcurrentpwdMsg"></span>
					</div>
					<div>
						<input id="MAnewPwd" type="password" class="inputText" required> 
						<span class="floating-label">New Password</span>
						<span class="input-message" id="MAnewpwdMsg"></span>
					</div>
					<div>
						<input id="MArepeatPwd" type="password" class="inputText" required> 
						<span class="floating-label">Repeat Password</span>
						<span class="input-message" id="MArepeatpwdMsg"></span> 
						<button id="pwdUpdate" type="sumbit" value="<?= $_SESSION['id'] ?>">Update</button>
					</div>
				</form>
			</div>
		<?php endif ?>
		<div id="favourite-products-all">
			<?php if(!empty($fav)): ?>
				<form method="post">
					<?php foreach($fav as $favourite): ?> 
						<?php 
						$sql = "SELECT image FROM product_images WHERE product_id = '$favourite' AND image_position = '1'"; 
						$result = $dbc->query($sql); 
						$image = $result->fetch_all(MYSQLI_ASSOC); 
						?>
						<div id="<?= $favourite ?>:<?= $_SESSION['id'] ?>:box" class="fav-prod">
							<a href="index.php?page=product&productnum=<?= $favourite ?>">
								<img src="img/products/thumbnail/<?= $image[0]['image'] ?>" width="200px" height="150px"> 
							</a>
							<?php 
							$sql = "SELECT title FROM products WHERE id = '$favourite'"; 
							$result = $dbc->query($sql); 
							$title = $result->fetch_all(MYSQLI_ASSOC); 
							?>
							<h5 class="product-title"><span><?= $title[0]['title'] ?></span></h5> 
							<button class="favDel" name="delfav" value="<?= $favourite ?>">&#10005;</button>
						</div> 
					<?php endforeach ?> 
				</form>
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
					<button id="account-trig">My Details</button> 
				</div>
				<div>
					<a href="index.php?page=logout">Log out</a>
				</div>
			<?php endif ?>
		</div>
	</div> 
</div>  