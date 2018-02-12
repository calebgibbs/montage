<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors', 
		'desc' => 'montage interiors description' 
	]);   
	$_SESSION['page'] = $_SERVER['REQUEST_URI'];
?> 
<div class="body homebg"> 
	<div class="top">
		<div class="portfolio">
			<img class="homeLink" src="img/home/portfolio.png" href="index.php?page=portfolios">
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
			<img class="homeLink" src="img/home/ourstory.png" href="index.php?page=our_story">
		</div> 
		<div class="product">
			<img class="homeLink" src="img/home/product.png" href="index.php?page=products">
		</div> 
		<div class="sustainability">
			<img class="susimg homeLink" src="img/home/sustainability.png" href="index.php?page=sustainability">
			<img class="dwnimg homeLink" src="img/home/downloads.png" href="index.php?page=downloads">
		</div> 
		<div class="downloads">
			
		</div>
	</div>
</div> 