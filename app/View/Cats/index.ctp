<?php echo $this->element('action_shit'); ?>
<div class="cats index">
	<h2><?php echo('Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	
	<tr>
			<th><?php echo $this->Paginator->sort('cat_name');?></th>
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
	foreach ($cats as $cat):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link($cat['Cat']['cat_name'], array('action' => 'view', $cat['Cat']['id'])); ?>&nbsp;</td>
		<td class="actions">
		<?php
			if($this->Session->check('Auth.User.id') != false) {
				echo $this->Html->link('Edit', array('action' => 'edit', $cat['Cat']['id']));
				echo $this->Html->link('Delete', array('action' => 'delete', $cat['Cat']['id']), null, sprintf(__('Are you sure you want to delete this?', true), $cat['Cat']['id']));
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
