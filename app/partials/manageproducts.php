<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Products', 
	'desc' => 'montage interiors website staff log in' 
]);  
$prevPage = $_SERVER['REQUEST_URI']; 
?> 
<div class="body">
	<h1>All Products</h1>
	<div class="inner"> 
		<table>
			<tr>
				<th>Product</th> 
				<th>Description</th>
				<th>Category</th>
			</tr>  
			<?php $counter = 0; ?>
			<?php foreach($allProducts as $product):  ?> 
				<tr class="product-data" href="index.php?page=product&productnum=<?= $product['id'] ?>">
					<td class="prod-table"><?= $product['title'] ?></td> 
					<td><span><?= substr($product['description'], 0, 70) ?>...</span></td>
					<td class="prod-table"><?= $product['category'] ?></td>
				</tr>  
				<?php $counter++; ?>
			<?php endforeach ?>
		</table>  
		<span>Total products:  <?= $counter ?></span>
	</div>
</div>