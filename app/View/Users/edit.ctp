<?php echo $this->element('action_shit'); ?>
<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<h2><?php echo('Edit User'); ?></h2>
		<?php echo('Your previous data(except the password) has been entered in the fields. Please edit those fields which you want to.<br /><br /><br /><br />');?>
		<label for="UserUsername" class="usernamelabel">
			<span>Your Name</span>
		</label>
		<?php echo($this->Form->text('username', array('class' => 'fullwidth'))); ?>
		<br/><br/>
		<label for="UserEmail" class="emaillabel">
			<span>Your Email</span>
		</label>
		<?php echo($this->Form->text('email', array('class' => 'fullwidth'))); ?>
		<br/><br/>
		<label for="UserPassword" class="passwordlabel">
		</label>
		<?php echo($this->Form->input('password', array('class' => 'fullwidth'))); ?>
		<br/><br/>
		<label for="UserPasswordRepeat" class="passwordrepeatlabel">
		</label>
		<?php echo($this->Form->input('password2', array('class' => 'fullwidth'))); ?>
		<br/><br/>
		<label for="UserEmail" class="emaillabel">
			<span>Your Avatar</span>
		</label>
		<?php echo($this->Form->text('avatar', array('class' => 'fullwidth'))); ?>
		<br/><br/><br/><br/>
		<div style="text-align:center;"><?php echo($this->Form->submit('Save Data')); ?></div>
	</fieldset>
	<?php echo($this->Form->end()); ?>
</div>
