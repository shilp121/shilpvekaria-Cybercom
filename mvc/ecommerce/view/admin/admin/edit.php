<?php 
$admin = $this->getAdmin();
$status =$this->getOption();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<table class="table">
	<form action ="<?php echo $this->getUrl()->getUrl('save',null,['id'=>$admin->id],true) ?>" method="POST">
		<tr>
			<td><label>Username</label></td>
			<td><input type="text" name="admin[username]" value="<?php echo $admin->username; ?>"></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><input type="password" name="admin[password]"></td>
		</tr>
		<tr>
			<td><label>Status</label></td>
			<td>
            <select name="admin[status]">
                <?php
                foreach($status as $key => $value) {?>
                <option value="<?php echo $key ?>" <?php if ($admin->status == $key) {?> selected <?php }?>>
                    <?php echo $value ?></option>
                <?php
            } ?>
            </select>
        </td>
		</tr>
		<tr>
        <?php 
        if(!$admin->id){
            $value = 'save';
        }else{$value = 'update';}?>

            <td><input class="btn btn-success" type="submit" value="<?php echo $value;?>"></td>
    </tr>
	</form>
</table>