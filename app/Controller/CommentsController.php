<?php
class CommentsController extends AppController {
	var $name = 'Comments';
	var $components = array(
		'Session' => array(),
		'Auth' => array(
			'authorize' => 'Comments',
			'allowedActions' => array('index','view','add','delete')
		)	
	);
	function index() {
		if($this->Session -> check('Auth.User.id') != false) {
			$this->Comment->recursive = 0;
			$this->set('comments', $this->paginate());
		} else {
			$this->Session->setFlash(__('Unfulfilled User Clearance Level Requirements', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid comment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Comment->create();
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash(__('The comment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.', true));
			}
		}
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('posts'));
	}

	function edit($id = null) {
		if($this->Session -> check('Auth.User.id') != false) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid comment', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Comment->save($this->data)) {
					$this->Session->setFlash(__('The comment has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The comment could not be saved. Please, login or try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Comment->read(null, $id);
			}
			$posts = $this->Comment->Post->find('list');
			$this->set(compact('posts'));
		} else {
			$this->Session->setFlash(__('Unfulfilled User Clearance Level Requirements', true));
			$this->redirect(array('action' => 'index'));
		}
	}

	function delete($id = null) {
		if($this->Session -> check('Auth.User.id') != false) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for comment', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Comment->delete($id)) {
				$this->Session->setFlash(__('Comment deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Comment was not deleted', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('Unfulfilled User Clearance Level Requirements', true));
			$this->redirect(array('action' => 'index'));
		}
	
	}
}
?>