<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors', 
		'desc' => 'montage interiors description' 
	]);   
	$_SESSION['page'] = $_SERVER['REQUEST_URI'];
?> 
<div class="body"> 
	<div class="top">
		<div class="portfolio">
			<img src="img/home/portfolio.png">
		</div> 
		<div class="mission-statement">
			<span><h2>Creating</h2></span> 
			<span><h3>Agile spaces</h3></span> 
			<span><p>Montage interiors beleive innovation is the</p></span> 
			<span><p>key to a functional workspace.</p></span>
		</div>
	</div> 
	<div class="bottom">
		<div class="our-story">
			<img src="img/home/ourstory.png">
		</div> 
		<div class="product">
			<img src="img/home/product.png">
		</div> 
		<div class="sustainability">
			<img class="susimg" src="img/home/sustainability.png">
			<img class="dwnimg" src="img/home/downloads.png">
		</div> 
		<div class="downloads">
			
		</div>
	</div>
</div>