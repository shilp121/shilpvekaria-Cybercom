<?php 

$customerGroup = $this->getCustomerGroup();
$status =$this->getOption();
?>

<table class="table">
		<tr>
			<td><label >Customer  Type</label></td>
			<td>
				<input type="text" name="customerGroup[name]" value="<?php echo $customerGroup->name ?>" >
			</td>
		</tr>
		<tr>
	        <td><label for ="Status">Status</label></td>
	        <td>
	            <select name="customerGroup[status]">
	                <?php
	                foreach($status as $key => $value) {?>
	                <option value="<?php echo $key ?>" <?php if ($customerGroup->status == $key) {?> selected <?php }?>>
	                    <?php echo $value ?></option>
	                <?php
	            } ?>
	            </select>
	        </td>
     	</tr>
	    <?php 
	    if(!$customerGroup->groupId){
	        $value = 'save';
	    }else{$value = 'update';}?>
	    <tr>
	        <td><input class="btn btn-success" type="submit" value="<?php echo $value;?>"></td>
	    </tr>
</table>