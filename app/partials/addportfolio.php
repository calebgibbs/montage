<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Add Portfolio', 
	'desc' => 'montage interiors website staff log in' 
]);  
$prevPage = $_SERVER['REQUEST_URI']; 
?>
<div class="body">  
	<div id="addp"> 
		<h1>Add to Portfolio</h1> 
		<?=  isset($failMessage) ? $failMessage : '' ?>
		<form enctype="multipart/form-data" method="post" action="index.php?page=add_portfolio" novalidate>
			<div class="form-input f-prod-title">
				<input type="text" class="inputText" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>" required />
				<span class="floating-label">Product Title <?=  isset($titleMessage) ? $titleMessage : '' ?></span>
			</div> 
			<div class="form-textarea">
				<textarea name="desc" required id="prod-desc-ta"><?= isset($_POST['desc']) ? $_POST['desc'] : '' ?></textarea> 
				<span class="floating-label">Product description  <?=  isset($descMessage) ? $descMessage : '' ?></span>
			</div>  
			<div id="form-images">
				<h2>Images</h2>
				<?php for($i=1;$i<=5;$i++):?> 
					<div id="img<?= $i ?>" class="img-input">
						<label>Image <?= $i ?> <?=  isset( ${"imgMessage$i"} ) ? ${"imgMessage$i"} : '' ?></label>
						<input type="file" name="image<?= $i ?>" accept="image/*">
					</div>
				<?php endfor ?>
			</div>
			<div>
				<button class="addButton" type="submit" name="addPort">Add to portfolio</button> 
			</div>   
			
		</form>
	</div>
</div> 