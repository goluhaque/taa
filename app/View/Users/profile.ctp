<?php echo $this->element('action_shit'); ?>
<div class="users view">
<h2><?php  echo('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo('Avatar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo("<img src=".$user['User']['avatar']." border='2' />"); ?>
		</dd>
		
	</dl>
</div>
<br /><br /><br /><br /><br /><br />
<div class="related">
	<h3><?php echo('Related Posts');?></h3>
	<?php if (!empty($user['Post'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo('Title'); ?></th>
		<th><?php echo('Body'); ?></th>
		<?php
			if($this->Session -> check('Auth.User.id') != false) {
				echo('<th class="actions">Actions</div></th>');			
			}
		?>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Post'] as $post):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $post['title'];?></td>
			<td><?php echo $post['body'];?></td>
			<?php
				if($this->Session -> check('Auth.User.id') != false) {
					echo('<td class="actions">');
					echo $this->Html->link(__('View', true), array('controller' => 'posts', 'action' => 'view', $post['id']));
					echo $this->Html->link(__('Edit', true), array('controller' => 'posts', 'action' => 'edit', $post['id'])); 
					echo $this->Html->link(__('Delete', true), array('controller' => 'posts', 'action' => 'delete', $post['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['id']));
					echo('</td>');
				}
			?>
						
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
