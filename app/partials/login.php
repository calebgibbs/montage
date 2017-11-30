<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors | Log in', 
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
			<h2>Log in</h2>
			<form method="post" action="index.php?page=login">
				<div>
					<input type="email" name="email" class="inputText" required value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"> 
					<span class="floating-label">Email</span> 
					<?=  isset($emailMessage) ? $emailMessage : '' ?>
				</div> 
				<div> 
					<input class="last-input-lgi inputText" type="password" name="pwd" required> 
					<span class="floating-label">Password</span>
					<?=  isset($passwordMessage) ? $passwordMessage : '' ?>
				</div>
				<div class="login-button">
					<button name="login">Log in</button>
					<?=  isset($buttonMessage) ? $buttonMessage : '' ?> 
				</div>
			</form>
		</div>	 
	</div>
</div>