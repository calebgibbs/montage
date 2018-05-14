<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Sustainability', 
	'desc' => 'montage interiors description sustainability page' 
]);   
?> 
<div class="body sustainability-page"> 
	<div id="sus-page" class="sus-D-grid">
		<div class="sustainability-grid">
			<div class="tri1 top-img">
				<img src="img/sustainability/tri1.png">
			</div> 
			<div class="material top-img triangle">
				<div class="hover-over"></div>
				<img src="img/sustainability/material.png">
			</div> 
			<div class="smart top-img triangle">
				<div class="hover-over"></div>
				<img src="img/sustainability/smart.png">
			</div> 
			<div>
				<div class="recycle bottom-img triangle">
					<div class="hover-over"></div>
					<img src="img/sustainability/recycle.png">
				</div> 
				<div class="tri2 bottom-img">
					<img src="img/sustainability/tri2.png">
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
			<div class="m-material-art-trig">
				<h3>Material Utilisation</h3> 
				<img src="img/sustainability/material-mobile.png">
			</div> 
			<div class="mobile-art m-material-art">
				<article>
					<h1>Montage Material Utilisation </h1> 
					<p>Wastage minimisation is controlled by our CNC (computer numerical control) machine which ensures the least possible wastage is created from cutting laminates for joinery and desktops. Any left overs are then used wherever else possible.</p> 
					<p>Operating out of one premises, our experienced account managers can walk downstairs to the factory and oversee the operation themselves. This allows for a more holistic approach to be taken when allowing for materials. They can physically see what is available and how it may benefit any of their clients. Ultimately less wastage is created, and the cost savings are passed on to clients. A win win formula.</p> 
				</article>
			</div>
			<div class="m-smart-art-trig">
				<h3>Smart Procurement</h3> 
				<img src="img/sustainability/smart-mobile.png">
			</div> 
			<div class="mobile-art m-smart-art">
				<article>
					<h1>Montage Smart Procurement</h1> 
					<p>Montage Interiors’ wealth of experience enables us to smartly procure raw materials to reduce environmental harm, with future generations in mind.</p>
					<p>We strongly support the use of local manufacture and choose only to work with ethical and sustainable suppliers. Not only does this support the local economy, but it ensures sustainable choices are being made and helps such responsible businesses grow. Promoting the use of recycled plastics, fabrics, steel and more is a small but crucial step to keeping environmental impacts to a minimum.</p> 
					<p>With decades of experience, Montage utilises collective industry knowledge in the procurement and allocation of materials.</p>
				</article>
			</div>
			<div class="m-recycle-art-trig">
				<h3>Recycling</h3> 
				<img src="img/sustainability/recycle-mobile.png">
			</div> 
			<div class="mobile-art m-recycle-art">
				<article>
					<h1>Recycling</h1> 
					<p>Montage Interiors implements a proactive recycling policy. All cardboard, polystyrene, steel and aluminium are recycled. Our team understand that such simple initiatives such as recycling and re-using wherever possible on the day to day makes a significant difference over time.</p> 
					<p>Because we run our own deliveries locally, we can assemble desks and other furniture items at the factory. This not only allows us to recycle instantly rather than double handling rubbish, but it makes for swift and efficient deliveries. Efforts to reduce unnecessary usage of </p>
					<p>paper also play a part way in reducing waste, moving forward and adopting more paperless digital processes.</p>
				</article>	
			</div>
		</div>
	</div>
	<div id="modals"> 
		<div id="material-modal" class="modal">
			<button class="closeModal">&#10005;</button>
			<div class="modal-inner">
				<div class="modal-heading">
					<img src="img/sustainability/modal.png"> 
					<h4>Material Utilisation </h4> 		
				</div> 
				<div class="modal-text">
					<article>
						<h1>Montage Material Utilisation </h1> 
						<p>Wastage minimisation is controlled by our CNC (computer numerical control) machine which ensures the least possible wastage is created from cutting laminates for joinery and desktops. Any left overs are then used wherever else possible.</p> 
						<p>Operating out of one premises, our experienced account managers can walk downstairs to the factory and oversee the operation themselves. This allows for a more holistic approach to be taken when allowing for materials. They can physically see what is available and how it may benefit any of their clients. Ultimately less wastage is created, and the cost savings are passed on to clients. A win win formula.</p> 
					</article>
				</div>	
			</div>
		</div> 

		<div id="smart-modal" class="modal">
			<button class="closeModal">&#10005;</button>
			<div class="modal-inner">
				<div class="modal-heading">
					<img src="img/sustainability/modal-smart.png"> 
					<h4>Smart Procurement</h4> 		
				</div> 
				<div class="modal-text">
					<article>
						<h1>Montage Smart Procurement</h1> 
						<p>Montage Interiors’ wealth of experience enables us to smartly procure raw materials to reduce environmental harm, with future generations in mind.</p>
						<p>We strongly support the use of local manufacture and choose only to work with ethical and sustainable suppliers. Not only does this support the local economy, but it ensures sustainable choices are being made and helps such responsible businesses grow. Promoting the use of recycled plastics, fabrics, steel and more is a small but crucial step to keeping environmental impacts to a minimum.</p> 
						<p>With decades of experience, Montage utilises collective industry knowledge in the procurement and allocation of materials.</p>
					</article>
				</div>	
			</div>
		</div> 

		<div id="recycle-modal" class="modal">
			<button class="closeModal">&#10005;</button>
			<div class="modal-inner">
				<div class="modal-heading">
					<img src="img/sustainability/modal.png"> 
					<h4>Recycling</h4> 		
				</div> 
				<div class="modal-text">
					<article>
						<h1>Recycling</h1> 
						<p>Montage Interiors implements a proactive recycling policy. All cardboard, polystyrene, steel and aluminium are recycled. Our team understand that such simple initiatives such as recycling and re-using wherever possible on the day to day makes a significant difference over time.</p> 
						<p>Because we run our own deliveries locally, we can assemble desks and other furniture items at the factory. This not only allows us to recycle instantly rather than double handling rubbish, but it makes for swift and efficient deliveries. Efforts to reduce unnecessary usage of </p>
						<p>paper also play a part way in reducing waste, moving forward and adopting more paperless digital processes.</p>
					</article>
				</div>	
			</div>
		</div>
	</div>
</div> 
