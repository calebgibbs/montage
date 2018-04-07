<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Settings', 
	'desc' => 'website settings page settings' 
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
		<div>
			<h3>Contact Page Managers</h3> 
			<table id="contact-managers-tb">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th> 
					<th>Options</th>
				</tr> 
				<?php foreach($managers as $manager): ?> 
					<tr>
						<form method="post" action="index.php?page=settings">
							<td><?= $manager['name'] ?></td>
							<td><?= $manager['email'] ?></td>
							<td><?= $manager['phone'] ?></td> 
							<td>
								<button name="removeManager" value="<?= $manager['id'] ?>">Remove</button>
								<button class="edit-manager" value="<?= $manager['id'] ?>" name="editManager">Edit</button>
							</td> 
						</tr> 
						<tr class="edit-row" id="edit<?= $manager['id'] ?>">
							<td><input type="text" name="name" value="<?= $manager['name'] ?>"></td> 
							<td><input type="email" name="email" value="<?= $manager['email'] ?>"></td> 
							<td><input type="tel" name="phone" value="<?= $manager['phone'] ?>"></td> 
							<td><button name="saveMan" class="save-btn" type="submit" value="<?= $manager['id'] ?>">Save</button></td>
						</tr> 
					</form>
				<?php endforeach ?>
			</table>
		</div> 
	</div> 
</div> 