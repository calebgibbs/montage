<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors | Help', 
		'desc' => 'montage interiors Staff help page' 
	]);   
	$_SESSION['page'] = $_SERVER['REQUEST_URI'];
?> 
<div class="body"> 
	<h2>Site management help</h2> 
	<h3>Adding a product or portfolio</h3>  
	<p>To add a product or a portfolio: Select ‘Add product’ or ‘Add portfolio’. Theres options are under the ‘Products’ option in the admin navigation. </p> 
	<p>Once you are on this page you can add the title, category, supplier, description, features, options and suggestions and images from this form. </p> 
	<p><i>If you are having trouble adding images - make sure that the image name on your computer does not contain any spaces.</i></p>
	<h3>Editing and Deleting a product or portfolio</h3> 
	<p>To edit a product or portfolio you must go to the product page. When you are logged in you will be able to see an ‘edit’ link above the main image.</p> 
	<p>This will take you through to a page where you can change everything about the product or portfolio (title, supplier, category, description, features, options, links and images).</p> 
	<p>From this page you will also be able to delete the product from the delete button at the bottom of the form.</p>
	<h3>My account details</h3>  
	<p>You can change your account details from the favourites tab. Click on the ‘my details’ button above the ‘log out’ button at the bottom of the tab.</p>
	<p>From here you are able to change your; name, email address, name of your company, password, subscribe/unsubscribe from the mailing list or delete your account.</p> 
	<h3>Admin accounts</h3>  
	<p>To add a new admin account go to the settings page. The top table on this page will show you all of the admins on the website currently. At the bottom of this table there is an ‘add admin’ button.</p>
	<p>Add the new users name and email address and they will be added to the site. Their password for their first time logging in will be their emails address - the site will prompt them to change this the first time they log in.</p> 
	<p>From the admin table you will also be able to remove accounts from the site. This will not delete their account - it will only change their account privileges. </p>
	<h3>Mailing list</h3>
</div>