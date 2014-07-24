<?php
class PostsController extends AppController {
	var $name = 'Posts';
	var $components = array(
		'Session' => array(),
		'Auth' => array(
			'authorize' => 'Posts',
			'allowedActions' => array('index','view','edit','delete','add')
		)	
	);
	
	function index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
		$this->set('categories', $this->paginate());
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}
	
	function add() {
		if($this->Session -> check('Auth.User.id') != false) {
			if (!empty($this->data)) {
				$this->Post->create();
				$this->request->data['Post']['user_id'] = $this->Auth->user('id');
				if ($this->Post->save($this->data)) {
					$this->Session->setFlash(__('The post has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Post could not be saved', true));
				}
			}
		} else {
			$this->Session->setFlash(__('Unfulfilled User Clearance Level Requirements', true));
			$this->redirect(array('action' => 'index'));
		}
	}

	function edit($id = null) {
		if($this->Session -> check('Auth.User.id') != false) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid post', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Post->save($this->data)) {
					$this->Session->setFlash(__('The post has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Post->read(null, $id);
			}
			$users = $this->Post->User->find('list');
			$this->set(compact('users'));
		} else {
			$this->Session->setFlash(__('Unfulfilled User Clearance Level Requirements', true));
			$this->redirect(array('action' => 'index'));
		}
		
	}

	function delete($id = null) {
		if($this->Session -> check('Auth.User.id') != false) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for post', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Post->delete($id)) {
				$this->Session->setFlash(__('Post deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Post was not deleted', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('Unfulfilled User Clearance Level Requirements', true));
			$this->redirect(array('action' => 'index'));
		}
	}
}
?>