<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Sustainability', 
	'desc' => 'montage interiors description sustainability page' 
]);   
$_SESSION['page'] = $_SERVER['REQUEST_URI'];
?> 
<div class="body sustainability-page"> 
	<div id="sus-page" class="sus-D-grid">
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
	<div class="sus-M-grid">
		<div class="sus-m-padding">
			<h1>sustainabilty</h1>
		</div>  
		<div class="mobile-grid-sus">
			<div>
				<h3>Material Utilisation</h3> 
				<img src="img/sustainability/material-mobile.png">
			</div>
			<div>
				<h3>Smart Procedurement</h3> 
				<img src="img/sustainability/smart-mobile.png">
			</div>
			<div>
				<h3>Recycling</h3> 
				<img src="img/sustainability/recycle-mobile.png">
			</div>
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

		<div id="smart-modal" class="modal">
			<button class="closeModal">&#10005;</button>
			<div class="modal-inner">
				<div class="modal-heading">
					<img src="img/sustainability/modal.png"> 
					<h4>Smart Proceduremnt</h4> 		
				</div> 
				<div class="modal-text">
					<article>
						<h1>Montage Smart Proceduremnt</h1> 
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

		<div id="recycle-modal" class="modal">
			<button class="closeModal">&#10005;</button>
			<div class="modal-inner">
				<div class="modal-heading">
					<img src="img/sustainability/modal.png"> 
					<h4>Smart Proceduremnt</h4> 		
				</div> 
				<div class="modal-text">
					<article>
						<h1>Montage Smart Proceduremnt</h1> 
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
