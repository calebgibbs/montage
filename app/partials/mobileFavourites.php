<?php
$this -> layout('master',[
	'title'=>'Montage Interiors | Favourites', 
	'desc' => 'montage interiors Staff help page' 
]);
?>
<div class="body">
	<div class="favourites-mob"> 
		<div id="favourite-products-all-mobile">
			<?php if(!empty($fav)): ?>
				<form method="post">
					<?php foreach(array_reverse($fav) as $f): ?> 
						<div id="<?= $f[0]['id'] ?>:<?= $_SESSION['id'] ?>:box" class="fav-prod">
							<a href="index.php?page=product&productnum=<?= $f[0]['id'] ?>">
								<img src="img/products/thumbnail/<?= $f[0]['image'] ?>" width="200px" height="150px"> 
							</a>
							<h5 class="product-title"><span><?= $f[0]['title'] ?></span></h5> 
							<button class="favDel" name="delfav" value="<?= $f[0]['id'] ?>">&#10005;</button>
						</div>  
						
					<?php endforeach ?> 
				</form>
			<?php endif ?> 
			<?php if(empty($fav)): ?> 
				<div class="favempty">Your favourites is currently empty</div>
			<?php endif ?>
		</div>
	</div>
</div>  