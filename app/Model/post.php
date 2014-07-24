<?php
App::uses('Sanitize', 'Utility');
class Post extends AppModel {
	var $name = 'Post';
	var $useDbConfig = 'DEFAULT';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	function beforeSave() {
		return true;
	}
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	var $validate = array(
		'body' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Post Body cannot be empty'
		),
		'title' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Post Title cannot be empty'
		)
	);
	

}
?>