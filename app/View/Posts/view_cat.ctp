<?php echo $this->element('action_shit'); ?>
<div class="categories view">
	<h2><?php  __('Categories View');?></h2>
	<?php
		foreach ($cat_post_relations as $cat_post_relation){
			echo($cat_post_relation['Cat_post_relations']['$id']."<br />");
		}
	?>
</div>