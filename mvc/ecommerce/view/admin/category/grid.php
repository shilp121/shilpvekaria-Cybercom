<?php
$categorys = $this->getCategory();

?>

<br>
<a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('edit', null,null,true) ?>">Add category</a><br>
<table class="table table-hover table-responsive-sm">
<tr>
<th scope="col">Id</th>
<th scope="col">CategoryName</th>
<th scope="col">ParentId</th>
<td scope="col">PathId</td>
<th scope="col">Descritpion</th>
<th scope="col">Status</th>
<th scope="col">CreatedDate</th>
<th scope="col">UpdatedDate</th>
<th></th>
<th></th>

</tr>
<?php if(!$categorys): ?>
	<tr>
		<td>Record Not Found</td>
	</tr>

<?php else: ?>

	<?php foreach($categorys->getData() as $key => $category) {
	?>
	    
	<tr>
	<td scope="row"><?php echo $category->id; ?></td>
	<td><?php echo $this->getName($category);  ?></td>
	<td><?php echo $category->parentId; ?></td>
	<td><?php echo $category->pathId;?></td>
	<td><?php echo $category->categoryDescription; ?></td>
	<?php if ($category->status == 1) {?>
	    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
	    <?php } else {?>
	    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
	<?php }?>
	<td><?php echo $category->createdDate; ?></td>
	<td><?php echo $category->updatedDate; ?></td>
	<td> <a class="btn btn-warning" href="<?php echo $this->getUrl()->getUrl('edit',null,['id' => $category->id],true) ?>">
	                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
	                    <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete',null,['id' => $category->id],true) ?>">
	                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
	                    </a></td>                    
	</tr>
	<?php

	}
	?>
<?php endif; ?>
</table>
