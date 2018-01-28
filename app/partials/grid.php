<?php   
$this -> layout('master',[
	'title'=>'Montage Interiors | '.$title, 
	'desc' => 'This is the generic description'
]);   
?> 
<div class="body">
	<div id="grid-page-outer">
		<div id="search-heading" class="<?= $class ?>"><h2><?= $title ?></h2></div> 
		<div id="boxes">	 
			<?php if( $results == 'No results' ): ?>  
				<?php if($class == 'search-title'): ?> 
					<h3 class="noResults">No results for "<?= $title ?>"</h3>
				<?php endif ?> 
				<?php if($class != 'search-title'): ?> 
					<h3 class="noResults">There are no products in this Category</h3>
				<?php endif ?>
			<?php endif ?> 
			<?php if( $results != 'No results' ): ?> 
				<?php foreach( $results as $result ): ?> 
					<?php if( $result['image_position'] == 1 ): ?>
						<div class="box-outer" href="index.php?page=product&productnum=<?= $result['id'] ?>">
							<div class="box-inner">
								<div class="box-img">
									<img src="img/products/thumbnail/<?= $result['image'] ?>"> 
								</div> 
								<div class="box-title">
									<h5><?= $result['score_title'] ?></h5>
								</div>
							</div>
						</div>		
					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div>
</div>