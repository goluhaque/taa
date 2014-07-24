<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array(
		'Session' => array(),
		'Auth' => array(
			'authorize' => 'Users',
			'allowedActions' => array('index','profile','edit','delete','signup','login','logout')
		)	
	);

	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
	function signup(){
		if($this->Session -> check('Auth.User.id') != false) {
			if (!empty($this->data)) {	
				if(isset($this->request->data['User']['password2']))
					$this->request->data['User']['password2hashed'] = $this->Auth->password($this->data['User']['password2']);
				$this->User->create();
				if ($this->User->save($this->data)) {
					$this->Session->setFlash('Success. User Account has been added.');
					$this->redirect(array('controller'=>'posts', 'action'=>'index'));				
				} else {
					$this->Session->setFlash('There was an error signing up. Please, try again.');
					$this->data = null;
				}
			}
		} else {
			$this->Session->setFlash(__('Unfulfilled User Clearance Level Requirements', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function login() {
		if ($this->Auth->login()) {
			$this->Session->setFlash(__('Successfully logged in.'), 'default', array(), 'auth');
			return $this->redirect($this->Auth->redirect());
		} else {
			$this->Session->setFlash(__('Username or password is incorrect.'), 'default', array(), 'auth');
		}
	}
	function logout() {
		if($this->Session -> check('Auth.User.id') != false) {
			$this->Session->setFlash('Logged Out');
			$this->redirect($this->Auth->logout());
		}
	}
	
	
	function profile($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function edit($id = null) {
		if($this->Session -> check('Auth.User.id') != false) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid user', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('The user has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->User->read(null, $id);
			}
		} else {
			$this->Session->setFlash(__('Unfulfilled User Clearance Level Requirements', true));
			$this->redirect(array('action' => 'index'));
		}
	}

	function delete($id = null) {
		if($this->Session -> check('Auth.User.id') != false) {
			if (!$id) {	
				$this->Session->setFlash(__('Invalid id for user', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->User->delete($id)) {
				$this->Session->setFlash(__('User deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('User was not deleted', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('Unfulfilled User Clearance Level Requirements', true));
			$this->redirect(array('action' => 'index'));
		}
	}
}
?>