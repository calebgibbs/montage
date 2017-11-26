<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors | Log in', 
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
			<h2>Log in</h2>
			<form method="post" action="index.php?page=login">
				<div>
					<input type="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">  
					<?=  isset($emailMessage) ? $emailMessage : '' ?>
				</div> 
				<div> 
					<input class="last-input-lgi" type="password" name="pwd" placeholder="Password"> 
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