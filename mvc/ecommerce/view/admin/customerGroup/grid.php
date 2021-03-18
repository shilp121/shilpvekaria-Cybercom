<?php

$customerGroups = $this->getCustomerGroup();
echo "<pre>";
print_r($customerGroups);die();
?>
<br>
<a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('edit', null,null,true) ?>">Add Customer Group</a><br>
<table class="table table-hover table-responsive-sm">
<tr>
<th scope="col">GroupId</th>
<th scope="col">CustomerGroupName</th>
<th scope="col">Status</th>
<th scope="col">Created Date</th>
<th></th>
</tr>

<?php
foreach($customerGroups->getData() as $key => $customerGroup) {
?>
    
<tr>
<td scope="row"><?php echo $customerGroup->groupId; ?></td>
<td><?php echo $customerGroup->name; ?></td>
<?php if ($customerGroup->status == 1) {?>
    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
    <?php } else {?>
    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
<?php }?>

<td><?php echo $customerGroup->createdDate; ?></td>

<td> <a class="btn btn-warning" href="<?php echo $this->getUrl()->getUrl('edit',null,['id' => $customerGroup->groupId],true) ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete',null,['id' => $customerGroup->groupId],true) ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>                    
</tr>

<?php
	}
?>
</table>