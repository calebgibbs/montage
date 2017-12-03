<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Change Password', 
	'desc' => 'montage interiors website staff log in' 
]);  
$prevPage = $_SERVER['REQUEST_URI']; 
?>
<div class="body">  
	<div id="addp"> 
		<h1>Add a new product <?=  isset($h1Message) ? $h1Message : '' ?></h1>
		<form enctype="multipart/form-data" method="post" action="index.php?page=add_product" novalidate>
			<div class="form-input">
				<input type="text" class="inputText" name="title" required value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>"/>
 				<span class="floating-label">Product Name  <?=  isset($titleMessage) ? $titleMessage : '' ?></span>
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="brand" required value="<?= isset($_POST['brand']) ? $_POST['brand'] : '' ?>"/>
 				<span class="floating-label">Product Brand  <?=  isset($brandMessage) ? $brandMessage : '' ?></span>
			</div>
			<div class="form-textarea">
				<textarea name="desc" required id="prod-desc-ta"><?= isset($_POST['desc']) ? $_POST['desc'] : '' ?></textarea> 
				<span class="floating-label">Product description  <?=  isset($descMessage) ? $descMessage : '' ?></span>
			</div> 
			<div class="form-input">
				<input type="text" class="inputText" name="bp1" required value="<?= isset($_POST['bp1']) ? $_POST['bp1'] : '' ?>"/>
 				<span class="floating-label">Description bullet point 1  <?=  isset($desc1Message) ? $desc1Message : '' ?></span>
			</div>			
			<div class="form-input">
				<input type="text" class="inputText" name="bp2" required value="<?= isset($_POST['bp2']) ? $_POST['bp2'] : '' ?>"/>
 				<span class="floating-label">Description bullet point 2  <?=  isset($desc2Message) ? $desc2Message : '' ?></span>
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="bp3" required value="<?= isset($_POST['bp3']) ? $_POST['bp3'] : '' ?>"/>
 				<span class="floating-label">Description bullet point 3  <?=  isset($desc3Message) ? $desc3Message : '' ?></span>
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="bp4" required value="<?= isset($_POST['bp4']) ? $_POST['bp4'] : '' ?>"/>
 				<span class="floating-label">Description bullet point 4  <?=  isset($desc4Message) ? $desc4Message : '' ?></span>
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="bp5" required value="<?= isset($_POST['bp5']) ? $_POST['bp5'] : '' ?>"/>
 				<span class="floating-label">Description bullet point 5  <?=  isset($desc5Message) ? $desc5Message : '' ?></span>
			</div>  
			<div class="form-input"> 
				<select name="category" <?=  isset($selectError) ? $selectError : '' ?>>
					<?php if(isset($_POST['category'])): ?>  
						<?php 
							if ( $_POST['category'] == 'workstation') {
								$valueName = "Workstation";
							}elseif ($_POST['category'] == 'storage') {
								$valueName = "Storage";
							}elseif ($_POST['category'] == 'tech_accesories') {
								$valueName = "Tech and Accesories";
							}elseif ($_POST['category'] == 'table') {
								$valueName = "Table";
							}elseif ($_POST['category'] == 'screen') {
								$valueName = "Screen";
							}elseif ($_POST['category'] == 'agile_furniture') {
								$valueName = "Agile furniture";
							}elseif($_POST['category'] == 'chair'){
								$valueName = "Chair";
							}elseif($_POST['category'] == 'joinery_custom'){
								$valueName = "Joinery and Custom";
							}elseif($_POST['category'] == 'other'){
								$valueName = "Other";
							}else{ 
								$valueName = "Select category";	
							}
						?> 
					<option value="<?= $_POST['category'] ?>"><?= $valueName ?></option> 
					<?php endif ?>
					<?php if(!isset($_POST['category'])): ?>
					<option value="0">Select Category</option>
					<?php endif ?>
					<option value="workstation">Workstation</option> 
					<option value="storage">Storage</option>
					<option value="tech_accesories">Tech and Accesories</option> 
					<option value="table">Table</option> 
					<option value="screen">Screen</option> 
					<option value="agile_furniture">Agile furniture</option>
					<option value="chair">Chair</option> 
					<option value="joinery_custom">Joinery and Custom</option> 
					<option value="other">Other</option>
				</select> 
			</div>
			<!-- <div class="img-input">
				<label>Main image</label>
				<input type="file" name="1" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 1</label>
				<input type="file" name="2" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 2</label>
				<input type="file" name="3" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 3</label>
				<input type="file" name="4" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 4</label>
				<input type="file" name="5" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 5</label>
				<input type="file" name="6" accept="image/*">
			</div> --> 
			<div class="form-button">
				<button name="addProduct">Add Product</button>
			</div>
		</form>
	</div>
</div> 