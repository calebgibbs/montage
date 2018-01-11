<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Product', 
	'desc' => 'montage interiors products' 
]);   
?>
<div class="body"> 
	<div id="product-theme" class="chair">
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
								<?php for( $i = 1; $i <= 5; $i++ ): ?> 
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
					<div class="title-text">
						<h1><?= $product['title'] ?></h1> 
						<p><?= $product['description'] ?><div class="view-more"></div></p>
						</div> 
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