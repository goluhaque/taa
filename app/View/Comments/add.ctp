<?php echo $this->element('action_shit'); ?>
<div class="comments form">
<h2><?php echo('Add Comment'); ?></h2>
<?php echo $this->Form->create('Comment');?>
	<fieldset>
 	<?php
		echo($this->Form->input('name'));
		echo($this->Form->input('email'));
		echo($this->Form->input('website'));
		echo($this->Form->input('body'));
		echo('<div style="text-align:center;">'.$this->Form->input('post_id').'</div>');
	?>
	</fieldset>
<div style="text-align:center;"><?php echo $this->Form->end(__('Submit', true));?></div>
</div>
