<div id="site-nav"> 
	<ul>
		<?php if($_SESSION['account_status'] == 'active' ): ?>
			<li class="settings-drop-t">Settings
				<ul>
					<li class="settings-drop-l"><a href="index.php?page=contact_info">Contact Information</a></li>
					<li class="settings-drop-l"><a href="index.php?page=my_account">My Details</a></li>
					<li class="settings-drop-l"><a href="index.php?page=manage_accounts">Manage Accounts</a></li>
					<li class="settings-drop-l"><a href="index.php?page=register">Register Account</a></li>
					<li class="settings-drop-l"><a href="index.php?page=nav_links">Navigation Links</a></li>
				</ul>
			</li>
			<li class="products-drop-t">Products 
				<ul>
					<li class="products-drop-l"><a href="index.php?page=manage_products">All Products</a></li>
					<li class="products-drop-l"><a href="index.php?page=add_product">Add Product</a></li>
				</ul>
			</li>
		<?php endif; ?> 
		<?php if($_SESSION['account_status'] == 'not_active' ): ?> 
			<li><a href="index.php?page=change_password">Activate Account</a></li>
		<?php endif; ?> 
		<li><a href="index.php?page=logout">Log out</a></li>
	</ul>
</div>