<?php 
 

$product = $this->getProduct();
$status =$this->getOption();

?>

<table class="table">
    <tr>
    <tr>
    <td><label for="name">Sku</label></td>
    <td><input type="text" id="name" name="product[sku]" value="<?php echo $product->sku ?>"></td>
    </tr>

    <td><label for="name">Name</label></td>
    <td><input type="text" id="name" name="product[name]" value="<?php echo $product->name ?>"></td>
    </tr>
    <tr>
    <td><label for="price">Price</label></td>
    <td><input type="text" name="product[price]" id="price" value="<?php echo $product->price ?>"></td>
    </tr>
    <tr>
    <td><label for="discount">Discount</label></td>
    <td><input type="text" name="product[discount]" id="discount" value="<?php echo $product->discount ?>"></td>
    </tr>
    <tr>
    <td><label for="quantity">Quantity</label></td>
    <td><input type="number" name="product[quantity]" id="quantity" value="<?php echo $product->quantity ?>"></td>
    </tr>
    <tr>
    <td><label for="description">Description</label></td>
    <td><input type="text" name="product[description]" id="description" value="<?php echo $product->description ?>"></td>
    </tr>
    <tr>
        <td><label for ="Status">Status</label></td>
        <td>
            <select name="product[status]">
                <?php
                foreach($status as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($product->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                <?php
            } ?>
            </select>
        </td>
     </tr>
    <?php 
    if(!$product->id){
        $value = 'save';
    }else{$value = 'update';}?>

        <td><input class="btn btn-success" type="submit" value="<?php echo $value;?>"></td>
    </tr>
    
</table>