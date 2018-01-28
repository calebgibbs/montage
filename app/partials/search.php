<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors', 
		'desc' => 'montage interiors description' 
	]);   
	$_SESSION['page'] = $_SERVER['REQUEST_URI'];
?> 
<div class="body"> 
	<?php if( $results == 'No results' ): ?>  
		<h3>No results</h3>
	<?php endif ?> 
	<?php if( $results != 'No results' ): ?>
		<?php foreach( $results as $result ): ?> 
			<?php if( $result['image_position'] == 1 ): ?>
			<a href="index.php?page=product&productnum=<?= $result['id'] ?>">
				<img src="img/products/thumbnail/<?= $result['image'] ?>">
				<h3><?= $result['score_title'] ?></h3> 
			</a>
			<br>
		<?php endif ?>
		<?php endforeach ?> 
	<?php endif ?>
</div>