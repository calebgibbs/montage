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
				<select name="category" id="cat1" <?=  isset($categoryError) ? $categoryError : '' ?>>
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
							$valueName = "Seating";
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
					<option value="tech_accesories" id="tech-sel">Tech and Accesories</option> 
					<option value="table" id="table-sel">Table</option> 
					<option value="screen">Screen</option> 
					<option value="agile_furniture" id="agile-sel">Agile furniture</option>
					<option value="chair" id="seating-sel">Seating</option> 
					<option value="joinery_custom" id="joinery-sel">Joinery and Custom</option> 
					<option value="other">Other</option>
				</select> 
			</div>  
			<div class="form-input">
				<select name="supplier" <?=  isset($supplierError) ? $supplierError : '' ?>>
					<?php if(isset($_POST['supplier'])): ?>
						<?php if($_POST['supplier'] === '0'): ?> 
						<option value="0">Select supplier</option>	
						<?php endif ?>
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
			<div class="subCat agileSel">
				<select name="cat1" <?=  isset($subCategoryError) ? $subCategoryError : '' ?>>
					<?php if( isset($_POST['cat2']) ): ?> 
					<?php 
						if($_POST['cat1'] == 'team_collab'){ 
							$sub1 = 'Team Collaborative';
						}elseif($_POST['cat1'] == 'break_f'){ 
							$sub1 = 'Breakout Furniture';
						}elseif($_POST['cat1'] == 'focus_f'){ 
							$sub1 = 'Focus Furniture';
						}elseif($_POST['cat1'] == 'none'){ 
							$sub1 = 'Other';
						}else {
							$sub1 = 'Please select a category';	
						}
					?> 
					<option value="<?= $_POST['cat1'] ?>"><?= $sub1 ?></option> 
					<?php endif ?>
					<option value="1">Agile furniture Subcategory</option> 
					<option value="team_collab">Team Collaborative</option> 
					<option value="break_f">Breakout Furniture</option> 
					<option value="focus_f">Focus Furniture</option> 
					<option value="none">Other</option>
				</select>
			</div>
			<div class="subCat joinerySel">
				<select name="cat2" <?=  isset($subCategoryError) ? $subCategoryError : '' ?>> 
					<?php if(isset($_POST['cat2'])): ?> 
					<?php 
						if($_POST['cat2'] === 'joinery'){ 
							$sub2 = 'Joinery';
						}elseif($_POST['cat2'] === 'custom'){ 
							$sub2 = 'Custom Furniture';
						}elseif($_POST['cat2'] === 'none'){ 
							$sub2 = 'Other';
						}else{ 
							$sub2 = 'Please select a category';	
						}
					?> 
					<option value="<?= $_POST['cat2'] ?>"><?= $sub2 ?></option>
					<?php endif ?>
					<option value="2">Joinery and Custom category</option> 
					<option value="joinery">Joinery</option> 
					<option value="custom">Custom Furniture</option> 
					<option value="none">Other</option>
				</select>
			</div> 
			<div class="subCat seatingCat">
				<select name="cat3" <?=  isset($subCategoryError) ? $subCategoryError : '' ?>>
					<?php if(isset($_POST['cat3'])): ?> 
					<?php 
						if($_POST['cat3'] === 'soft_s'){ 
							$sub3 = 'Soft Seating';
						}elseif($_POST['cat3'] === 'task_s'){ 
							$sub3 = 'Task Seating';	
						}elseif ($_POST['cat3'] === 'vis_hos') {
							$sub3 = 'Visitor & Hospitality';
						}elseif ($_POST['cat3'] === 'stools') {
							$sub3 = 'Stools';
						}elseif($_POST['cat3'] === 'meeting_room'){ 
							$sub3 = 'Meeting Room';	
						}elseif($_POST['cat3'] === 'none'){ 
							$sub3 = 'Other';
						}else{ 
							$sub3 = 'Please select a category';	
						}
					?> 
					<option value="<?= $_POST['cat3'] ?>"><?= $sub3 ?></option>
					<?php endif ?>
					<option value="3">Seating category</option> 
					<option value="soft_s">Soft Seating</option> 
					<option value="task_s">Task Seating</option> 
					<option value="vis_hos">Visitor &amp; Hospitality</option> 
					<option value="stools">Stools</option> 
					<option value="meeting_room">Meeting Room</option> 
					<option value="none">Other</option>
				</select>
			</div> 
			<div class="subCat tablesCat">
				<select name="cat4" <?=  isset($subCategoryError) ? $subCategoryError : '' ?>> 
					<?php if(isset($_POST['cat4'])): ?> 
					<?php 
						if($_POST['cat4'] === 'meeting_break'){ 
							$sub4 = 'Meeting & Breakout';
						}elseif($_POST['cat4'] === 'coffee_t'){ 
							$sub4 = 'Coffee Tables';
						}elseif($_POST['cat4'] === 'leaner') {
							$sub4 = 'Leaners';
						}elseif($_POST['cat4'] === 'none'){ 
							$sub4 = 'Other';
						}else{ 
							$sub4 = 'Please select a category';
						}
					?> 
					<option value="<?= $_POST['cat4'] ?>"><?= $sub4 ?></option>
					<?php endif ?>
					<option value="4">Tables category</option> 
					<option value="meeting_break">Meeting &amp; Breakout</option> 
					<option value="coffee_t">Coffee Tables</option> 
					<option value="leaner">Leaners</option>
					<option value="none">Other</option>	
				</select>
			</div> 
			<div class="subCat techCat">
				<select name="cat5" <?=  isset($subCategoryError) ? $subCategoryError : '' ?>> 
					<?php if(isset($_POST['cat5'])): ?>
					<?php  
						if($_POST['cat5'] === 'screen_workstation'){
							$sub5 = 'Screen & Workstations';
						}elseif($_POST['cat5'] === 'technology'){ 
							$sub5 = 'Technology';
						}elseif ($_POST['cat5'] === 'mot_arm') {
							$sub5 = 'Monitor Arm';
						}elseif ($_POST['cat5'] === 'miscellaneous') {
							$sub5 = 'Miscellaneous';
						}elseif($_POST['cat5'] === 'none'){ 
							$sub5 = 'Other';
						}else {
							$sub5 = 'Please select a category';
						}
					?> 
					<option value="<?= $_POST['cat5'] ?>"><?= $sub5 ?></option>
					<?php endif ?>
					<option value="5">Tech and Accesories category</option> 
					<option value="screen_workstation">Screen &amp; Workstations</option> 
					<option value="technology">Technology</option> 
					<option value="mot_arm">Monitor Arms</option> 
					<option value="miscellaneous">Miscellaneous</option> 
					<option value="none">Other</option>
				</select>
			</div>  
			<div class="subCat storageCat">
				<select name="cat6" <?=  isset($subCategoryError) ? $subCategoryError : '' ?>>
					<?php if(isset($_POST['cat6'])): ?>
					<?php  
						if($_POST['cat6'] === 'bespoke_s'){
							$sub6 = 'Bespoke Storage';
						}elseif($_POST['cat6'] === 'personal_s'){ 
							$sub6 = 'Personal Storage';
						}elseif ($_POST['cat6'] === 'team_s') {
							$sub6 = 'Team Storage';
						}elseif($_POST['cat6'] === 'none'){ 
							$sub6 = 'Other';
						}else {
							$sub6 = 'Please select a category';
						}
					?> 
					<option value="<?= $_POST['cat6'] ?>"><?= $sub6 ?></option>
					<?php endif ?>
					<option value="6">Storage category</option> 
					<option value="bespoke_s">Bespoke Storage</option>
					<option value="personal_s">Personal Storage</option>
					<option value="team_s">Team Storage</option>
					<option value="none">Other</option>
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
				<h2>Suggested options</h2> 
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
			<div>
				<h2>Dimensions</h2> 
				<?php for($i=1;$i<=3;$i++): ?> 
				<?php $type = 'dt'.$i; $value = 'dv'.$i; ?>  
				<div class="form-input">	
					<input type="text" class="inputText" name="dt<?= $i ?>" value="<?= isset($_POST[$type]) ? $_POST[$type] : '' ?>" required /> 
					<span class="floating-label">Dimension type <?=  isset(${'typeMsg'.$i}) ? ${'typeMsg'.$i} : '' ?></span>
				</div> 
				<div class="form-input">
					<input type="text" class="inputText" name="dv<?= $i ?>" value="<?= isset($_POST[$value]) ? $_POST[$value] : '' ?>" required /> 
					<span class="floating-label">Dimension value <?=  isset(${'valueMsg'.$i}) ? ${'valueMsg'.$i} : '' ?></span>
				</div>
				<?php endfor ?>
			</div> 
			<div id="form-downloads">
				<h2>Downloads</h2>
				<div class="form-input">
					<input type="text" class="inputText" name="download_title_1" value="<?= isset($_POST['download_title_1']) ? $_POST['download_title_1'] : '' ?>" required> 
					<span class="floating-label">Download Title<?=  isset($DtitleMsg1) ? $DtitleMsg1 : '' ?></span>
				</div>
				<div class="form-input">
					<input type="text" class="inputText" name="download_link_1" value="<?= isset($_POST['download_link_1']) ? $_POST['download_link_1'] : '' ?>" required> 
					<span class="floating-label">Download Link<?=  isset($DlinkMsg1) ? $DlinkMsg1 : '' ?></span>
				</div>	

				<div class="form-input">
					<input type="text" class="inputText" name="download_title_2" value="<?= isset($_POST['download_title_2']) ? $_POST['download_title_2'] : '' ?>" required> 
					<span class="floating-label">Download Title<?=  isset($DtitleMsg2) ? $DtitleMsg2 : '' ?></span>
				</div>
				<div class="form-input">
					<input type="text" class="inputText" name="download_link_2" value="<?= isset($_POST['download_link_2']) ? $_POST['download_link_2'] : '' ?>" required> 
					<span class="floating-label">Download Link<?=  isset($DlinkMsg2) ? $DlinkMsg2 : '' ?></span>
				</div>	 

				<div class="form-input">
					<input type="text" class="inputText" name="download_title_3" value="<?= isset($_POST['download_title_3']) ? $_POST['download_title_3'] : '' ?>" required> 
					<span class="floating-label">Download Title<?=  isset($DtitleMsg3) ? $DtitleMsg3 : '' ?></span>
				</div>
				<div class="form-input">
					<input type="text" class="inputText" name="download_link_3" value="<?= isset($_POST['download_link_3']) ? $_POST['download_link_3'] : '' ?>" required> 
					<span class="floating-label">Download Link<?=  isset($DlinkMsg3) ? $DlinkMsg3 : '' ?></span>
				</div>	
			</div> 
			<div id="form-images">
				<h2>Images</h2>
				<?php for($i=1;$i<=5;$i++):?> 
					<div id="img<?= $i ?>" class="add-img">
						<?php if($i != 1): ?>
						<label>Image <?= $i ?> <?=  isset(${"imgMsg".$i}) ? ${"imgMsg".$i} : '' ?></label>
						<?php endif ?> 
						<?php if($i == 1): ?> 
						<label>Main Image <?=  isset(${"imgMsg".$i}) ? ${"imgMsg".$i} : '' ?></label>
						<?php endif?>
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