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
				<input type="text" class="inputText" name="title" required />
				<span class="floating-label">Product Title</span>
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
			<div class="form-textarea">
				<textarea name="desc" required id="prod-desc-ta"><?= isset($_POST['desc']) ? $_POST['desc'] : '' ?></textarea> 
				<span class="floating-label">Product description  <?=  isset($descMessage) ? $descMessage : '' ?></span>
			</div> 
			<?php for($i = 1; $i <= 10; $i++): ?> 
			<div class="form-input">
				<input type="text" class="inputText" name="feat_<?= $i ?>" required />
				<span class="floating-label">Featured bullet point <?= $i ?></span>
			</div>
			<?php endfor; ?>
			<?php for($i = 1; $i <= 10; $i++): ?> 
			<div class="form-input">
				<input type="text" class="inputText" name="opt_<?= $i ?>" required />
				<span class="floating-label">Option bullet point <?= $i ?></span>
			</div>
			<?php endfor; ?>
			
		</form>
	</div>
</div> 