<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Password reset', 
	'desc' => 'montage Interiors password reset' 
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
			<h2>Hey, <?= $name ?>!<br> Let's reset your password</h2>
			<form method="post" action="index.php?page=reset&k=<?= $_GET['k'] ?>"> 
				<div>
					<input type="password" name="p1" class="inputText" value="<?= isset($_POST['p1']) ? $_POST['p1'] : '' ?>" required>
					<span class="floating-label">New Password</span> 
					<?=  isset($p1msg) ? $p1msg : '' ?>
				</div>  
				<div>
					<input type="password" name="p2" class="inputText" value="<?= isset($_POST['p2']) ? $_POST['p2'] : '' ?>" required>
					<span class="floating-label">Repeat Password</span>
					<?=  isset($p2msg) ? $p2msg : '' ?>
				</div> 
				<div>
					<button style="margin-top: 1rem" name="reset">Reset Password</button>
				</div>	
			</form>
		</div>	 
	</div>
</div>