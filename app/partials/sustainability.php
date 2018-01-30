<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors', 
	'desc' => 'montage interiors description' 
]);   
$_SESSION['page'] = $_SERVER['REQUEST_URI'];
?> 
<div class="body sustainability-page"> 
	<div id="sus-page">
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
	<div id="modals"> 
		<div id="material-modal" class="modal">
			<button class="closeModal">&#10005;</button>
			<div class="modal-inner">
				<div class="modal-heading">
					<img src="img/sustainability/modal.png"> 
					<h4>Material Utilisation</h4> 		
				</div> 
				<div class="modal-text">
					<article>
						<h1>Montage Material Utilisation</h1> 
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
					</article>
					<img src="http://placehold.it/300x250">
				</div>	
			</div>
		</div>
	</div>
</div> 
