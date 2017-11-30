<?php 
$this -> layout('master',[
	'title'=>'Montage Interiors | Change Password', 
	'desc' => 'montage interiors website staff log in' 
]);  
$prevPage = $_SERVER['REQUEST_URI']; 
?>
<div class="body">  
	<div id="addp"> 
		<h1>Add a new product</h1>
		<form enctype="multipart/form-data" method="post" action="index.php?page=add_product">
			<div class="form-input">
				<input type="text" class="inputText" name="title" required/>
 				<span class="floating-label">Product Name</span>
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="brand" required/>
 				<span class="floating-label">Product Brand</span>
			</div>
			<!-- <div>
				<textarea name="desc" class="inputText"></textarea> 
				<span class="floating-label"  required>Product Brand</span>
			</div> --> 
			<div class="form-input">
				<input type="text" class="inputText" name="bp1" required/>
 				<span class="floating-label">Description bullet point 1</span>
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="bp2" required/>
 				<span class="floating-label">Description bullet point 2</span>
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="bp3" required/>
 				<span class="floating-label">Description bullet point 3</span>
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="bp4" required/>
 				<span class="floating-label">Description bullet point 4</span>
			</div>
			<div class="form-input">
				<input type="text" class="inputText" name="bp5" required/>
 				<span class="floating-label">Description bullet point 5</span>
			</div>  
			<div class="form-input"> 
				<select>
					<option>Select Category</option>
					<option value="workstation">Workstation</option> 
					<option value="storage">Storage</option>
					<option value="tech_accesories">Tech and Accesories</option> 
					<option value="table">Table</option> 
					<option value="screen">Screen</option> 
					<option value="agile_furniture">Agile furniture</option>
					<option value="chair">Chair</option> 
					<option value="joinery_custom">Joinery and Custom</option> 
					<option value="other">Other</option>
				</select> 
			</div>
			<div class="img-input">
				<label>Main image</label>
				<input type="file" name="1" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 1</label>
				<input type="file" name="2" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 2</label>
				<input type="file" name="3" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 3</label>
				<input type="file" name="4" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 4</label>
				<input type="file" name="5" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 5</label>
				<input type="file" name="6" accept="image/*">
			</div> 
			<div class="form-button">
				<button name="addProduct">Add Product</button>
			</div>
		</form>
	</div>
</div> 