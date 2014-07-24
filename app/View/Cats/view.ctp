<?php echo $this->element('action_shit'); ?>
<div class="categories view">
	<h2><?php  echo('<h2>'.$cats['Cat']['cat_name'].'</h2>');?></h2>
	
	<?php
		echo('<h4>Posts with Category:'.$cats['Cat']['cat_name'].'</h4>');
		echo('<table><tr><th>Title</th><th>Body</th></tr>');
		foreach ($cats['Post'] as $cat){
			echo('<tr>');
			echo('<td>'.$this->Html->link($cat['title'], array('controller' => 'posts', 'action' => 'view', $cat['id'])).'</td>');
			echo('<td>'.$cat['body'].'</td>');
			echo('</tr>');
		}
		echo('</table>');
	?>
</div>