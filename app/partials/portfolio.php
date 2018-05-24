<?php 
if($_GET['page'] == 'product'){ 
	$title = $product['title']; 
	$description = $product['description']; 
}else{ 
	$title = $port['title']; 
	$description = $port['description'];
}
$this -> layout('master',[
	'title'=>'Montage Interiors | '.$title, 
	'desc' => $description 
]); 

?>
<div class="body">
<?php if(isset($_SESSION['account_type'])): ?> 
	<?php if($_SESSION['account_type'] == 'admin'): ?>
	<a href="index.php?page=edit_port&port=<?= $_GET['num'] ?>">Edit</a>
	<?php endif ?> 
<?php endif ?>
	<div id="product-theme">
		<div id="page-padding">
			<h1 id="porttitle" class="port-title"><?= $port['title'] ?></h1>
			<div class="port-left" id="left-col"> 
				<div class="product-images">
					<div class="large-img">
						<?php foreach( $Allimages as $image ): ?>
							<?php if( $image['image_position'] == 1 ): ?> 
								<img id="dispayImg" src="img/portfolio/large/<?= $image['image'] ?>"> 
							<?php endif ?>
						<?php endforeach ?>
					</div>
					<div id="slider-container" class="slider-container">
						<button id="prevBtn" class="prev slider-btn" alt="Previous"><</button> 
						<button class="next slider-btn" alt="Next">></button> 
						<div class="slider">
							<div class="thumbs">
								<?php $imgC = 0 ?>
								<?php foreach($Allimages as $image ): ?> 
									<?php $imgC++ ?>
									<div class="imgSlide_<?= $imgC ?>">
										<img <?php if($image['image_position'] == 1): ?> id="imgSize" <?php endif ?> src="img/portfolio/thumbnail/<?= $image['image'] ?>" onClick="ChangeImage('img/portfolio/large/<?= $image['image'] ?>')">
									</div> 
								<?php endforeach ?>
							</div>	
						</div>
					</div> 
					<div class="mobile-thumbs">
					<?php foreach($Allimages as $image ): ?> 
						<div class="mobile-img">
							<img <?php if($image['image_position'] == 1): ?> id="imgSize" <?php endif ?> src="img/portfolio/thumbnail/<?= $image['image'] ?>" onClick="ChangeImage('img/portfolio/large/<?= $image['image'] ?>')">
						</div> 
					<?php endforeach ?>
				</div>
				</div>
			</div> 
			<div class="port-text" id="right-col">
				<p>
					<?php if($port['client'] != 'N/A'): ?><span>Client:</span> <?= $port['client'] ?><br><?php endif ?>
					<?php if($port['architect'] != 'N/A'): ?><span>Architect:</span> <?= $port['architect'] ?><br><?php endif ?> 
					<?php if($port['contractor'] != 'N/A'): ?><span>Contractor:</span> <?= $port['contractor'] ?><br><?php endif ?> 
					<?php if($port['date'] != 'N/A'): ?><span>Date:</span> <?= $port['date'] ?><?php endif ?>  
				</p>
				<?php foreach($desc as $d): ?> 
				<p><?= $d ?></p>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>  
<script type="text/javascript">
	function ChangeImage(a) {
		document.getElementById("dispayImg").src = a;
	}	
</script>
<script type="text/javascript">
	function tabletFunct(){ 
		var windowW = window.innerWidth; 
		if(windowW <= 1105){ 
			var imgW = document.getElementById("dispayImg").offsetLeft; 
			var button = document.getElementById('prevBtn').offsetWidth - 7; 
			var paddingVal = imgW - button + 'px'; 
			document.getElementById('slider-container').style.marginLeft = paddingVal;
		}else{ 
			document.getElementById('slider-container').style.marginLeft = "";
		} 
	} 
	tabletFunct(); 
	window.addEventListener('resize', tabletFunct);
</script> 
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
	function padding(){ 
    	var img = document.getElementById('dispayImg'); 
		var padding = img.offsetLeft + ('px'); 
		document.getElementById('porttitle').style.marginLeft = padding; 
    }
    padding();
    window.onresize = padding;
</script>
<script type="text/javascript">
$(function(){ 
	console.log(<?= $imgC ?>);
	var img = document.getElementById('imgSize');
	var imgW = img.clientWidth; 
	var elemCount = <?= $imgC / 2?>; 
	var current = 1; 
	var elemWidth = imgW + 11.200; 
	var move = 0;  
	if(<?= $imgC ?> <= 3){ 
		$('.slider-btn').css('display','none');
	}
	$('.next').click(function(){
		if( current < elemCount){ 
			$('.slider .thumbs').toggleClass('move'); 
			move += elemWidth;  
			$('.slider .thumbs').css('transform', 'translateX(-'+move+'px)'); 
			current++;
		}else{ 
			move = 0; 
			current = 1;  
			$('.slider .thumbs').css('transform', 'translateX('+move+'px)');
		}
	}); 
	$('.prev').click(function(){
		if( current > 0){
			$('.slider .thumbs').toggleClass('move'); 
			move -= elemWidth; 
			current--;  
			$('.slider .thumbs').css('transform', 'translateX(-'+move+'px)');
		}
	});
});
</script> 