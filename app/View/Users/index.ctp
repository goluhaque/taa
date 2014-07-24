<?php echo $this->element('action_shit'); ?>
<div class="users index">
	<h2><?php echo('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions" style="text-align:right;"><?php echo('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link($user['User']['username'], array('action' => 'profile', $user['User']['id'])); ?>&nbsp;</td>
		<td class="actions" style = "text-align:right;">
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link('Delete', array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
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
