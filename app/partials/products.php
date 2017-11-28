<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors | Products', 
		'desc' => 'montage interiors products' 
	]);  
	$prevPage = $_SERVER['QUERY_STRING']; 
?>
<div class="body">  
	<div class="products-grid">
		<div id="work-stations" class="diamond">
			<img src="img/triangles/workstations.png" alt="Workstations and screens">
			<span>Workstations<br> &amp; Screens</span>
		</div>
		<div id="agile" class="diamond">
			<img src="img/triangles/agile.png" alt="Agile Furniture">
			<span>Agile furniture</span>
		</div>
		<div id="joinery" class="diamond">
			<img src="img/triangles/joinery.png" alt="Joinery and Custom furniture"> 
			<span>Joinery &amp;<br> Custom <br>Furniture</span> 
		</div> 
		<div id="storage" class="diamond">
			<img src="img/triangles/storage.png" alt="Storage">
		</div>  
		<div id="storage-span">
			<span>Storage</span>
		</div>
		<div id="table-chair">
			<div id="chairs" class="diamond"> 
				<img src="img/triangles/chairs.png" alt="Chairs"> 
				<span>Chairs</span> 
			</div> 
			<div id="tables" class="diamond"> 
				<img src="img/triangles/tables.png" alt="Tables"> 
				<span>Tables</span> 
			</div>
		</div> 
		<div id="tech" class="diamond">
			<img src="img/triangles/tech.png" alt="Tech and Accessories"> 
			<span>Teach <br> Accesories</span>
		</div>
	</div> 
	<div class="download-btn">
		<div class="download-text"><h3>Download images</h3></div>
		<div class="download-img">
			<img src="img/triangles/download.png">
		</div> 
	</div>
</div>