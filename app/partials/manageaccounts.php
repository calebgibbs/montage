<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Accounts', 
	'desc' => 'montage interiors website staff log in' 
]);  
$prevPage = $_SERVER['REQUEST_URI']; 
?> 
<div class="body">
	 
	<div class="inner">
		<h1>Accounts</h1>
		<table>
			<tr>
				<th>User</th>
				<th>Email</th> 
				<th>Password</th>
			</tr> 
			<tr>
				<td><?= $_SESSION['first_name'] ?></td>
				<td><?= $_SESSION['email'] ?></td> 
				<td><button href="index.php?page=my_account">Change Password</button></td>
			</tr> 
			<?php foreach($allUsers as $user):  ?> 
			<?php if($user['account_status'] == 'active'): ?>
			<tr>
				<td><?= $user['first_name'] ?></td>
				<td><?= $user['email'] ?></td> 
				<td>
					<form method="post" action="index.php?page=manage_accounts">
						<button name="resetPassword" value="<?= $user['id'] ?>">Reset password</button>
					</form>
				</td>
			</tr> 
			<?php endif ?>
			<?php if($user['account_status'] == 'not_active'): ?>
			<tr>
				<td><?= $user['first_name'] ?></td>
				<td><?= $user['email'] ?></td> 
				<td></td>
			</tr> 
			<?php endif ?>
			<?php endforeach ?>
		</table>
	</div>
</div>