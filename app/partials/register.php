<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors | Register', 
		'desc' => 'montage interiors website staff log in' 
	]);  
?>
<div class="body"> 
	<div id="login-outer">
		<div class="circle">
			<div circle-inner>
				<img src="img/logo-min.png">
			</div>
		</div> 
		<div id="form-box"> 
			<h2>Add user</h2>
			<form method="post" action="index.php?page=register">
				<div>
					<input type="text" name="fname" placeholder="First Name" value="<?= isset($_POST['fname']) ? $_POST['fname'] : '' ?>">  
					<?=  isset($fnameMessage) ? $fnameMessage : '' ?>
				</div> 
				<div>
					<input type="text" name="lname" placeholder="Last Name" value="<?= isset($_POST['lname']) ? $_POST['lname'] : '' ?>">
					<?=  isset($lnameMessage) ? $lnameMessage : '' ?> 
				</div> 
				<div> 
					<input type="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
					<?=  isset($email1Message) ? $email1Message : '' ?>
				</div>  
				<div> 
					<input type="email" name="email2" placeholder="Repeat email" value="<?= isset($_POST['email2']) ? $_POST['email2'] : '' ?>"> 
					<?=  isset($email2Message) ? $email2Message : '' ?>
				</div> 
				<div> 
					<p>Password will be the users email address for thier first log in</p>
				</div>
				<div>
					<button name="register">Register User</button>
				</div>
			</form>
		</div>	 
	</div>
</div>