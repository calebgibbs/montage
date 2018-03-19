<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Products', 
	'desc' => 'montage interiors product range' 
]);  
$prevPage = $_SERVER['QUERY_STRING']; 
?>
<div class="body">  
	<div class="products-grid pro-grid-desktop">
		<div class="productsP-title">
			<h1 class="productsh1">Products</h1> 
			<h3 class="productsh3">For truely adpatable spaces</h3>
		</div>
		<div class="workstations-dia diamond" href="index.php?page=workstations_screens">
			<img src="img/products/categories/workstations.png" alt="Workstations and screens">
			<img class="mask" src="img/products/categories/workstationsMask.png">
		</div> 
		<div class="agile-dia diamond" diamond href="index.php?page=agile_furniture">
			<img src="img/products/categories/agile.png" alt="Agile furniture">
			<img class="mask" src="img/products/categories/agileMask.png">
		</div> 
		<div class="joinery-dia diamond" href="index.php?page=joinery_custom">
			<img src="img/products/categories/joinery.png" alt="Joinery and custom furniture">
			<img class="mask" src="img/products/categories/joineryMask.png">
		</div> 
		<div class="storage-dia diamond" href="index.php?page=storage">
			<img src="img/products/categories/storage.png" alt="Screens"> 
			<img src="img/products/categories/storageMask.png">
		</div> 
		<div class="chair-dia diamond" href="index.php?page=seating">
			<img src="img/products/categories/chairs.png" alt="Seating"> 
			<img src="img/products/categories/chairsMask.png">
		</div> 
		<div class="table-dia diamond" href="index.php?page=tables">
			<img src="img/products/categories/tables.png" alt="Tables">
			<img src="img/products/categories/tablesMask.png">
		</div> 
		<div class="tech-dia diamond" href="index.php?page=tech_accesories">
			<img src="img/products/categories/tech.png" alt="Tech and accesories"> 
			<img src="img/products/categories/techMask.png">
		</div>
	</div> 
	<div class="pro-grid-mobile">
		<div class="productsP-title">
			<h1 class="productsh1">Products</h1> 
			<h3 class="productsh3">For truely adpatable spaces</h3>
		</div> 
		<div class="mobile-prod-box" href="index.php?page=workstations_screens">
			<h3>Workstations</h3>
		</div> 
		<div class="mobile-prod-box" href="index.php?page=workstations_screens">
			<h3>Screens</h3>
		</div>
		<div class="mobile-prod-box" href="index.php?page=storage">
			<h3>Storage</h3>
		</div>
		<div class="mobile-prod-box" href="index.php?page=agile_furniture">
			<h3>Agile Furniture</h3>
		</div>
		<div class="mobile-prod-box" href="index.php?page=chairs">
			<h3>Chairs</h3>
		</div> 
		<div class="mobile-prod-box" href="index.php?page=tech_accesories">
			<h3>Tech &amp; Accesories</h3>
		</div> 
		<div class="mobile-prod-box" href="index.php?page=tables">
			<h3>Tables</h3>
		</div> 
		<div class="mobile-prod-box" href="index.php?page=joinery_custom">
			<h3>Joinery &amp; Custom</h3>
		</div>
	</div>
</div>