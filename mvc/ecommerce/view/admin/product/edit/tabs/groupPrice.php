<?php

//$product = $this->getProduct();
$customerGroupData = $this->getCustomerGroups();
?>
<input type="button" class="btn btn-primary"  onclick="submitForm(this)" value="Update"> 

<table border="1px" width="100%">
	<tr>
		<td>Group Id</td>
		<td>Group Name</td>
		<td>Price</td>
		<td>Group Price</td>
	</tr>

	<?php if(!$customerGroupData): ?>
		<label>No Data Found</label>
	<?php endif; ?>

		<?php foreach($customerGroupData->getData() as $key => $customerGroup): ?>
		<tr>
			<?php  $rowStatus = ($customerGroup->entityId) ? 'exist':'new'; ?>
			<td><?php echo $customerGroup->groupId ?></td>
			<td><?php echo $customerGroup->name ?></td>
			<td><?php echo $customerGroup->price ?></td>
			<td><input type="text" name="groupPrice[<?php echo $rowStatus; ?>][<?php echo $customerGroup->groupId; ?>]" value = "<?php echo $customerGroup->groupPrice; ?>"></td>
		</tr>
		<?php endforeach; ?>
</table>



<script>
	function submitForm(button){
	var form = $(button).closest('form');
	form.attr('action', 
    '<?php echo $this->getUrl()->getUrl('save', 'Product_GroupPrice', []); ?>');
    form.submit();
}
</script>