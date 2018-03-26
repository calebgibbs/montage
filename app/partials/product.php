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
		<a class="edit-btn" href="index.php?page=edit&product=<?= $_GET['productnum'] ?>">Edit</a>
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
			<?php if($_GET['page'] == 'product'): ?>
				<div class=" t-m-heading
				<?php if( $product['category'] == 'workstation' ){
					echo "workstations-title";
				}elseif($product['category'] == 'storage'){
					echo "storage-title";	
				}elseif($product['category'] == 'tech_accesories'){
					echo "tech-title";	
				}elseif($product['category'] == 'table'){
					echo "tables-title";	
				}elseif($product['category'] == 'screen'){
					echo "workstations-title";	
				}elseif($product['category'] == 'agile_furniture'){
					echo "agile-title";	
				}elseif($product['category'] == 'chair'){
					echo "chair-title";	
				}elseif($product['category'] == 'joinery_custom'){
					echo "joinery-title";	
				} ?>">
				<h1><?= $product['title'] ?></h1>	
			</div>
			<div class="product-images">
				<div class="large-img">
					<form method="post">
						<button class="a-f-b" name="addfav" value="<?= $_GET['productnum'] ?>"><?php 
						if(isset($_SESSION['favourites'])){ 
							$current = $_GET['productnum'];  
							$favourites = json_decode($_SESSION['favourites'], true); 
							if(in_array($current, $favourites)){ 
								echo "&diams;";
							}else{ 
								echo "&loz;";
							}
						}else{ 
							$current = $_GET['productnum'];  
							$favourites = json_decode($_COOKIE['favourites'], true);  
							if(!empty($favourites)){ 
								if(in_array($current, $favourites)){ 
									echo "&diams;";
								}else{ 
									echo "&loz;";
								}
							}else{ 
								echo "&loz;";
							}

						}
						?></button> 

					</form>
					<?php foreach( $Allimages as $image ): ?>
						<?php if( $image['image_position'] == 1 ): ?> 
							<img id="dispayImg" src="img/products/large/<?= $image['image'] ?>"> 
						<?php endif ?>
					<?php endforeach ?>
				</div>
				<div class="slider-container">
					<button class="prev slider-btn" alt="Previous"><</button> 
					<button class="next slider-btn" alt="Next">></button> 
					<div class="slider">
						<div class="thumbs">
							<?php $imgC = 0 ?>
							<?php foreach($Allimages as $image ): ?> 
								<?php $imgC++ ?>
								<div class="imgSlide_<?= $imgC ?>">
									<img <?php if($image['image_position'] == 1): ?> id="imgSize" <?php endif ?> src="img/products/thumbnail/<?= $image['image'] ?>" onClick="ChangeImage('img/products/large/<?= $image['image'] ?>')">
								</div> 
							<?php endforeach ?>
						</div>	
					</div>
				</div> 
				<div class="mobile-thumbs">
					<?php foreach($Allimages as $image ): ?> 
						<?php $imgC++ ?>
						<div class="mobile-img">
							<img <?php if($image['image_position'] == 1): ?> id="imgSize" <?php endif ?> src="img/products/thumbnail/<?= $image['image'] ?>" onClick="ChangeImage('img/products/large/<?= $image['image'] ?>')">
						</div> 
					<?php endforeach ?>
				</div>
			</div> 
			<div id="under-img">
				<?php if( $dim != 'noDim' ): ?>
					<div class="page-dimensions">
						<h2>Dimensions</h2> 
						<table class="dimensionTable">
							<?php foreach($dim as $dim_i): ?> 
								<tr>
									<td><?= $dim_i['dimension_type'] ?></td> 
									<td><?= $dim_i['dimension'] ?></td>
								</tr>
							<?php endforeach ?> 
						</table>
					</div> 
				<?php endif ?>
				<?php if( $downloads != 'noDwn' ): ?>
					<div class="page-downloads">
						<h2>Downloads</h2> 
						<ul class="downloads_list">
							<?php foreach($downloads as $dwn): ?> 
								<a href="<?= $dwn['download_link'] ?>"><?= $dwn['title'] ?></a>
							<?php endforeach ?>
						</ul>
					</div>
				<?php endif ?>
			</div> 
		<?php endif ?>
	</div> 
	<div id="right-col">
		<div class="product-text">
			<?php if($_GET['page'] == 'product'): ?>
				<div class="title-text">
					<h1 class="prod-d-title"><?= $product['title'] ?></h1>  
					<?php if($_SESSION['account_type'] == 'admin'): ?> 
						<p class="supplier-name">Supplier: <?= ucfirst($product['supplier']) ?></p>
					<?php endif ?>
					<p><?= $product['description'] ?></p>
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
				<?php if($links != 'noLinks'): ?>
					<div class="prod-options">
						<h2>Suggested options</h2> 
						<ul class="product-list">
							<?php foreach( $links as $link): ?> 
								<?php for( $i = 1; $i <= 5; $i++ ): ?> 
									<?php if( $link['position'] == $i ): ?>  
										<li><a class="prod-link" href="<?= $link['href'] ?>" target="_blank"><?= $link['link_text'] ?></a></li>
									<?php endif ?>
								<?php endfor ?>
							<?php endforeach; ?>
						</ul> 	
					</div> 
				<?php endif ?> 
				<?php if( $dim != 'noDim' ): ?>
					<div class="page-dimensions-m-t">
						<h2>Dimensions</h2> 
						<table class="dimensionTable">
							<?php foreach($dim as $dim_i): ?> 
								<tr>
									<td><?= $dim_i['dimension_type'] ?></td> 
									<td><?= $dim_i['dimension'] ?></td>
								</tr>
							<?php endforeach ?> 
						</table>
					</div> 
				<?php endif ?>
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
		var img = document.getElementById('imgSize');
		var imgW = img.clientWidth; 
		var elemCount = <?= $imgC - 2?>; 
		var current = 1; 
		var elemWidth = imgW + 11.200; 
		var move = 0;  
		if(<?= $imgC ?> <= 3){ 
			$('.slider-btn').css('display','none');
		}

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