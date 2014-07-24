<?php echo $this->element('action_shit'); ?>
<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
 		<legend><?php echo('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit', true);?>
</div>
