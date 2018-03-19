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
	<div class="agile-cat subcat_link" href="index.php?page=team_collab">
		<img alt="Team Collaborative" src="http://placehold.it/400x600">
	</div>
	<div class="agile-cat subcat_link" href="index.php?page=breakout">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="agile-cat subcat_link" href="index.php?page=focus">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?>	
<?php if($_GET['page'] == 'joinery_custom'): ?> 
	<h1>Joinery and Custom Furniture</h1> 
	<div class="jc-cat subcat_link" href="index.php?page=joinery">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="jc-cat subcat_link" href="index.php?page=custom">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?> 
<?php if($_GET['page'] == 'seating'): ?> 
	<h1>Seating</h1> 
	<div class="seat-cat1 subcat_link" href="index.php?page=soft">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="seat-cat1 subcat_link" href="index.php?page=task"> 
		<img src="http://placehold.it/400x600">
	</div>
	<div class="seat-cat1 subcat_link" href="index.php?page=visitor_hospitality">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="seat-cat2 subcat_link" href="index.php?page=stools">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="seat-cat2 subcat_link" href="index.php?page=meeting_room">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?>  
<?php if($_GET['page'] == 'tables'): ?> 
	<h1>Tables</h1> 
	<div class="table-cat subcat_link">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="table-cat subcat_link">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="table-cat subcat_link">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?> 
<?php if($_GET['page'] == 'tech_accesories'): ?> 
	<h1>Tech and Accesories</h1> 
	<div class="tech-cat subcat_link">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="tech-cat subcat_link">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="tech-cat subcat_link">
		<img src="http://placehold.it/400x600">
	</div>
	<div class="tech-cat subcat_link">
		<img src="http://placehold.it/400x600">
	</div>
<?php endif ?>
</div>
</div>