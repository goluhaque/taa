<?php
App::uses('Sanitize', 'Utility');
class Comment extends AppModel {
	var $name = 'Comment';
	var $useDbConfig = 'DEFAULT';
	var $displayField = 'body';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	function beforeSave() {
		$this->data = Sanitize::paranoid($this->data, array('encode' => false));
		return true;
	}
	
	var $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $validate = array(
		'body' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Comment Body cannot be empty'
		),
		'name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Name cannot be empty'
		),
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please enter a valid email. It will not be shared with anyone.'
		),
		'website' => array(
			'rule' => 'url',
			'required' => true,
			'allowEmpty' => true,
			'message' => 'Please enter a valid url for your avatar.'
		),
		'post_id' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Post for which this comment is intended cannot be empty'
		)
	);
}
?>