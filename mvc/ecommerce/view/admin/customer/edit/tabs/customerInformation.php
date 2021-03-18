<?php 

$customer = $this->getCustomer();
// echo "<pre>";
// print_r($customer);die();
$status =$this->getOption();
//$customerType = ['1' => 'Retail', '2' => 'Wholesale', '3' => 'select'];
$customerTypes = $this->getCustomerTypes();

?>

<h2 >Add/Edit</h2>

 <table class="table">
   <tr>
       <td><label>Customer Type</label></td>
            <td>
                <select name="customer[groupId]">
                    <option value="">Select</option>
                    <?php foreach ($customerTypes->getData() as $customerType):?>
                    <option value="<?php $customerType->name ?>"><?php echo $customerType->name ?></option>
                    <?php endforeach; ?>
            </select>
            </td>
        </tr> 
    <tr>    

    <td><label for="fName">FirstName</label></td>
    <td><input type="text"  name="customer[firstName]" value="<?php echo $customer->firstName ?>"></td>
    </tr>
    <tr>
    <td><label for="lName">LastName</label></td>
    <td><input type="text" name="customer[lastName]"  value="<?php echo $customer->lastName ?>"></td>
    </tr>
    <tr>
    <td><label>Email</label></td>
    <td><input type="email" name="customer[email]"  value="<?php echo $customer->email ?>"></td>
    </tr>
    <tr>
    <td><label>Password</label></td>
    <td><input type="password" name="customer[password]" value="<?php echo $customer->password ?>"></td>
    </tr>

    <tr>
    <td><label>Mobile</label></td>
    <td><input type="number" name="customer[mobile]" value="<?php echo $customer->mobile ?>"> </td>
    <tr>
        <td><label for ="Status">Status</label></td>
        <td>
            <select name="customer[status]">
                <?php
                foreach($status as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($customer->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                <?php
            } ?>
            </select>
        </td>
     </tr>
     <tr>
        <?php 
        if(!$customer->id){
            $value = 'save';
        }else{$value = 'update';}?>

            <td><input class="btn btn-success" type="submit" value="<?php echo $value;?>"></td>
    </tr>
    </table>