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
<?php if($_SESSION['account_type'] == 'admin'): ?><a href="index.php?page=edit_port&port=<?= $_GET['num'] ?>">Edit</a><?php endif ?> 
	<div id="product-theme">
		<div id="page-padding">
			<h1 id="porttitle" class="port-title"><?= $port['title'] ?></h1>
			<div id="left-col"> 
				<div class="product-images">
					<div class="large-img">
						<?php foreach( $Allimages as $image ): ?>
							<?php if( $image['image_position'] == 1 ): ?> 
								<img id="dispayImg" src="img/portfolio/large/<?= $image['image'] ?>"> 
							<?php endif ?>
						<?php endforeach ?>
					</div>
					<div class="slider-container">
						<button class="prev slider-btn" alt="Previous"><</button> 
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
				</div>
			</div> 
			<div id="right-col">
				<p>
					<?php if($port['client'] != 'N/A'): ?>Client: <?= $port['client'] ?><br><?php endif ?>
					<?php if($port['architect'] != 'N/A'): ?>Architect: <?= $port['architect'] ?><br><?php endif ?> 
					<?php if($port['contractor'] != 'N/A'): ?>Contractor: <?= $port['contractor'] ?><br><?php endif ?> 
					<?php if($port['date'] != 'N/A'): ?>Date: <?= $port['date'] ?><?php endif ?>  
				</p>
				<p><?= $port['description'] ?></p>
			</div>
		</div>
	</div>
</div>  
<script type="text/javascript">
	function ChangeImage(a) {
		document.getElementById("dispayImg").src = a;
	}	
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
		var img = document.getElementById('imgSize');
		var imgW = img.clientWidth; 
		var elemCount = <?= $imgC - 2?>; 
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