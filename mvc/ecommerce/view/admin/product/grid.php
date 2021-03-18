<?php

$products = $this->getProduct();

?>
<br>
<a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('edit', null,null,true) ?>">Add Product</a><br>
<table class="table table-hover table-responsive-sm">
<tr>
<th scope="col">Id</th>
<th scope="col">Name</th>
<th scope="col">Sku</th>
<th scope="col">Price</th>
<th scope="col">Discount</th>
<th scope="col">Quantity</th>
<th scope="col">Description</th>
<th scope="col">Status</th>
<th scope="col">Created Date</th>
<th scope="col">Updated Date</th>
<th></th>
</tr>
<?php
foreach($products->getData() as $key => $product) {
    ?>
    
<tr>
<td scope="row"><?php echo $product->id; ?></td>
<td><?php echo $product->name; ?></td>
<td><?php echo $product->sku; ?></td>
<td><?php echo $product->price; ?></td>
<td><?php echo $product->discount; ?></td>
<td><?php echo $product->quantity; ?></td>
<td><?php echo $product->description; ?></td>
<?php if ($product->status == 1) {?>
    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
    <?php } else {?>
    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
<?php }?>
<td><?php echo $product->createdDate; ?></td>
<td><?php echo $product->updatedDate; ?></td>
<td> <a class="btn btn-warning" href="<?php echo $this->getUrl()->getUrl('edit',null,['id' => $product->id],true) ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete',null,['id' => $product->id],true) ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a>
</td>                    
</tr>
<?php

}
?>
</table>
