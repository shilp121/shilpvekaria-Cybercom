<?php require_once 'view/header.php' ?>

<br>
<form class="form-group" action="http://localhost/cybercomproject/ecommerce/Mage.php?c=customer&a=save" method="POST">
    <table class="table">
    <tr>
    <td><label>FirstName</label></td>
    <td><input type="text" id="name" name="customer[firstName]" ></td>
    </tr>
    <tr>
    <td><label>LastName</label></td>
    <td><input type="text" name="customer[lastName]" id="price" ></td>
    </tr>
    <tr>
    <td><label>Email</label></td>
    <td><input type="email" name="customer[email]" id="discount" ></td>
    </tr>
    <tr>
    <td><label>Password</label></td>
    <td><input type="password" name="$customer[password]" id="quantity"></td>
    </tr>

    <tr>
    <td><label>Mobile</label></td>
    <td><input type="number" name="customer[mobile]" id="description"></td>
    </tr>
        <td><input class="btn btn-success" type="submit" value="Save"></td>
    </tr>
    
    </table>
</form>
<?php require_once 'view/footer.php' ?>