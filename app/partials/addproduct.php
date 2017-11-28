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
		<form enctype="multipart/form-data">
			<div class="form-input">
				<input type="text" name="title" placeholder="Product Name">
			</div>
			<div class="form-input">
				<input type="text" name="brand" placeholder="Product brand">
			</div>
			<div class="form-input">
				<textarea name="desc" placeholder="Product Description"></textarea>
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
			<div class="form-input">
				<input type="text" name="bp1" placeholder="Description bullet point 1">
			</div>
			<div class="form-input">
				<input type="text" name="bp2" placeholder="Description bullet point 2">
			</div>
			<div class="form-input">
				<input type="text" name="bp3" placeholder="Description bullet point 3">
			</div>
			<div class="form-input">
				<input type="text" name="bp4" placeholder="Description bullet point 4">
			</div>
			<div class="form-input">
				<input type="text" name="bp5" placeholder="Description bullet point 5">
			</div>
			<div class="form-input">
				<input type="text" name="bp6" placeholder="Description bullet point 6">
			</div>  
			<div class="img-input">
				<label>Main image</label>
				<input type="file" name="pic" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 1</label>
				<input type="file" name="pic" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 2</label>
				<input type="file" name="pic" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 3</label>
				<input type="file" name="pic" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 4</label>
				<input type="file" name="pic" accept="image/*">
			</div>
			<div class="img-input">
				<label>Image 5</label>
				<input type="file" name="pic" accept="image/*">
			</div>
		</form>
	</div>
</div> 