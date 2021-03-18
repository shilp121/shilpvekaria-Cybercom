<div class="center mt-2">
	<div class="col-12">
		<?php if($success = $this->getMessage()->getSuccess()) : $this->getMessage()->clearSuccess();?>
		<div class="alert alert-success">
			<?=$success;?>
		</div>
	</div>
	<?php endif ?>

	<div class="col-12">
	  	<?php if($failure = $this->getMessage()->getFailure()) : $this->getMessage()->clearFailure();?>
		<div class="alert alert-success">
		  	<?=$failure;?>
		</div>
	</div>
	<?php endif ?>

</div>