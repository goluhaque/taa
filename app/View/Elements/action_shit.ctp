<div class="actions" >
	<table>
	<tr>
		<?php
		echo('<td><ul><li>');
		echo($this->Html->link('Index', array('controller' => 'posts', 'action' => 'index')).'</li></ul></td>');
		echo('<td><ul><li>');
		echo($this->Html->link('Categories', array('controller' => 'cats', 'action' => 'index')).'</li></ul></td>');
		if($this->Session -> check('Auth.User.id') != false) {
			echo('<td><ul><li>');
			echo $this->Html->link('New Post', array('controller' => 'posts', 'action' => 'add')).'</li></ul></td>';
			echo('<td><ul><li>');
			echo $this->Html->link('List Users', array('controller' => 'users', 'action' => 'index')).'</li></ul></td>'; 
			echo('<td><ul><li>');
			echo $this->Html->link('New User', array('controller' => 'users', 'action' => 'signup')).'</li></ul></td>'; 
			echo('<td><ul><li>');
			echo $this->Html->link('List Comments', array('controller' => 'comments', 'action' => 'index')).'</li></ul></td>'; 
			echo('<td><ul><li>');
			echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')).'</li></ul></td>'; 
		} else {
			echo('<td><ul><li>');
			echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')).'</li></ul></td>'; 
		}
		
		?>		
	</tr>
	</table>
</div>
<br/><br/><br/><br/><br/><br/><br/>