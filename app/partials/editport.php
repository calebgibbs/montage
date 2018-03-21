<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Edit Portfolio', 
	'desc' => 'montage interiors contact' 
]);   
if($port['client'] == 'N/A'){ 
	$port['client'] = '';
}
if($port['date'] == 'N/A'){ 
	$port['date'] = '';
}
if($port['architect'] == 'N/A'){ 
	$port['architect'] = '';
}
if($port['contractor'] == 'N/A'){ 
	$port['contractor'] = '';
}
$iCount = 1;
foreach( $images as $image ){
	${'img'.$iCount} = $image['image']; 
	$iCount++;
}
?> 
<div class="body">  
	<div id="addp"> 
		<h1><?= $port['title'] ?></h1>
		<form enctype="multipart/form-data" method="post" action="index.php?page=edit_port&port=<?= $_GET['port'] ?>" novalidate>
			<div >
				<input type="text" class="inputText" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : $port['title'] ?>" required />
				<span class="floating-label">Title <?=  isset($titleMessage) ? $titleMessage : '' ?></span>
			</div> 
			<div class="form-input">
				<input type="text" class="inputText" name="client" value="<?= isset($_POST['client']) ? $_POST['client'] : $port['client'] ?>" required />
				<span class="floating-label">Client <?=  isset($clientMessage) ? $clientMessage : '' ?></span>	
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="date" value="<?= isset($_POST['date']) ? $_POST['date'] : $port['date'] ?>" required />
				<span class="floating-label">Date <?=  isset($dateMessage) ? $dateMessage : '' ?></span>	
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="architect" value="<?= isset($_POST['architect']) ? $_POST['architect'] : $port['architect'] ?>" required />
				<span class="floating-label">Architect <?=  isset($arcMessage) ? $arcMessage : '' ?></span>	
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="contractor" value="<?= isset($_POST['contractor']) ? $_POST['contractor'] : $port['contractor'] ?>" required />
				<span class="floating-label">Contractor <?=  isset($conMessage) ? $conMessage : '' ?></span>	
			</div> 
			<div class="form-textarea">
				<textarea name="desc" required id="prod-desc-ta"><?= isset($_POST['desc']) ? $_POST['desc'] : $port['description'] ?></textarea> 
				<span class="floating-label">Product description  <?=  isset($descMessage) ? $descMessage : '' ?></span>
			</div>
			<div id="form-images">
				<h2>Images</h2>
				<?php for($i=1;$i<=5;$i++):?>
					<div class="edit_img" id="img<?= $i ?>"> 
						<?php if($i == 1 ): ?>
							<label>Main Image <?=  isset(${"imgMsg".$i}) ? ${"imgMsg".$i} : '' ?></label> 
						<?php endif ?>
						<?php if($i != 1 ): ?>
							<label>Image <?= $i ?> <?=  isset(${"imgMsg".$i}) ? ${"imgMsg".$i} : '' ?></label> 
						<?php endif ?>
						<?php if(isset(${'img'.$i})): ?> 
							<img src="img/portfolio/thumbnail/<?= ${'img'.$i} ?>"> 
							<?php if($i != 1 ): ?>
								<span class="img_del"><input type="checkbox" name="delImg<?= $i ?>" style="display: inline-block;"> Delete image <?= $i ?></span> 
							<?php endif ?>
						<?php endif ?>  
						<?php if(!isset(${'img'.$i})): ?>  
							<img src="img/products/thumbnail/no_img.png">
							<span class="img_del" style="opacity: 0"><input type="checkbox" style="display: inline-block;"> img</span>
						<?php endif ?>
						<div class="fileUpload">
							<label for="upload<?= $i ?>" class="fileUploadLabel">
								<?php if(isset(${'img'.$i})): ?>  
									Change Image
								<?php endif ?> 
								<?php if(!isset(${'img'.$i})): ?>  
									Upload Image
								<?php endif ?>
							</label> 
							<input class="FileUploadInput" id="upload<?= $i ?>" type="file" name="image<?= $i ?>" accept="image/*">
						</div> 
					</div>
				<?php endfor ?>
			</div> 
			<div>
				<button class="addButton" type="submit" name="makeChanges">Save Changes</button>
			</div>
			<div>
				<button id="delPrompt" class="delButton" type="submit" name="delete1">Delete Product</button>
				<button id="yesDel" class="delButton2" name="yesDel">Yes</button>
				<button id="noDel" class="delButton2" name="noDel">No</button>
			</div>
		</form>
	</div>
</div>