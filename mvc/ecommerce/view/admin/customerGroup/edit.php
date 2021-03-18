<?php

$customerGroup = $this->getCustomerGroup();

?>
<br>
<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save',null,['id'=>$customerGroup->groupId],true);  ?>" method="POST">
	
    <?php echo $this->getTabContent();?>

</form>
