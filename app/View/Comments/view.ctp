<?php echo $this->element('action_shit'); ?>
<div class="comments view">
<h2><?php  echo('Comment');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comment['Comment']['body'];?>
			&nbsp;
		</dd>
		<br />
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo('Post'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($comment['Post']['title'], array('controller' => 'posts', 'action' => 'view', $comment['Post']['id'])); ?>
			&nbsp;
		</dd>
		<br />
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comment['Comment']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

