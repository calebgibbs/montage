<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors', 
	'desc' => 'website settings page' 
]);   
?> 
<div class="body"> 
	<h1>Settings</h1>
	<div class="inner"> 
		<h3>Site Admins</h3>
		<table>
			<tr>
				<th>Name</th> 
				<th>Email</th>
				<th>Remove</th>
			</tr>  
			<?php foreach($allAdmins as $admin):  ?> 
				<tr class="productj-data">
					<td class="prod-table"><?= $admin['first_name'] ?></td> 
					<td><?= $admin['email'] ?></td>
					<td class="prod-table">
						<form method="post">
							<button name="removeAdmin" value="<?= $admin['id'] ?>">Remove</button>
						</form>
					</td>
				</tr>  
			<?php endforeach ?> 
		</table>  
		<form method="post">
			<button id="addAdminBtn" name="addAdmin">Add an admin</button>
		</form>  
		<h3>Mailing list</h3>
		<table id="mailListTable">
			<tr>
				<th>Name</th> 
				<th>Company</th>
				<th>Email</th>
			</tr>  
			<?php foreach($emailList as $email):  ?> 
				<tr class="productj-data">
					<td class="prod-table"><?= $email['first_name'] ?></td> 
					<td><?= $email['company'] ?></td>
					<td class="prod-table"><?= $email['email'] ?></td>
				</tr>  
			<?php endforeach ?> 
		</table> 
	</div> 
</div> 