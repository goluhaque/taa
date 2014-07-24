<?php
App::uses('Sanitize', 'Utility');
class User extends AppModel {
	var $name = 'User';
	var $useDbConfig = 'DEFAULT';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
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
		'username' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please enter a user name'
		),
		'unique' => array(
			'rule' => array('checkUnique', 'username'),
			'message' => 'User name taken. Use another'
		),
		'password' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please enter a password'
		),
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please enter a valid email'
		),
		'avatar' => array(
			'rule' => 'url',
			'required' => true,
			'allowEmpty' => true,
			'message' => 'Please enter a valid url for your avatar.'
		),
		'passwordSimilar' => array(
			'rule' => 'checkPasswords',
			'message' => 'Different password re entered.'
		)
	);
	function beforeSave() {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	function checkUnique($data, $fieldName) {
		$valid = false;
		if(isset($fieldName) && $this->hasField($fieldName)) {
			$valid = $this->isUnique(array($fieldName => $data));
		}
		return $valid;
	}
	function checkPasswords($data) {
		if($data['password'] == $this->data['User']['password2hashed'])
			return true;
		return false;
	}
	
}
?>