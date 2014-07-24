<?php echo $this->element('action_shit'); ?>
<div class="comments index">
	<h2><?php echo('Comments');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('post_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions">
			<?php 
				if($this->Session -> check('Auth.User.id') != false) {
					echo('Actions');
				}
			?>
			</th>
	</tr>
	<?php
	$i = 0;
	foreach ($comments as $comment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $comment['Comment']['body']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comment['Post']['title'], array('controller' => 'posts', 'action' => 'view', $comment['Post']['id'])); ?>
		</td>
		<td>
			<?php 
			if($comment['Comment']['name'] != null) {
				echo($comment['Comment']['name']);
			} else {
				echo('<font size="1">Deleted</font>');
			}
			?>
		</td>
		<td class="actions">
		<?php
			if($this->Session->check('Auth.User.id') != false) {
				echo $this->Html->link(__('View', true), array('action' => 'view', $comment['Comment']['id']));
				echo $this->Html->link(__('Edit', true), array('action' => 'edit', $comment['Comment']['id']));
				echo $this->Html->link(__('Delete', true), array('action' => 'delete', $comment['Comment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $comment['Comment']['id']));
			}
		?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array('format' => 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
