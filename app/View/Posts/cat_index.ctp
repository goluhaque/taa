<?php echo $this->element('action_shit'); 
	foreach($cats as $cat) {
		echo($cat['Cat']['cat_name'].'<br />');
	}
?>
