<?php

$shipments = $this->getshipping();

?>
<br>
<a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('edit', null,null,true) ?>">Add shipping</a><br>
<table class="table table-hover table-responsive-sm">
<tr>
<th scope="col">Id</th>
<th scope="col">Name</th>
<th scope="col">Code</th>
<th scope="col">Amount</th>
<th scope="col">Description</th>
<th scope="col">Status</th>
<th scope="col">Created Date</th>
<th scope="col">Updated Date</th>
<th></th>
</tr>
<?php
foreach($shipments->getData() as $key => $shipping) {
    ?>
    
<tr>
<td scope="row"><?php echo $shipping->id; ?></td>
<td><?php echo $shipping->name; ?></td>
<td><?php echo $shipping->code; ?></td>
<td><?php echo $shipping->amount; ?></td>
<td><?php echo $shipping->description; ?></td>
<?php if ($shipping->status == 1) {?>
    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
    <?php } else {?>
    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
<?php }?>
<td><?php echo $shipping->createdDate; ?></td>
<td><?php echo $shipping->updatedDate; ?></td>
<td> <a class="btn btn-warning" href="<?php echo $this->getUrl()->getUrl('edit',null,['id' => $shipping->id],true) ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete',null,['id' => $shipping->id],true) ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>                    
</tr>
<?php

}
?>
</table>

