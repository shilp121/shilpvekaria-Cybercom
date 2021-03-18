<?php
$payment = $this->getPayment();
?>

<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save',null,['id'=>$payment->id],true);  ?>" method="POST">
	
    <?php echo $this->getTabContent();?>
    
</form>


