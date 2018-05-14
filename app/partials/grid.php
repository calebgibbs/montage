<?php   
$this -> layout('master',[
	'title'=>'Montage Interiors | '.$title, 
	'desc' => 'This is the generic description'
]);   

if($_GET['page'] == 'portfolios'){ 
	$results = array_reverse($results);
} 
?> 
<div class="body">
	<div id="grid-page-outer">
		<div id="search-heading" class="<?= $class ?>"><h2><?= $title ?></h2></div> 
		<?php if($_GET['page'] == 'portfolios'): ?>
		<div class="client-logos">
			<img src="img/portfolio/client_logos.png" alt="Our client's logos">
		</div>
		<?php endif ?>
		<div id="boxes">	 
			<?php if($_GET['page'] != 'portfolios'): ?>
				<form method="post"> 
				<?php endif ?>	
				<?php if( $results == 'No results' ): ?>  
					<?php if($class == 'search-title'): ?> 
						<h3 class="noResults">No results for '<?= $title ?>'</h3>
					<?php endif ?> 
					<?php if($class != 'search-title'): ?> 
						<h3 class="noResults">There are no products in this Category</h3>
					<?php endif ?>
				<?php endif ?> 
				<?php if( $results != 'No results' ): ?> 
					<?php if($_GET['page'] != 'portfolios'): ?>
						<?php foreach( $results as $result ): ?> 
							<?php if($result['supplier'] == 'montage'): ?>
								<?php if( $result['image_position'] == 1 ): ?>
									<?php if($_GET['page'] == 'portfolios'): ?>	
										<div class="box-outer port-link" href="index.php?page=portfolio&num=<?= $result['id'] ?>">
										<?php endif ?>	
										<?php if($_GET['page'] != 'portfolios'): ?>
											<div class="box-outer"> 
												<button class="a-f-b" name="addfav" value="<?= $result['id'] ?>">
													<?php 
													if (isset($_SESSION['favourites'])) {
														$current = $result['id'];
														$favourites = json_decode($_SESSION['favourites'], true);  
														if (in_array($current, $favourites)) {
															echo "&diams;";
														}else{ 
															echo "&loz;";
														}
													}else{ 
														$current = $result['id'];
														$favourites = json_decode($_COOKIE['favourites'], true);  
														if (!empty($favourites)) {
															if (in_array($current, $favourites)) {
																echo "&diams;";
															}else{ 
																echo "&loz;";
															}
														}else{ 
															echo "&loz;";	
														}	
													}
													?>
												</button>
											<?php endif ?>
											<?php if($_GET['page'] != 'portfolios'): ?>
												<div class="box-inner" href="index.php?page=product&productnum=<?= $result['id'] ?>">
												<?php endif ?>	 
												<?php if($_GET['page'] == 'portfolios'): ?>
													<div class="box-inner-port">
													<?php endif ?>
													<div class="box-img">
														<?php if($_GET['page'] != 'portfolios'): ?>
															<img src="img/products/large/<?= $result['image'] ?>"> 
														<?php endif ?> 
														<?php if($_GET['page'] == 'portfolios'): ?>
															<img src="img/portfolio/large/<?= $result['image'] ?>"> 
														<?php endif ?>
													</div> 
													<div class="box-title">
														<h5><?= $result['score_title'] ?></h5>
													</div>
												</div>
											</div>		
										<?php endif ?> 
									<?php endif ?>
								<?php endforeach ?>
								<?php foreach( $results as $result ): ?> 
									<?php if($result['supplier'] != 'montage'): ?>
										<?php if( $result['image_position'] == 1 ): ?>
											<?php if($_GET['page'] == 'portfolios'): ?>	
												<div class="box-outer port-link" href="index.php?page=portfolio&num=<?= $result['id'] ?>">
												<?php endif ?>	
												<?php if($_GET['page'] != 'portfolios'): ?>
													<div class="box-outer"> 
														<button class="a-f-b" name="addfav" value="<?= $result['id'] ?>">
															<?php 
															if (isset($_SESSION['favourites'])) {
																$current = $result['id'];
																$favourites = json_decode($_SESSION['favourites'], true);  
																if (in_array($current, $favourites)) {
																	echo "&diams;";
																}else{ 
																	echo "&loz;";
																}
															}else{ 
																$current = $result['id'];
																$favourites = json_decode($_COOKIE['favourites'], true);  
																if (!empty($favourites)) {
																	if (in_array($current, $favourites)) {
																		echo "&diams;";
																	}else{ 
																		echo "&loz;";
																	}
																}else{ 
																	echo "&loz;";	
																}	
															}
															?>
														</button>
													<?php endif ?>
													<?php if($_GET['page'] != 'portfolios'): ?>
														<div class="box-inner" href="index.php?page=product&productnum=<?= $result['id'] ?>">
														<?php endif ?>	 
														<?php if($_GET['page'] == 'portfolios'): ?>
															<div class="box-inner-port">
															<?php endif ?>
															<div class="box-img">
																<?php if($_GET['page'] != 'portfolios'): ?>
																	<img src="img/products/large/<?= $result['image'] ?>"> 
																<?php endif ?> 
																<?php if($_GET['page'] == 'portfolios'): ?>
																	<img src="img/portfolio/large/<?= $result['image'] ?>"> 
																<?php endif ?>
															</div> 
															<div class="box-title">
																<h5><?= $result['score_title'] ?></h5>
															</div>
														</div>
													</div>		
												<?php endif ?> 
											<?php endif ?>
										<?php endforeach ?> 
									<?php endif ?>
								<?php endif ?> 
								<?php if($_GET['page'] == 'portfolios'): ?>  
									<?php foreach( $results as $result ): ?> 
										<?php if( $result['image_position'] == 1 ): ?>
											<?php if($_GET['page'] == 'portfolios'): ?>	
												<div class="box-outer port-link" href="index.php?page=portfolio&num=<?= $result['id'] ?>">
												<?php endif ?>	
												<?php if($_GET['page'] != 'portfolios'): ?>
													<div class="box-outer"> 
														<button class="a-f-b" name="addfav" value="<?= $result['id'] ?>">
															<?php 
															if (isset($_SESSION['favourites'])) {
																$current = $result['id'];
																$favourites = json_decode($_SESSION['favourites'], true);  
																if (in_array($current, $favourites)) {
																	echo "&diams;";
																}else{ 
																	echo "&loz;";
																}
															}else{ 
																$current = $result['id'];
																$favourites = json_decode($_COOKIE['favourites'], true);  
																if (!empty($favourites)) {
																	if (in_array($current, $favourites)) {
																		echo "&diams;";
																	}else{ 
																		echo "&loz;";
																	}
																}else{ 
																	echo "&loz;";	
																}	
															}
															?>
														</button>
													<?php endif ?>
													<?php if($_GET['page'] != 'portfolios'): ?>
														<div class="box-inner" href="index.php?page=product&productnum=<?= $result['id'] ?>">
														<?php endif ?>	 
														<?php if($_GET['page'] == 'portfolios'): ?>
															<div class="box-inner-port">
															<?php endif ?>
															<div class="box-img">
																<?php if($_GET['page'] != 'portfolios'): ?>
																	<img src="img/products/large/<?= $result['image'] ?>"> 
																<?php endif ?> 
																<?php if($_GET['page'] == 'portfolios'): ?>
																	<img src="img/portfolio/large/<?= $result['image'] ?>"> 
																<?php endif ?>
															</div> 
															<div class="box-title">
																<h5><?= $result['score_title'] ?></h5>
															</div>
														</div>
													</div>		
												<?php endif ?> 
											<?php endforeach ?>
										<?php endif ?>
									</div> 
									<?php if($_GET['page'] != 'portfolios'): ?>
									</form> 
								<?php endif ?>
							</div>
						</div> 