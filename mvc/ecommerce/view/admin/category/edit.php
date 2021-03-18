<?php 
$category = $this->getCategory();
?>

<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save',null,['id'=>$category->id],true);  ?>" method="POST">
        <?php echo $this->getTabContent();?>

        

</form>

