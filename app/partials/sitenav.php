<div id="site-nav"> 
	<ul>
		<?php if($_SESSION['account_status'] == 'active' ): ?>
			<li>My account</li>
			<li>View Products</li>
			<li><a href="index.php?page=add_product">Add Product</a></li> 
		<?php endif; ?> 
		<?php if($_SESSION['account_status'] == 'not_active' ): ?> 
			<li><a href="index.php?page=change_password">Activate Account</a></li>
		<?php endif; ?> 
		<li><a href="index.php?page=logout">Log out</a></li>
	</ul>
</div>