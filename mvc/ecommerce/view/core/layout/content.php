<?php

$children = $this->getChildren();
foreach ($children as $child) {
	echo $child->toHtml();
}

?>

<!-- <div  id= "customerGrid">
</div>

	<script type="text/javascript">
		var object = new Base();
		object.setParams({
			name : 'shilp',
			email : 'abc@gmail.com'
		});
		object.setUrl('http://localhost/cybercomproject/ecommerce/Mage.php?c=customer&a=test');
		object.load();
	</script> -->
