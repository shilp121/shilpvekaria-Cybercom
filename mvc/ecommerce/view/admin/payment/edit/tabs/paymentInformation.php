<?php 

$payment = $this->getPayment();
$status = $this->getOption();

?>
<header >Payment Details</header><br><br>

<table class="table">
    <tr>
    <td><label for="name">Name</label></td>
    <td><input type="text" id="name" name="payment[name]" value="<?php echo $payment->name ?>"></td>
    </tr>
    <tr>
    <td><label>Code</label></td>
    <td><input type="number" name="payment[code]" id="price" value="<?php echo $payment->code ?>"></td>
    </tr>
    <tr>
    <td><label >Description</label></td>
    <td><input type="text" name="payment[description]" id="description" value="<?php echo $payment->description ?>"></td>
    </tr>
    <tr>
        <td><label for ="Status">Status</label></td>
        <td>
            <select name="payment[status]">
                <?php
                foreach($status as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($payment->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                <?php
            } ?>
            </select>
        </td>
     </tr>
    <?php 
    if(!$payment->id){
        $value = 'save';
    }else{$value = 'update';}?>
    <tr>
        <td><input class="btn btn-success" type="submit" value="<?php echo $value;?>"></td>
    </tr>
</table>