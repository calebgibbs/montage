<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | '.$title, 
	'desc' => 'This is the generic description'
]);  
?>  
<div class="body">
<div class="grid-padding">
<?php if( $_GET['page'] == 'agile_furniture' ): ?> 
	<div id="search-heading" class="agile-title tran-p"><h2>Agile Furniture</h2></div>  
	<div class="agile-cat subcat_link" href="index.php?page=team_collab">
		<img alt="Team Collaborative" src="img/products/categories/teamcollab.jpg">
	</div>
	<div class="agile-cat subcat_link" href="index.php?page=breakout">
		<img alt="breakout furniture" src="img/products/categories/breakout.jpg">
	</div>
	<div class="agile-cat subcat_link" href="index.php?page=focus">
		<img src="img/products/categories/focus.jpg">
	</div>
<?php endif ?>	
<?php if($_GET['page'] == 'joinery_custom'): ?> 
	<div id="search-heading" class="joinery-title tran-p"><h2>Joinery + Custom</h2></div>
	<div class="jc-cat subcat_link" href="index.php?page=joinery">
		<img src="img/products/categories/custom.jpg"> 
	</div>
	<div class="jc-cat subcat_link" href="index.php?page=custom">
		<img src="img/products/categories/joinerysub.jpg">
	</div>
<?php endif ?> 
<?php if($_GET['page'] == 'seating'): ?> 
	<div id="search-heading" class="chair-title tran-p"><h2>Seating</h2></div>
	<div class="seat-cat subcat_link" href="index.php?page=soft">
		<img src="img/products/categories/soft.jpg">
	</div>
	<div class="seat-cat subcat_link" href="index.php?page=task"> 
		<img src="img/products/categories/task.jpg">
	</div>
	<div class="seat-cat subcat_link" href="index.php?page=visitor_hospitality">
		<img src="img/products/categories/vishos.jpg">
	</div>
	<div class="seat-cat subcat_link" href="index.php?page=stools">
		<img src="img/products/categories/stools.jpg">
	</div>
	<div class="seat-cat subcat_link" href="index.php?page=meeting_room">
		<img src="img/products/categories/meetingroom.jpg">
	</div>
<?php endif ?>  
<?php if($_GET['page'] == 'tables'): ?> 
	<div id="search-heading" class="tables-title tran-p"><h2>Tables</h2></div> 
	<div class="table-cat subcat_link" href="index.php?page=meeting_breakout">
		<img src="img/products/categories/meetingb.jpg">
	</div>
	<div class="table-cat subcat_link" href="index.php?page=coffeeTables">
		<img src="img/products/categories/coffee.jpg">
	</div>
	<div class="table-cat subcat_link" href="index.php?page=leaners">
		<img src="img/products/categories/leaner.jpg">
	</div>
<?php endif ?> 
<?php if($_GET['page'] == 'tech_accesories'): ?> 
	<div id="search-heading" class="tech-title tran-p"><h2>Tech &amp; Accesories</h2></div> 
	<div class="tech-cat subcat_link" href="index.php?page=screen_workstation">
		<img src="img/products/categories/screen.jpg">
	</div>
	<div class="tech-cat subcat_link" href="index.php?page=tech">
		<img src="img/products/categories/tech.jpg">
	</div>
	<div class="tech-cat subcat_link" href="index.php?page=monitor_arms">
		<img src="img/products/categories/monitora.jpg">
	</div>
	<div class="tech-cat subcat_link" href="index.php?page=miscellaneous">
		<img src="img/products/categories/misc.jpg">
	</div>
<?php endif ?> 
<?php if($_GET['page'] == 'storage'): ?> 
	<div id="search-heading" class="storage-title tran-p"><h2>Storage</h2></div> 
	<div class="table-cat subcat_link" href="index.php?page=bespoke">
		<img src="img/products/categories/bespoke.jpg">
	</div>
	<div class="table-cat subcat_link" href="index.php?page=personal">
		<img src="img/products/categories/personal.jpg">
	</div>
	<div class="table-cat subcat_link" href="index.php?page=team">
		<img src="img/products/categories/team.jpg">
	</div>	
<?php endif ?>
</div>
</div>