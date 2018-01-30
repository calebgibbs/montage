<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors', 
		'desc' => 'montage interiors description' 
	]);   
	$_SESSION['page'] = $_SERVER['REQUEST_URI'];
?> 
<div class="body sustainability-page"> 
	<div class="sustainability-grid">
		<div class="tri1 top-img">
			<img src="img/sustainability/tri1.png">
		</div> 
		<div class="material top-img">
			<img src="img/sustainability/material.png">
		</div> 
		<div class="smart top-img">
			<img src="img/sustainability/smart.png">
		</div> 
		<div>
			<div class="recycle bottom-img">
				<img src="img/sustainability/recycle.png">
			</div> 
			<div class="tri2 bottom-img">
				<img src="img/sustainability/tri2">
			</div> 
		</div>
	</div> 

	<div class="sus-text">
		<h1>Commitment</h1>  
		<h2>To Sustainability</h2> 
		<p>At montage we are committed <br>
		   to protecting our environment <br>
		   for the future generations</p>
	</div>
</div>