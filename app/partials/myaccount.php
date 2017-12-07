<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | My Account', 
	'desc' => 'montage interiors website staff log in' 
]);  
$prevPage = $_SERVER['REQUEST_URI']; 
?> 
<div class="body">
	<div id="my-account">
		<div class="my-account-left">
			<form method="post" action="index.php?page=my_account">
				<div class="form-input">
					<input type="text" class="inputText" name="fname" required value="<?= isset($_POST['fname']) ? $_POST['fname'] : $_SESSION['first_name'] ?>"/>
					<span class="floating-label">My Name  <?=  isset($fnameMessage) ? $fnameMessage : '' ?></span>
				</div>
				<div>
					<button class="my-account-button">Save</button>
				</div>
			</form>
			<form method="post" action="index.php?page=my_account">
				<div class="form-input">
					<input type="text" class="inputText" name="lname" required value="<?= isset($_POST['email']) ? $_POST['email'] : $_SESSION['email'] ?>"/>
					<span class="floating-label">Email  <?=  isset($emailMessage) ? $emailMessage : '' ?></span>
				</div>
				<div>
					<button class="my-account-button">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>