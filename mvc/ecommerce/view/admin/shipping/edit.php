<?php
$shipping = $this->getShipping();
?>

<header >Shipping Details</header><br><br>
<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save',null,['id'=>$shipping->id],true);  ?>" method="POST">
    <?php echo $this->getTabContent();?>
    
</form>


