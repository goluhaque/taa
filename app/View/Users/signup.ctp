<?php echo $this->element('action_shit'); ?>
<div class="users form">
<?php if($this->Form->isFieldError('User.username')) echo($this->Form->error('User.username', null, array('class' => 'message'))); ?>
<?php if($this->Form->isFieldError('User.password')) echo($this->Form->error('User.password', null, array('class' => 'message'))); ?>
<?php if($this->Form->isFieldError('User.email')) echo($this->Form->error('User.email', null, array('class' => 'message'))); ?>
<?php echo($this->Form->create('User', array('action' => 'signup')));?>
	<fieldset>
		<h2><?php echo('Add User'); ?></h2>
		<br /><br /><br /><br />
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
			<span>Password</span>
		</label>
		<?php echo($this->Form->password('password', array('class' => 'fullwidth'))); ?>
		<br/><br/>
		<label for="UserPasswordRepeat" class="passwordrepeatlabel">
			<span>Re-enter Password</span>
		</label>
		<?php echo($this->Form->password('password2', array('class' => 'fullwidth'))); ?>
		<br/><br/>
		<label for="UserEmail" class="emaillabel">
			<span>Your Avatar</span>
		</label>
		<?php echo($this->Form->text('avatar', array('class' => 'fullwidth'))); ?>
		<br/><br/><br/><br/>
		<div style="text-align:center;"><?php echo($this->Form->submit('Create User')); ?></div>
	</fieldset>
<?php echo($this->Form->end()); ?>
</div>