<?php
$customer = $this->getCustomer();
// ,
?>
<br>
<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save');?>" method="POST">
	
    <?php echo $this->getTabContent();?>

</form>
