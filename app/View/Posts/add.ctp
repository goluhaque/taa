<?php echo $this->element('action_shit'); ?>
<div class="posts form">  
<?php echo $this->Form->create('Post');?>
	<fieldset>
 		<legend><?php echo('Add Post'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit', true);?>
</div>
