
<div class = 'row'>
	<div style = 'z-index : 7' class = 'col-sm-12'>
		<?php echo validation_errors();?>
		<?php echo form_open($action);?>
			<input name='username' type = 'input' value = "<?= $entity['username'] ?>"/>
			<input name = 'password' type = 'input' value = "<?=  $entity['password']?>"/>
			<input type = 'input' value = "<?=  $details['name']?>"/>
		<div class = 'form-group'>
			<input class="btn btn-default" type = 'submit' name = 'submit' value ='Update'>
		</div>
		</form>
	</div>
</div>