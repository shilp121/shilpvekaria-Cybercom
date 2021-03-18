<?php

$payments = $this->getPayment();

?>
<br>
<a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('edit', null,null,true) ?>">Add payment</a><br>
<table class="table table-hover table-responsive-sm">
<tr>
<th scope="col">Id</th>
<th scope="col">Name</th>
<th scope="col">Code</th>
<th scope="col">Description</th>
<th scope="col">Status</th>
<th scope="col">Created Date</th>
<th scope="col">Updated Date</th>
<th></th>
</tr>
<?php
foreach($payments->getData() as $key => $payment) {
    ?>
    
<tr>
<td scope="row"><?php echo $payment->id; ?></td>
<td><?php echo $payment->name; ?></td>
<td><?php echo $payment->code; ?></td>
<td><?php echo $payment->description; ?></td>
<?php if ($payment->status == 1) {?>
    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
    <?php } else {?>
    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
<?php }?>
<td><?php echo $payment->createdDate; ?></td>
<td><?php echo $payment->updatedDate; ?></td>
<td> <a class="btn btn-warning" href="<?php echo $this->getUrl()->getUrl('edit',null,['id' => $payment->id],true) ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete',null,['id' => $payment->id],true) ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>                    
</tr>
<?php

}
?>
</table>

