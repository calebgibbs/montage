<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors | Register', 
		'desc' => 'montage interiors add an admin account' 
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
			<h2>Add an admin</h2>
			<form method="post" action="index.php?page=register" novalidate> 
				<div>
					<input type="text" name="fname" class="inputText" required value="<?= isset($_POST['fname']) ? $_POST['fname'] : '' ?>"> 
					<span class="floating-label">Name</span> 
					<?=  isset($fnameMessage) ? $fnameMessage : '' ?>
				</div> 
				<div>
					<input id="emailTest" type="email" name="email" class="inputText" required value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"> 
					<span class="floating-label">Email</span> 
					<?=  isset($email1Message) ? $email1Message : '' ?>
				</div> 
				<div class="regAdmin">
					<input id="emailreg2" type="email" name="email2" class="inputText" required value="<?= isset($_POST['email2']) ? $_POST['email2'] : '' ?>"> 
					<span class="floating-label">Repeat Email</span> 
					<?=  isset($email2Message) ? $email2Message : '' ?>
				</div>  
				<div class="regAdmin"> 
					<p class="reg-p">The password will be the users email address for the first time they log in</p>
				</div>
				<div class="regAdmin">
					<button name="register">Register User</button>
				</div> 
				<div>
					<button class='updateUser' name="updateUser">Change User Privilege</button>
				</div>
			</form>
		</div>	 
	</div>
</div>