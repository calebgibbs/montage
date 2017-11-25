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
			<form>
				<div>
					<input type="email" name="email" placeholder="Email">
				</div> 
				<div> 
					<input type="password" name="pwd" placeholder="Password">
				</div> 
				<div>
					<button>Log in</button>
				</div>
			</form>
		</div>	 
	</div>
</div>