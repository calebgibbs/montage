<div id="site-nav"> 
	<ul>
		<?php if($_SESSION['account_status'] == 'active' ): ?>
			<li class="products-drop-t">Products 
				<ul>
					<li class="products-drop-l"><a href="index.php?page=manage_products">All Products</a></li>
					<li class="products-drop-l"><a href="index.php?page=add_product">Add Product</a></li> 
					<li class="products-drop-l"><a href="index.php?page=add_portfolio">Add to Portfolio</a></li>
				</ul>
			</li> 
			<li><a href="index.php?page=settings">Settings</a></li>
			<li><a href="index.php?page=help">Help</a></li> 
		<?php endif; ?> 
		<?php if($_SESSION['account_status'] == 'not_active' ): ?> 
			<li><a href="index.php?page=change_password">Activate Account</a></li>
		<?php endif; ?> 
	</ul>
</div> 
