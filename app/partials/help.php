<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors | Help', 
		'desc' => 'montage interiors Staff help page' 
	]);  
?> 
<div class="body"> 
	<article>
		<h1>Adding a new product</h1> 
		<p>To add a new product got to the ‘add product’ option underneath ‘products’ in the admin navigation bar.  
		This will take you to a new from where you can insert all of the product information. </p> 
		<p>The required fields are: Title, Category, Supplier, Description, main image and at least 1 feature and 1 option. </p> 
		<h2>Suggested Options</h2> 
		<p>To add a  suggested option to the product; you need to add the word(s) you wish to become hyperlinked in the option on the left-hand side of the form and you must add the hyperlink under the option link opposite on the left hand side of the form. </p> 
		<h2>Downloads</h2> 
		<p>To add a download to a product we are using an external service called <a href="https://sabercathost.com/" target="_blank">SaberCat</a></p> 
		<p><a href="https://sabercathost.com/" target="_blank">SaberCat</a> will allow us to upload and store files that we want to be downloaded and generate a download link which we will then include when uploading the product. To use <a href="https://sabercathost.com/" target="_blank">SaberCat</a>; go to their website <a href="https://sabercathost.com/" target="_blank">here</a> and go to ‘your files’ in the navigation.</p>  
		<p>
			<button id="pwdPrompt">Get Login details for SaberCat</button> 
			<span id="getPwd">Please enter your password: <input type="password" id="getLG" placeholder="Password"><button value="<?= $_SESSION['id'] ?>" id="helpPwdSb">Submit</button><span id="HelpErMsg"></span></span> 
			<span>
				<ul id="lgDetails">
					<li id="saberU">Username: </li> 
					<li id="saberP">Password: </li>
				</ul>
			</span>
		</p> 
		<p>From this page you can upload a new file. Once the upload is complete it will generate a download link. Copy this link.</p> 
		<p>If you need to get the download link of a file you have already uploaded you can click on the the file you need the link for and this will bring up the file info. The link is under URL option.</p> 
		<p>Once you have the download link take it to the product page on our website and copy the link into ‘download link’ input on the add product page and then name the file to the left of that.</p>
		<h2>Images</h2> 
		<p>You can upload a maximum of 5 images and a minimum of 1 image to a product.</p> 
		<p>images will save in a 770 x 400px dimension so you will need to upload an image of this size or larger to avoid pixilation.</p> 
		<p><i>The website will not read an image name that you’re uploading if there are spaces in the image name.</i>
			<br> 
			<i>Valid image extension are;  jpeg, png, gif, bmp and tiff</i></p>
	</article> 
	<article>
		<h1>Editing/ Deleting a product </h1> 
		<p>To edit a product you must go to the product you want to edit. If you’re logged in as an admin, you currently are, there will be an 'edit' button in the top left hand corder of the page. This will take you to the editing form. </p> 
		<p>From here the process is much the same as you would have adding an new product. All of the current product information will be on the form. You can change, remove and edit anything you wish. </p> 
		<p><i>The title, category, supplier, main image and at least one feature and one option are all still required so these cannot be left empty.</i></p> 
		<h2>Images</h2> 
		<p>You are able to change, remove and add an image.</p>
		<p>To change an image click the change image button and upload the image you want to change it to. then click save changes at the bottom of the page.</p>
		<p>To Upload an image you must click the upload image button - once you have selected the desired image click save changes at the bottom of the page.</p>
		<p>If you want to delete an image: tick the ‘delete image’ checkbox which is in the bottom right corner next to the image that you wish to delete. Once ticked, click save changes at the bottom of the page.</p>
		<h2>Delete product</h2> 
		<p>If you want to permanently delete a product from the website you must go to the edit page. At the bottom of this page, under the ‘save changes’ button, there is a delete button. Once you click this image it you further prompt you with a yes or no option: to cancel press ‘no’ to delete press ‘yes’.</p> 
		<p><i>once a product is deleted it cannot be retrieved</i></p>
	</article>
</div>