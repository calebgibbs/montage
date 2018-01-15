<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Edit', 
	'desc' => 'montage interiors website staff log in' 
]);  
$prevPage = $_SERVER['REQUEST_URI']; 
?>
<div class="body">  
	<div id="addp"> 
		<h1><a href="index.php?page=product&productnum=<?= $product['id'] ?>"><?= $product['title'] ?></a></h1> 
		<h3><?= $image5['image'] ?></h3>  
		<?=  isset($failMessage) ? $failMessage : '' ?>
		<form enctype="multipart/form-data" method="post" action="index.php?page=edit&product=<?= $product['id'] ?>" novalidate>
			<div class="form-input">
				<input type="text" class="inputText" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : $product['title'] ?>" required />
				<span class="floating-label">Product Title <?=  isset($titleMessage) ? $titleMessage : '' ?></span>
			</div> 
			<div class="form-input"> 
				<select name="category" <?=  isset($categoryError) ? $categoryError : '' ?>>
					<?php if($product['category']): ?>  
						<?php 
						if ( $product['category'] == 'workstation') {
							$valueName = "Workstation";
						}elseif ($product['category'] == 'storage') {
							$valueName = "Storage";
						}elseif ($product['category'] == 'tech_accesories') {
							$valueName = "Tech and Accesories";
						}elseif ($product['category'] == 'table') {
							$valueName = "Table";
						}elseif ($product['category'] == 'screen') {
							$valueName = "Screen";
						}elseif ($product['category'] == 'agile_furniture') {
							$valueName = "Agile furniture";
						}elseif($product['category'] == 'chair'){
							$valueName = "Chair";
						}elseif($product['category'] == 'joinery_custom'){
							$valueName = "Joinery and Custom";
						}elseif($product['category'] == 'other'){
							$valueName = "Other";
						}else{ 
							$valueName = "Select category";	
						}
						?> 
						<option value="<?= $product['category'] ?>"><?= $valueName ?></option> 
					<?php endif ?>
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
				<textarea name="desc" required id="prod-desc-ta"><?= isset($_POST['desc']) ? $_POST['desc'] : $product['description'] ?></textarea> 
				<span class="floating-label">Product description  <?=  isset($descMessage) ? $descMessage : '' ?></span>
			</div> 
			<div class="form-features">
				<h2>Product Features</h2>
				<div class="form-input">
					<input type="text" class="inputText" name="feat_1" value="<?= isset($_POST['feat_1']) ? $_POST['feat_1'] : $feature1['feature'] ?>" required />
					<span class="floating-label">Feature 1 <?=  isset($feat1Message) ? $feat1Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_2" value="<?= isset($_POST['feat_2']) ? $_POST['feat_2'] : $feature2['feature'] ?>" required />
					<span class="floating-label">Feature 2 <?=  isset($feat2Message) ? $feat2Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_3" value="<?= isset($_POST['feat_3']) ? $_POST['feat_3'] : $feature3['feature'] ?>" required />
					<span class="floating-label">Feature 3 <?=  isset($feat3Message) ? $feat3Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_4" value="<?= isset($_POST['feat_4']) ? $_POST['feat_4'] : $feature4['feature'] ?>" required />
					<span class="floating-label">Feature 4 <?=  isset($feat4Message) ? $feat4Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_5" value="<?= isset($_POST['feat_5']) ? $_POST['feat_5'] : $feature5['feature'] ?>" required />
					<span class="floating-label">Feature 5 <?=  isset($feat5Message) ? $feat5Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_6" value="<?= isset($_POST['feat_6']) ? $_POST['feat_6'] : $feature6['feature'] ?>" required />
					<span class="floating-label">Feature 6 <?=  isset($feat6Message) ? $feat6Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_7" value="<?= isset($_POST['feat_7']) ? $_POST['feat_7'] : $feature7['feature'] ?>" required />
					<span class="floating-label">Feature 7 <?=  isset($feat7Message) ? $feat7Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_8" value="<?= isset($_POST['feat_8']) ? $_POST['feat_8'] : $feature8['feature'] ?>" required />
					<span class="floating-label">Feature 8 <?=  isset($feat8Message) ? $feat8Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_9" value="<?= isset($_POST['feat_9']) ? $_POST['feat_9'] : $feature9['feature'] ?>" required />
					<span class="floating-label">Feature 9 <?=  isset($feat9Message) ? $feat9Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="feat_10" value="<?= isset($_POST['feat_10']) ? $_POST['feat_10'] : $feature10['feature'] ?>" required />
					<span class="floating-label">Feature 10 <?=  isset($feat10Message) ? $feat10Message : '' ?></span>
				</div> 
			</div> 
			<div class="form-options"> 
				<h2>Product Options</h2>
				<div class="form-input">
					<input type="text" class="inputText" name="opt_1" value="<?= isset($_POST['opt_1']) ? $_POST['opt_1'] : $option1['product_option'] ?>" required />
					<span class="floating-label">Option 1 <?=  isset($opt1Message) ? $opt1Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_2" value="<?= isset($_POST['opt_2']) ? $_POST['opt_2'] : $option2['product_option'] ?>" required />
					<span class="floating-label">Option 2 <?=  isset($opt2Message) ? $opt2Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_3" value="<?= isset($_POST['opt_3']) ? $_POST['opt_3'] : $option3['product_option'] ?>" required />
					<span class="floating-label">Option 3 <?=  isset($opt3Message) ? $opt3Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_4" value="<?= isset($_POST['opt_4']) ? $_POST['opt_4'] : $option4['product_option'] ?>" required />
					<span class="floating-label">Option 4 <?=  isset($opt4Message) ? $opt4Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_5" value="<?= isset($_POST['opt_5']) ? $_POST['opt_5'] : $option5['product_option'] ?>" required />
					<span class="floating-label">Option 5 <?=  isset($opt5Message) ? $opt5Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_6" value="<?= isset($_POST['opt_6']) ? $_POST['opt_6'] : $option6['product_option'] ?>" required />
					<span class="floating-label">Option 6 <?=  isset($opt6Message) ? $opt6Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_7" value="<?= isset($_POST['opt_7']) ? $_POST['opt_7'] : $option7['product_option'] ?>" required />
					<span class="floating-label">Option 7 <?=  isset($opt7Message) ? $opt7Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_8" value="<?= isset($_POST['opt_8']) ? $_POST['opt_8'] : $option8['product_option'] ?>" required />
					<span class="floating-label">Option 8 <?=  isset($opt8Message) ? $opt8Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_9" value="<?= isset($_POST['opt_9']) ? $_POST['opt_9'] : $option9['product_option'] ?>" required />
					<span class="floating-label">Option 9 <?=  isset($opt9Message) ? $opt9Message : '' ?></span>
				</div>

				<div class="form-input">
					<input type="text" class="inputText" name="opt_10" value="<?= isset($_POST['opt_10']) ? $_POST['opt_10'] : $option10['product_option'] ?>" required />
					<span class="floating-label">Option 10 <?=  isset($opt10Message) ? $opt10Message : '' ?></span>
				</div> 
			</div> 
			<div class="form-images"> 
				<h2>Product Images</h2>
				<div class="form-input"> 
					<span>Main Image</span>
					<img src="img/products/thumbnail/<?= $image1['image'] ?>"> 
					<input type="file" name="image1" value="Change Image">
				</div>
				<div class="form-input"> 
					<span>Main Image</span>
					<img src="img/products/thumbnail/<?= $image2['image'] ?>"> 
					<input type="file" name="image1" value="Change Image">
				</div>
				<div class="form-input"> 
					<span>Main Image</span>
					<img src="img/products/thumbnail/<?= $image3['image'] ?>"> 
					<input type="file" name="image1" value="Change Image">
				</div>
				<div class="form-input"> 
					<span>Main Image</span>
					<img src="img/products/thumbnail/<?= $image4['image'] ?>"> 
					<input type="file" name="image1" value="Change Image">
				</div>
				<div class="form-input"> 
					<span>Main Image</span>
					<img src="img/products/thumbnail/<?= $image5['image'] ?>"> 
					<input type="file" name="image1" value="Change Image">
				</div>
			</div>
			<div>
				<button type="submit" name="makeChanges">Make Changes</button>
			</div>
		</form>
	</div>
</div> 