<?php 



$shipping = $this->getShipping();
$status =$this->getOption();
?>

<table class="table">
    <tr>
    <td><label for="name">Name</label></td>
    <td><input type="text" id="name" name="shipping[name]" value="<?php echo $shipping->name ?>"></td>
    </tr>
    <tr>
    <td><label>Code</label></td>
    <td><input type="number" name="shipping[code]" id="price" value="<?php echo $shipping->code ?>"></td>
    </tr>
    <tr>
    <td><label>Amount</label></td>
    <td><input type="text" name="shipping[amount]" id="discount" value="<?php echo $shipping->amount ?>"></td>
    </tr>
    <tr>
    <td><label >Description</label></td>
    <td><input type="text" name="shipping[description]" id="description" value="<?php echo $shipping->description ?>"></td>
    </tr>
      <tr>
        <td><label for ="Status">Status</label></td>
        <td>
            <select name="shipping[status]">
                <?php
                foreach($status as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($shipping->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                <?php
            } ?>
            </select>
        </td>
     </tr>
     <tr>
    <?php 
    if(!$shipping->id){
        $value = 'save';
    }else{$value = 'update';}?>
    <tr>
        <td><input class="btn btn-success" type="submit" value="<?php echo $value;?>"></td>
    </tr>
</table>