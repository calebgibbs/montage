<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Add Portfolio', 
	'desc' => 'Montage Interiors add to portfolio' 
]);  
?>
<div class="body">  
	<div id="addp"> 
		<form enctype="multipart/form-data" method="post" action="index.php?page=add_portfolio" novalidate>
			<div >
				<input type="text" class="inputText" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>" required />
				<span class="floating-label">Title <?=  isset($titleMessage) ? $titleMessage : '' ?></span>
			</div> 
			<div class="form-input">
				<input type="text" class="inputText" name="client" value="<?= isset($_POST['client']) ? $_POST['client'] : '' ?>" required />
				<span class="floating-label">Client <?=  isset($clientMessage) ? $clientMessage : '' ?></span>	
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="date" value="<?= isset($_POST['date']) ? $_POST['date'] : '' ?>" required />
				<span class="floating-label">Date <?=  isset($dateMessage) ? $dateMessage : '' ?></span>	
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="architect" value="<?= isset($_POST['architect']) ? $_POST['architect'] : '' ?>" required />
				<span class="floating-label">Architect <?=  isset($arcMessage) ? $arcMessage : '' ?></span>	
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="contractor" value="<?= isset($_POST['contractor']) ? $_POST['contractor'] : '' ?>" required />
				<span class="floating-label">Contractor <?=  isset($conMessage) ? $conMessage : '' ?></span>	
			</div> 
			<div class="form-textarea">
				<textarea name="desc" required id="prod-desc-ta"><?= isset($_POST['desc']) ? $_POST['desc'] : '' ?></textarea> 
				<span class="floating-label">Project Description  <?=  isset($descMessage) ? $descMessage : '' ?></span>
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
				<button class="addButton" type="submit" name="addPort">Add to Portfolio</button>
			</div>
		</form>
	</div>
</div> 