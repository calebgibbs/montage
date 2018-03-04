<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Add product', 
	'desc' => 'montage interiors add product' 
]);  
?>
<div class="body">  
	<div id="addp"> 
		<h1>Add a new product</h1> 
		<?=  isset($failMessage) ? $failMessage : '' ?>
		<form enctype="multipart/form-data" method="post" action="index.php?page=add_product" novalidate>
			<div >
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
			<div class="form-input">
				<select name="supplier" <?=  isset($supplierError) ? $supplierError : '' ?>>
					<?php if(isset($_POST['supplier'])): ?>
					<option value="<?= $_POST['supplier'] ?>"><?= ucfirst($_POST['supplier']) ?></option>
					<?php endif ?>
					<?php if(!isset($_POST['supplier'])): ?>
					<option value="0">Select supplier</option> 
					<?php endif ?>
					<?php foreach($suppliers as $value): ?> 
						<option value="<?= $value ?>"><?= ucfirst($value) ?></option>
					<?php endforeach ?>
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
			<div>
				<h2>More options</h2> 
				<div class="form-input">
					<input type="text" class="inputText" name="opt_text_1" value="<?= isset($_POST['opt_text_1']) ? $_POST['opt_text_1'] : '' ?>" required />
					<span class="floating-label">Option 1 <?=  isset($optText1) ? $optText1 : '' ?></span>
				</div> 
				<div class="form-input">
					<input type="text" class="inputText" name="opt_link_1" value="<?= isset($_POST['opt_link_1']) ? $_POST['opt_link_1'] : '' ?>" required />
					<span class="floating-label">Option 1 link <?=  isset($optLink1) ? $optLink1 : '' ?></span>
				</div>
				<div class="form-input">
					<input type="text" class="inputText" name="opt_text_2" value="<?= isset($_POST['opt_text_2']) ? $_POST['opt_text_2'] : '' ?>" required />
					<span class="floating-label">Option 2 <?=  isset($optText2) ? $optText2 : '' ?></span>
				</div> 
				<div class="form-input">
					<input type="text" class="inputText" name="opt_link_2" value="<?= isset($_POST['opt_link_2']) ? $_POST['opt_link_2'] : '' ?>" required />
					<span class="floating-label">Option 2 link <?=  isset($optLink2) ? $optLink2 : '' ?></span>
				</div> 
				<div class="form-input">
					<input type="text" class="inputText" name="opt_text_3" value="<?= isset($_POST['opt_text_3']) ? $_POST['opt_text_3'] : '' ?>" required />
					<span class="floating-label">Option 3 <?=  isset($optText3) ? $optText3 : '' ?></span>
				</div> 
				<div class="form-input">
					<input type="text" class="inputText" name="opt_link_3" value="<?= isset($_POST['opt_link_3']) ? $_POST['opt_link_3'] : '' ?>" required />
					<span class="floating-label">Option 3 link <?=  isset($optLink3) ? $optLink3 : '' ?></span>
				</div> 
				<div class="form-input">
					<input type="text" class="inputText" name="opt_text_4" value="<?= isset($_POST['opt_text_4']) ? $_POST['opt_text_4'] : '' ?>" required />
					<span class="floating-label">Option 4 <?=  isset($optText4) ? $optText4 : '' ?></span>
				</div> 
				<div class="form-input">
					<input type="text" class="inputText" name="opt_link_4" value="<?= isset($_POST['opt_link_4']) ? $_POST['opt_link_4'] : '' ?>" required />
					<span class="floating-label">Option 4 link <?=  isset($optLink4) ? $optLink4 : '' ?></span>
				</div>
				<div class="form-input">
					<input type="text" class="inputText" name="opt_text_5" value="<?= isset($_POST['opt_text_5']) ? $_POST['opt_text_5'] : '' ?>" required />
					<span class="floating-label">Option 5 <?=  isset($optText5) ? $optText5 : '' ?></span>
				</div> 
				<div class="form-input">
					<input type="text" class="inputText" name="opt_link_5" value="<?= isset($_POST['opt_link_5']) ? $_POST['opt_link_5'] : '' ?>" required />
					<span class="floating-label">Option 5 link <?=  isset($optLink5) ? $optLink5 : '' ?></span>
				</div>
			</div>
			
			<div id="form-images">
				<h2>Images</h2>
				<?php for($i=1;$i<=5;$i++):?> 
					<div id="img<?= $i ?>" class="img-input">
						<label>Image <?= $i ?> <?=  isset(${"imgMsg".$i}) ? ${"imgMsg".$i} : '' ?></label>
						<input type="file" name="image<?= $i ?>" accept="image/*">
					</div>
				<?php endfor ?>
			</div>
			<div>
				<button class="addButton" type="submit" name="addProduct">Add Product</button>
			</div>
		</form>
	</div>
</div> 