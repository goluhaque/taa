<?php echo $this->element('action_shit'); ?>
<table>
	<tr><th>Post Title</th><th>Cateogory</th></tr>
	<?php
		foreach($cat_post_relations as $cat_post_relation) {
			echo('<tr><td>'.$this->Html->link($cat_post_relation['Post']['title'], array('controller' => 'posts', 'action' => 'view', $cat_post_relation['Post']['id'])).'</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>'.$cat_post_relation['Cat']['cat_name'].'<td></tr>');
		}
	?>
</table>
