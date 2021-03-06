<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Contact', 
	'desc' => 'montage interiors contact' 
]);   
$_SESSION['page'] = $_SERVER['REQUEST_URI'];
?> 
<div class="body contact-body"> 
	<div class="page-outer contact-page">
		<div id="search-heading" class="downloads-title"><h2>Contact</h2></div>
		<div id="contact-left">
			<h2>Nation Wide Coverage</h2>
			<img src="img/contact/map.png">	
		</div> 
		<div id="contact-right">
			<h2>Account Managers</h2>    
			<table class="managers">
				<?php foreach($managers as $manager): ?> 
				<tr>
					<td class="c-name"><?= $manager['name'] ?></td> 
					<td><?= $manager['email'] ?></td>
					<td><?= $manager['phone'] ?></td>
				</tr> 
				<tr>
					<td class="contact-ph"><?= $manager['phone'] ?></td>
				</tr>
				<?php endforeach ?>
			</table>
			<div class="linked-in">
				<a href="https://www.linkedin.com/company/montage-interiors-nz/ " target="_blank"><i class="fa fa-linkedin"></i> Find us on LinkedIn</a>
			</div>
			<div id="map" class="cf">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2253.7139645056213!2d174.82701322233012!3d-41.137282905752535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38afd5a9f9430b%3A0x84a79497ce7b8722!2sMontage+Interiors!5e0!3m2!1sen!2snz!4v1517353751682" frameborder="0" style="border:0" allowfullscreen></iframe>	
			</div> 
		</div> 
		<div id="contact-device">
			<h2>Nation Wide Coverage</h2>
			<img src="img/contact/map.png">	
		</div>
	</div>  

</div>