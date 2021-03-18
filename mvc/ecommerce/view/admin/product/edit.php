<?php
$product = $this->getProduct();
?>

<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save','Product',['id'=>$product->id]);  ?>" enctype ="multipart/form-data" method="POST">
    <?php echo $this->getTabContent();?>
    
</form>
 