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
		<a href="index.php?page=edit&product=<?= $_GET['productnum'] ?>">Edit</a>
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
			<?php if($_GET['page'] == 'portfolio'): ?>
				<div class="product-images">
					<div class="large-img">
						<?php foreach( $Allimages as $image ): ?>
							<?php if( $image['image_position'] == 1 ): ?> 
								<img id="dispayImg" src="img/portfolio/large/<?= $image['image'] ?>"> 
							<?php endif ?>
						<?php endforeach ?>
					</div> 
					<div class="slider-container">
						<button class="next">Next</button> 
						<button class="prev">Prev</button> 
						<div class="slider">
							<div class="thumbs">
								<?php $imgC = 1 ?> 
								<?php foreach($Allimages as $image ): ?> 
								<div class="imgSlide_<?= $imgC ?>">
									<img src="img/portfolio/thumbnail/<?= $image['image'] ?>" onClick="ChangeImage('img/portfolio/large/<?= $image['image'] ?>')">
								</div> 
								<?php $imgC++ ?>
								<?php endforeach ?>
							</div>	
						</div>
					</div>
				</div> 
			<?php endif ?>
		</div> 
		<div id="right-col">
			<div class="product-text">
				<?php if($_GET['page'] == 'product'): ?>
					<div class="title-text">
						<h1 class="prod-d-title"><?= $product['title'] ?></h1>  
						<?php if($_SESSION['account_type'] == 'admin'): ?> 
							<p>Supplier: <?= ucfirst($product['supplier']) ?></p>
						<?php endif ?>
						<p><?= $product['description'] ?></p>
					</div>  
				<?php endif ?>

				<?php if($_GET['page'] == 'portfolio'): ?>
					<div class="title-text">
						<h1 class="prod-d-title"><?= $port['title'] ?></h1> 
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
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
$(function(){
	var elemCount = <?= $imgC ?>; 
	var current = 1; 
	var elemWidth = 250; 
	var move = 0;  
	$('.next').click(function(){
		if( current < elemCount){ 
			$('.slider .thumbs').toggleClass('move'); 
			move += elemWidth;  
			$('.slider .thumbs').css('transform', 'translateX(-'+move+'px)'); 
			current++;
		}else{ 
			move = 0; 
			current = 1;  
			$('.slider .thumbs').css('transform', 'translateX('+move+'px)');
		}
	}); 
	$('.prev').click(function(){
		if( current > 0){
			$('.slider .thumbs').toggleClass('move'); 
			move -= elemWidth; 
			current--;  
			$('.slider .thumbs').css('transform', 'translateX(-'+move+'px)');
		}
	});
});
</script>