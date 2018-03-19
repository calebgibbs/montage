<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | '.$title, 
	'desc' => 'This is the generic description'
]);  
?>  
<div class="body">
<div class="grid-padding">
<?php if( $_GET['page'] == 'agile_furniture' ): ?> 
	<h1>Agile Furniture</h1> 
	<div class="agile-cat">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="agile-cat">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="agile-cat">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?>	
<?php if($_GET['page'] == 'joinery_custom'): ?> 
	<h1>Joinery and Custom Furniture</h1> 
	<div class="jc-cat">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="jc-cat">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?> 
<?php if($_GET['page'] == 'seating'): ?> 
	<h1>Seating</h1> 
	<div class="seat-cat1">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="seat-cat1">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="seat-cat1">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="seat-cat2">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="seat-cat2">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?>  
<?php if($_GET['page'] == 'tables'): ?> 
	<h1>Tables</h1> 
	<div class="table-cat">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="table-cat">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="table-cat">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?> 
<?php if($_GET['page'] == 'tech_accesories'): ?> 
	<h1>Tech and Accesories</h1> 
	<div class="tech-cat">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="tech-cat">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="tech-cat">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="tech-cat">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?>
</div>
</div>