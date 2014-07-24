<?php echo $this->element('action_shit'); ?>
<div class="posts index">
	<h2><?php echo('Posts');?></h2>
	<table cellpadding="0" cellspacing="0">
	
	<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th class="actions">
			<?php
				if($this->Session->check('Auth.User.id') != false) {
					echo('Actions');
				}
			?>
			</th>
			
	</tr>
	<?php
	$i = 0;
	foreach ($posts as $post):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?>&nbsp;</td>
		<td><?php echo $post['Post']['body']; ?>&nbsp;</td>
		<td>
		<?php
			if($post['User']['id'] !== null){
				echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'profile', $post['User']['id']));
			} else {
				echo('<font size="1">Deleted</font>');
			}
		?>
		</td>
		<td class="actions">
		<?php
			if($this->Session->check('Auth.User.id') != false) {
				echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']));
				echo $this->Html->link('Delete', array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['id']));
			}
		?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . 'previous', array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next('next' . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
