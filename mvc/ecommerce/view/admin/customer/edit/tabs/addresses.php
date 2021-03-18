<?php 
$billing = $this->getBillingAddress();
$shipping = $this->getShippingAddress();

?>

<table class="table">
		<strong>Billing Address</strong>
		<tr>
			<td><label>Address</label></td>
			<td><input type="text" name="billing[address]" value="<?php echo $billing->address; ?>" ></td>
		</tr>
		<tr>
			<td><label>City</label></td>
			<td><input type="text" name="billing[city]" value="<?php echo $billing->city; ?>"></td>
		</tr>
		<tr>
			<td><label>State</label></td>
			<td><input type="text" name="billing[state]" value="<?php echo $billing->state; ?>"></td>
		</tr>
		<tr>
			<td><label>Zipcode</label></td>
			<td><input type="number" name="billing[zipcode]" value="<?php echo $billing->zipcode; ?>"></td>
		</tr>
		<tr>
			<td><label>Country</label></td>
			<td><input type="text" name="billing[country]" value="<?php echo $billing->country; ?>"></td>
		</tr>
		
</table>
<br><br>
<table class="table">
		<Strong>Shipping Address</Strong>
		<tr>
			<td><label>Address</label></td>
			<td><input type="text" name="shipping[address]" value="<?php echo $shipping->address; ?>" ></td>
		</tr>
		<tr>
			<td><label>City</label></td>
			<td><input type="text" name="shipping[city]" value="<?php echo $shipping->city; ?>"></td>
		</tr>
		<tr>
			<td><label>State</label></td>
			<td><input type="text" name="shipping[state]" value="<?php echo $shipping->state; ?>"></td>
		</tr>
		<tr>
			<td><label>Zipcode</label></td>
			<td><input type="number" name="shipping[zipcode]" value="<?php echo $shipping->zipcode; ?>"></td>
		</tr>
		<tr>
			<td><label>Country</label></td>
			<td><input type="text" name="shipping[country]" value="<?php echo $shipping->country; ?>"></td>
		</tr>
		
	<?php 
	    if(!$billing->id){
	        $value = 'save';
	    }else{$value = 'update';}?>
	    <tr>
	        <td><input class="btn btn-success" type="submit" value="<?php echo $value;?>"></td>
	    </tr>
</table>
