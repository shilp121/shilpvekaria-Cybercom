<?php

$customers = $this->getCustomer();

?>
<br>

<a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('edit', null,null,true) ?>">Add Customer</a><br>
<table class="table table-hover table-responsive-sm">
<tr>
<th scope="col">Id</th>
<th scope="col">Firstname</th>
<th scope="col">Lastname</th>
<th scope="col">Email</th>
<th scope="col">Mobile</th>
<th scope="col">Status</th>
<th scope="col">Created Date</th>
<th scope="col">Updated Date</th>
<th></th>
</tr>

<?php
foreach($customers->getData() as $key => $customer) {
?>
    
<tr>
<td scope="row"><?php echo $customer->id; ?></td>
<td><?php echo $customer->firstName; ?></td>
<td><?php echo $customer->lastName; ?></td>
<td><?php echo $customer->email; ?></td>
<td><?php echo $customer->mobile; ?></td>

<?php if ($customer->status == 1) {?>
    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
    <?php } else {?>
    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
<?php }?>

<td><?php echo $customer->createdDate; ?></td>
<td><?php echo $customer->updatedDate; ?></td>

<td> <a class="btn btn-warning" href="<?php echo $this->getUrl()->getUrl('edit',null,['id' => $customer->id],true) ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete',null,['id' => $customer->id],true) ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>                    
</tr>

<?php
	}
?>
</table>
