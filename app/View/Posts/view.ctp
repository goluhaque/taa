<?php echo $this->element('action_shit'); ?>
<div class="posts view">
<h2><?php  echo('Post');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'profile', $post['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo('Related Comments');?></h3>
	<?php if (!empty($post['Comment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo('Name'); ?></th>
		<th><?php echo('Body'); ?></th>
		<?php 
			if($this->Session->check('') !== false) {
				echo('<th class="actions">Actions</div></th>');
			}
		?>
	</tr>
	<?php
		$i = 0;
		foreach ($post['Comment'] as $comment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		
		<tr<?php echo $class;?>>
			<td><?php echo $comment['name']; ?></td>
			<td><?php echo $comment['body'];?></td>
			<?php	if($this->Session -> check('Auth.User.id') != false) {?>
			<td class="actions">
				<?php echo $this->Html->link('View', array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link('Edit', array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Html->link('Delete', array('controller' => 'comments', 'action' => 'delete', $comment['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $comment['id'])); ?>
			</td>
		</tr>
		<?php } ?>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link('New Comment', array('controller' => 'comments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
