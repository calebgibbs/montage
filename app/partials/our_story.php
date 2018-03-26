<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors', 
	'desc' => 'montage interiors our story' 
]);   
$_SESSION['page'] = $_SERVER['REQUEST_URI'];
?> 
<div class="body story-page"> 
	<div id="sus-page" class="sus-D-grid">
		<div class="sustainability-grid">
			<div class="tri1 top-img">
				<img src="img/story/tri1.png">
			</div> 
			<div class="experience top-img">
				<img src="img/story/experience.png">
			</div> 
			<div class="journey top-img">
				<img src="img/story/journey.png">
			</div> 
			<div>
				<div class="history bottom-img">
					<img src="img/story/history.png">
				</div> 
				<div class="tri2 bottom-img">
					<img src="img/story/tri2">
				</div> 
			</div>
		</div> 

		<div class="sus-text">
			<h1>Our Story</h1>  
			<h2>Since 1990</h2> 
			<p>As established, 100% New <br> 
			   Zealand owned company, <br> 
			   montage has many years of <br> 
			   experience in providing <br>
			   furniture solutions
			</p>
		</div> 
	</div> 
	<div class="sus-M-grid">
		<div class="sus-m-padding">
			<h1>Our Story</h1>
		</div>  
		<div class="mobile-grid-sus">
			<div>
				<h3>Experience</h3> 
				<img src="img/sustainability/material-mobile.png">
			</div>
			<div>
				<h3>Journey Ahead</h3> 
				<img src="img/sustainability/smart-mobile.png">
			</div>
			<div>
				<h3>History</h3> 
				<img src="img/sustainability/recycle-mobile.png">
			</div>
		</div>
	</div>
	<div id="modals"> 
		<div id="experience-modal" class="modal">
			<button class="closeModal">&#10005;</button>
			<div class="modal-inner">
				<div class="modal-heading">
					<img src="img/sustainability/modal.png"> 
					<h4>Culture</h4> 		
				</div> 
				<div class="modal-text">
					<article>
						<h1>Montage Culture</h1> 
						<p>The Montage Interiors company culture consists of a practical, organic and inclusive environment. Leaders share their experience in an autonomous workflow that allows staff to excel and set goals high. Operating out of one premises, experienced consultation is provided through functional factory insights.</p> 
						<p>An organic culture promotes our passionate and dedicated account managers to go the extra mile for clients. We prefer to view our client relationships as business partnerships. We challenge our partners in a productive and refreshing way that ensures they are not just receiving functional workplace solutions, but investments the future.</p>
						<p>A day in the life at Montage is never quite the same. A diverse yet collective group of hard working and proactive staff are always ready to put their heads together for the next challenge. This is what sees our clients receive the upmost quality service and solutions the market has to offer.</p>
					</article>
				</div>	
			</div>
		</div>
		<div id="journey-modal" class="modal">
			<button class="closeModal">&#10005;</button>
			<div class="modal-inner">
				<div class="modal-heading">
					<img src="img/sustainability/modal.png"> 
					<h4>Journey Ahead</h4> 		
				</div> 
				<div class="modal-text">
					<article>
						<h1>Montage Journey Ahead</h1> 
						<p>Montage Interiors is committed to staying on top of industry trends, constantly analysing local and international markets. We take responsibility in showing our clients the full spectrum of possibilities, to ensure they have all the information to make workplace investments suited to them.</p>
						<p>It is an exciting time for the world of work, with an ageing workforce and new generations entering employment - workplaces have never been so diverse.</p>
						<p>Montage Interiors looks to continue building trusting relationships with NZ organisations and agencies, where genuine value is provided. Every business is different, therefore, seeking out the true motivations that individually drive a company’s success is paramount to our approach.</p> 
						<p>We strive to facilitate the increasing awareness of healthy, productive and collaborative workplaces in NZ.</p> 
						<p>Join us and together we can raise the bar and enhance New Zealand work environments.</p>
					</article>
				</div>	
			</div>
		</div>
		<div id="history-modal" class="modal">
			<button class="closeModal">&#10005;</button>
			<div class="modal-inner">
				<div class="modal-heading">
					<img src="img/sustainability/modal.png"> 
					<h4>History</h4> 		
				</div> 
				<div class="modal-text">
					<article>
						<h1>Montage History</h1> 
						<p>Montage Interiors has been operating in the commercial environment since 1990. The senior team share a wealth of industry experience, many serving upwards of three decades in the sector. This experience, mixed with a diverse group of passionate individuals that genuinely take pride in their work sets Montage apart from the rest.</p>
						<p>Director Dave Banks, a qualified cabinet maker, has been with Montage Interiors from the beginning, as has Account Manager Derek Joy. Both factory and Installation Managers Simon Fuller and Rob Jones have been with Montage Interiors for over 15 years.</p>
						<p>The dedication and expertise of the Montage Interiors team is evident in the timely, high quality fit outs completed for our valued clients.</p>
					</article>
				</div>	
			</div>
		</div>
	</div>
</div> 
