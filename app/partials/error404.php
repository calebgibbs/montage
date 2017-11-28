<?php 
	$this -> layout('master',[
		'title'=>'Montage Interiors | Page not found', 
		'desc' => 'montage interiors page not found' 
	]);   
	$prevPage = $_SERVER['QUERY_STRING'];
?>
<div class="body"> 
	<div id="login-outer" style="text-align: center">
		<h1>Oops!<br>Something went wrong</h1> 
		<h1><br>Page not found</h1>	 
	</div>
</div>