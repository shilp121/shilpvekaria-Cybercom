<?php
$imageData = $this->getProductMedia();
//print_r($imageData);die();
?>

<input type="button" class="btn btn-primary" onclick="submitForm(this)" value="Update"> 
<input type="button" class="btn btn-warning" onclick="removeForm(this)" value="Remove">
<br><br>
<table border="1px" width="100%" class="table">
	<thead class="thead-dark">
		<th>Image</th>
		<th>Label</th>
		<th>Small</th>
		<th>Thumb</th>
		<th>Base</th>
		<th>Gallery</th>
		<th>Remove</th>
	</thead>

	<tbody>
		<?php if (!$imageData): ?>
	           <label>No Record Found</label>	       
	    <?php else: ?>
		<?php foreach($imageData->getData() as $key=> $value):?>
			<?php  //print_r($value->image); ?>
		<tr>
			<td><img src= "../ecommerce/Controller/Admin/Product/Images/Products/<?php echo $value->image ?>" alt="Image Not Available" width = "100px" height = "100px" /></td>
			<td><input type="text" name="image[<?php echo $value->imageId; ?>][label]" value ="<?php echo $value->label; ?>">
			</td>
			<th><input type="radio" name="image[small]" value="<?php echo $value->imageId ?>"></th>
            <th><input type="radio" name="image[thumb]" value="<?php echo $value->imageId ?>"></th>
            <th><input type="radio" name="image[base]" value="<?php echo $value->imageId ?>"></th>
			<td>
				<input type="checkbox" name="image[<?php echo $value->imageId; ?>][gallery]" value ="<?php echo $value->imageId; ?>">
			</td>
			<td>
				<input type="checkbox" name="imageIds[<?php echo $value->imageId; ?>]">	
			</td>
		</tr>
		<?php endforeach; ?>

		<?php endif;?>
	</tbody>
</table>
<table>

<tr>
	<td>
		<label>Browse FIle</label>
		<input type="file" class="btn btn-light" name="image" >
	</td>
	<td>
		<label>Upload File</label>
		<input type="button" class="btn btn-light" name="uploadImage" value="uploadImage" onclick="submitForm(this)">
	</td>
</tr>	
</table>

<script>
function submitForm(button){
	var form = $(button).closest('form');
	form.attr('action', 
    '<?php echo $this->getUrl()->getUrl('save', 'Product_Media', []); ?>');
    form.submit();
}


function removeForm(button){
	var form = $(button).closest('form');
	console.log(form);
	form.attr('action', 
    '<?php echo $this->getUrl()->getUrl('delete', 'Product_Media', []); ?>');
    form.submit();
}
</script>