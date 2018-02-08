<?php 
if($_GET['page'] == 'product'){ 
	$title = $product['title']; 
	$description = $product['description']; 
}else{ 
	$title = $port['title']; 
	$description = $port['description'];
}
$this -> layout('master',[
	'title'=>'Montage Interiors | '.$title, 
	'desc' => $description 
]);   
?>
<div class="body"> 
	<?php if($_SESSION['account_type'] == 'admin'): ?>
		<span><a href="<?= $_SERVER['REQUEST_URI'] ?>&delete ">Delete</a></span> 
		<span><a href="index.php?page=edit&product=<?= $_GET['productnum'] ?>">Edit</a></span> 
	<?php endif ?> 
	<div id="product-theme" class="
	<?php if( $product['category'] == 'workstation' ){
		echo "workstation";
	}elseif($product['category'] == 'storage'){
		echo "storage";	
	}elseif($product['category'] == 'tech_accesories'){
		echo "tech";	
	}elseif($product['category'] == 'table'){
		echo "table";	
	}elseif($product['category'] == 'screen'){
		echo "workstation";	
	}elseif($product['category'] == 'agile_furniture'){
		echo "agile";	
	}elseif($product['category'] == 'chair'){
		echo "chair";	
	}elseif($product['category'] == 'joinery_custom'){
		echo "joinery";	
	} ?>">
	<div id="page-padding">
		<div id="left-col">
			<div class="product-images">
				<div class="large-img">
					<?php foreach( $Allimages as $image ): ?>
						<?php if( $image['image_position'] == 1 ): ?> 
							<img id="dispayImg" src="img/products/large/<?= $image['image'] ?>"> 
						<?php endif ?>
					<?php endforeach ?>
				</div> 
				<div class="img-thumb">
					<ol> 
						<?php foreach( $Allimages as $image): ?> 
							<?php for( $i = 1; $i <= 3; $i++ ): ?> 
								<?php if( $image['image_position'] == $i ): ?>  
									<li><img class="img-thumb" src="img/products/thumbnail/<?= $image['image'] ?>" onClick="ChangeImage('img/products/large/<?= $image['image'] ?>')"></li>
								<?php endif ?>
								
							<?php endfor ?>
						<?php endforeach; ?>
					</ol>
				</div>
			</div> 
		</div> 
		<div id="right-col">
			<div class="product-text">
				<?php if($_GET['page'] == 'product'): ?>
					<div class="title-text">
						<h1><?= $product['title'] ?></h1> 
						<p><?= $product['description'] ?></p>
					</div>  
				<?php endif ?>

				<?php if($_GET['page'] == 'portfolio'): ?>
					<div class="title-text">
						<h1><?= $port['title'] ?></h1> 
						<p><?= $port['description'] ?></p>
					</div>  
				<?php endif ?>
				<?php if($_GET['page'] == 'product'): ?>
					<div class="prod-features">
						<h2>Features</h2> 
						<ul class="product-list">
							<?php foreach( $Allfeatures as $feature): ?> 
								<?php for( $i = 1; $i <= 10; $i++ ): ?> 
									<?php if( $feature['position'] == $i ): ?>  
										<li><?= $feature['feature'] ?></li>
									<?php endif ?>
								<?php endfor ?>
							<?php endforeach; ?>
						</ul>
					</div>	 
					<div class="prod-options">
						<h2>Options</h2> 
						<ul class="product-list">
							<?php foreach( $Alloptions as $option): ?> 
								<?php for( $i = 1; $i <= 10; $i++ ): ?> 
									<?php if( $option['position'] == $i ): ?>  
										<li><?= $option['product_option'] ?></li>
									<?php endif ?>
								<?php endfor ?>
							<?php endforeach; ?>
						</ul> 	
					</div> 
				<?php endif ?>
			</div>
		</div>
	</div>
</div>
</div>  
<script type="text/javascript">
	function ChangeImage(a) {
		document.getElementById("dispayImg").src = a;
	}	
</script>