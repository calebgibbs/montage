<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Product', 
	'desc' => 'montage interiors products' 
]);   
?>
<div class="body"> 
	<div id="product-theme" class="chair">
		<div id="page-padding">
			<div id="left-col">
				<div class="product-images">
					<div class="large-img">
						<img id="dispayImg" src="img/products/large/img1.png">
					</div> 
					<div class="img-thumb">
						<ol> 
							<li><img class="img-thumb" src="img/products/thumbnail/img1.png" onClick="ChangeImage('img/products/large/img1.png')"></li>
							<li><img class="img-thumb" src="img/products/thumbnail/img2.png" onClick="ChangeImage('img/products/large/img2.png')"></li> 
							<li><img class="img-thumb" src="img/products/thumbnail/img3.png" onClick="ChangeImage('img/products/large/img3.png')"></li>
						</ol>
					</div>
				</div> 
			</div> 
			<div id="right-col">
				<div class="product-text">
					<div class="title-text">
						<h1>Chorus</h1> 
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <div class="view-more"></div></p>
						</div> 
						<div class="prod-features">
							<h2>Features</h2> 
							<ul class="product-list">
								<li>1</li>
								<li>2</li>
								<li>3</li>
								<li>4</li>
								<li>5</li>
							</ul>
						</div>	 
						<div class="prod-options">
							<h2>Options</h2> 
							<ul class="product-list">
								<li>1</li>
								<li>2</li>
								<li>3</li>
								<li>4</li>
								<li>5</li>
							</ul>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>  
<script type="text/javascript">
	function ChangeImage(a) {
    	document.getElementById("dispayImg").src = a;
    }	
</script>