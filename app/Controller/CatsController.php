<?php
class CatsController extends AppController {
	var $name = 'Cats';
	var $components = array (
		'Session' => array()
	);

	function index() {
		$this->Cat->recursive = 0;
		$this->set('cats', $this->paginate());
	}
	
	function view($cat_id = null) {
		if(!$cat_id) {
			$this->Session->setFlash(__('Invalid Category', true));
			$this->redirect(array('action' => 'index'));
		}
		$params1 = array(
			'conditions' => array('cat.id' => $cat_id),
		);
		$this->set('cats', $this->Cat->find());
	}
	
	function cat_post_rel() {
		$this->set('cat_post_relations', $this->Cat_post_relation->find('all'));
	}
	
	function add() {
		if($this->Session -> check('Auth.User.id') != false) {
			if (!empty($this->data)) {
				$this->Cat->create();
				if ($this->Cat->save($this->data)) {
					$this->Session->setFlash(__('This category has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('category could not be saved', true));
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
				$this->Session->setFlash(__('Invalid Category', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Cat->save($this->data)) {
					$this->Session->setFlash(__('The category has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Post->read(null, $id);
			}
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