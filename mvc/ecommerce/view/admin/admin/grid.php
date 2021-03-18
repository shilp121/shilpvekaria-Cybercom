<?php

$admins = $this->getAdmin();

?>
<br>
<a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('edit', null,null,true) ?>">Add admin</a><br>
<table class="table table-hover table-responsive-sm">
<tr>
<th scope="col">Id</th>
<th scope="col">UserName</th>
<th scope="col">Status</th>
<th scope="col">Created Date</th>
<th scope="col">Updated Date</th>
<th></th>
</tr>

<?php
foreach($admins as $key => $admin) {
?>
    
<tr>
<td scope="row"><?php echo $admin->id; ?></td>
<td><?php echo $admin->username; ?></td>
<?php if ($admin->status == 1) {?>
    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
    <?php } else {?>
    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
<?php }?>

<td><?php echo $admin->createdDate; ?></td>
<td><?php echo $admin->updatedDate; ?></td>

<td> <a class="btn btn-warning" href="<?php echo $this->getUrl()->getUrl('edit',null,['id' => $admin->id],true) ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete',null,['id' => $admin->id],true) ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>                    
</tr>

<?php
	}
?>
</table>

