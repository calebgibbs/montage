<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors | Change Password', 
		'desc' => 'montage interiors website staff log in' 
	]);   
	$prevPage = $_SERVER['QUERY_STRING'];
?>
<div class="body"> 
	<div id="login-outer">
		<div class="circle">
			<div circle-inner>
				<img src="img/logo-min.png">
			</div>
		</div> 
		<div id="form-box"> 
			<h2>Welcome, <?= $_SESSION['first_name'] ?></h2> 
			<p>Before we get started, you just need to change your password to set up your account</p>
			<form method="post" action="index.php?page=change_password">
				<div>
					<input type="password" name="pwd1" class="inputText" required> 
					<span class="floating-label">New Password</span> 
					<?=  isset($password1Message) ? $password1Message : '' ?>
				</div> 
				<div> 
					<input class="last-input-lgi" type="password" name="pwd2"  class="inputText" required>
					<span class="floating-label">Repeat password</span> 
					<?=  isset($password2Message) ? $password2Message : '' ?>
				</div>
				<div class="login-button">
					<button name="update">Update Password</button> 
				</div>
			</form>
		</div>	 
	</div>
</div>