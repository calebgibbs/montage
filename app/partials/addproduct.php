<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Change Password', 
	'desc' => 'montage interiors website staff log in' 
]);  
$prevPage = $_SERVER['REQUEST_URI']; 
?>
<div class="body">  
	<div id="addp"> 
		<h1>Add a new product</h1> 
		<?=  isset($failMessage) ? $failMessage : '' ?>
		<form enctype="multipart/form-data" method="post" action="index.php?page=add_product" novalidate>
			<div class="form-input">
				<input type="text" class="inputText" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>" required />
				<span class="floating-label">Product Title <?=  isset($titleMessage) ? $titleMessage : '' ?></span>
			</div> 
			<div class="form-input"> 
				<select name="category" <?=  isset($categoryError) ? $categoryError : '' ?>>
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
			<div class="form-textarea">
				<textarea name="desc" required id="prod-desc-ta"><?= isset($_POST['desc']) ? $_POST['desc'] : '' ?></textarea> 
				<span class="floating-label">Product description  <?=  isset($descMessage) ? $descMessage : '' ?></span>
			</div> 
			<div class="form-features">
				<h2>Product Features</h2>
				<div class="form-input">
					<input type="text" class="inputText" name="feat_1" value="<?= isset($_POST['feat_1']) ? $_POST['feat_1'] : '' ?>" required />
					<span class="floating-label">Feature 1 <?=  isset($feat1Message) ? $feat1Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_2" value="<?= isset($_POST['feat_2']) ? $_POST['feat_2'] : '' ?>" required />
					<span class="floating-label">Feature 2 <?=  isset($feat2Message) ? $feat2Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_3" value="<?= isset($_POST['feat_3']) ? $_POST['feat_3'] : '' ?>" required />
					<span class="floating-label">Feature 3 <?=  isset($feat3Message) ? $feat3Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_4" value="<?= isset($_POST['feat_4']) ? $_POST['feat_4'] : '' ?>" required />
					<span class="floating-label">Feature 4 <?=  isset($feat4Message) ? $feat4Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_5" value="<?= isset($_POST['feat_5']) ? $_POST['feat_5'] : '' ?>" required />
					<span class="floating-label">Feature 5 <?=  isset($feat5Message) ? $feat5Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_6" value="<?= isset($_POST['feat_6']) ? $_POST['feat_6'] : '' ?>" required />
					<span class="floating-label">Feature 6 <?=  isset($feat6Message) ? $feat6Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_7" value="<?= isset($_POST['feat_7']) ? $_POST['feat_7'] : '' ?>" required />
					<span class="floating-label">Feature 7 <?=  isset($feat7Message) ? $feat7Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_8" value="<?= isset($_POST['feat_8']) ? $_POST['feat_8'] : '' ?>" required />
					<span class="floating-label">Feature 8 <?=  isset($feat8Message) ? $feat8Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_9" value="<?= isset($_POST['feat_9']) ? $_POST['feat_9'] : '' ?>" required />
					<span class="floating-label">Feature 9 <?=  isset($feat9Message) ? $feat9Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_10" value="<?= isset($_POST['feat_10']) ? $_POST['feat_10'] : '' ?>" required />
					<span class="floating-label">Feature 10 <?=  isset($feat10Message) ? $feat10Message : '' ?></span>
				</div> 
			</div> 
			<div class="form-options"> 
				<h2>Product Options</h2>
				<div class="form-input">
					<input type="text" class="inputText" name="opt_1" value="<?= isset($_POST['opt_1']) ? $_POST['opt_1'] : '' ?>" required />
					<span class="floating-label">Option 1 <?=  isset($opt1Message) ? $opt1Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_2" value="<?= isset($_POST['opt_2']) ? $_POST['opt_2'] : '' ?>" required />
					<span class="floating-label">Option 2 <?=  isset($opt2Message) ? $opt2Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_3" value="<?= isset($_POST['opt_3']) ? $_POST['opt_3'] : '' ?>" required />
					<span class="floating-label">Option 3 <?=  isset($opt3Message) ? $opt3Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_4" value="<?= isset($_POST['opt_4']) ? $_POST['opt_4'] : '' ?>" required />
					<span class="floating-label">Option 4 <?=  isset($opt4Message) ? $opt4Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_5" value="<?= isset($_POST['opt_5']) ? $_POST['opt_5'] : '' ?>" required />
					<span class="floating-label">Option 5 <?=  isset($opt5Message) ? $opt5Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_6" value="<?= isset($_POST['opt_6']) ? $_POST['opt_6'] : '' ?>" required />
					<span class="floating-label">Option 6 <?=  isset($opt6Message) ? $opt6Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_7" value="<?= isset($_POST['opt_7']) ? $_POST['opt_7'] : '' ?>" required />
					<span class="floating-label">Option 7 <?=  isset($opt7Message) ? $opt7Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_8" value="<?= isset($_POST['opt_8']) ? $_POST['opt_8'] : '' ?>" required />
					<span class="floating-label">Option 8 <?=  isset($opt8Message) ? $opt8Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_9" value="<?= isset($_POST['opt_9']) ? $_POST['opt_9'] : '' ?>" required />
					<span class="floating-label">Option 9 <?=  isset($opt9Message) ? $opt9Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_10" value="<?= isset($_POST['opt_10']) ? $_POST['opt_10'] : '' ?>" required />
					<span class="floating-label">Option 10 <?=  isset($opt10Message) ? $opt10Message : '' ?></span>
				</div> 
			</div> 
			<div class="form-images"> 
				<h2>Product Images</h2>
				<div class="image-upload">
					<span>Main Image <?=  isset($image1message) ? $image1message : '' ?></span>
					<input type="file" name="image1" accept="image/*">
				</div>
				<div class="form-input image-upload">
					<span>Image 2 <?=  isset($image2message) ? $image2message : '' ?></span>
					<input type="file" name="image2" accept="image/*">
				</div>
				<div class="form-input image-upload">
					<span>Image 3 <?=  isset($image3message) ? $image3message : '' ?></span>
					<input type="file" name="image3" accept="image/*">
				</div>
				<div class="form-input image-upload">
					<span>Image 4 <?=  isset($image4message) ? $image4message : '' ?></span>
					<input type="file" name="image4" accept="image/*">
				</div>
				<div class="form-input image-upload">
					<span>Image 5 <?=  isset($image5message) ? $image5message : '' ?></span>
					<input type="file" name="image5" accept="image/*">
				</div>
			</div>
			<div>
				<button type="submit" name="addProduct">add product</button>
			</div>
		</form>
	</div>
</div> 