<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors', 
		'desc' => 'montage interiors description' 
	]);   
	$prevPage = $_SERVER['QUERY_STRING'];
?> 
<div class="body"> 
	<div class="portfolio">
		<img src="img/triangles/portfolio.png" alt="portfolio" class="category"> 
		<span>Portfolio</span>
	</div>   
	<div class="statement1">
		<h2><span>Creating</span><br>agile spaces</h2>
	</div>
	<div class="about-us">
		<img src="img/triangles/about.png" class="category about"> 
		<span>Our story</span>
	</div> 
	<div class="statement2 cf">
		<span>Monage Interiors beleives <br>innovation is the key to <br>innovation</span>
	</div>
	<div class="products">
		<a href="results.html">
			<img src="img/triangles/products.png" alt="products" class="category"> 
			<span>Products</span> 
		</a>
	</div>  
	<div class="sustainability">
		<img src="img/triangles/sustainability.png" alt="sustainability" class="category"> 
		<span>Sustainability</span>
	</div> 
	<div class="bottom-tri">
		<img src="img/triangles/bottom.png">
	</div> 
</div>