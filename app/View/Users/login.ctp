<?php echo $this->element('action_shit'); ?>
<h2>Log In</h2>
<?php
	$this->Session->flash('auth');
?>
<?php 
	echo($this->Form->create('User', array('action' => 'login')));
	echo($this->Form->input('username'));
    echo($this->Form->input('password'));
    echo('<div style="text-align:center">'.$this->Form->end('Login').'</div>');
?>
