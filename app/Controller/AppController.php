<?php
App::uses('Sanitize', 'Utility');
class AppController extends Controller {
	var $components = array(
		'Session',
		'Auth' => array(
				'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
				'logoutRedirect' => array('controller' => 'posts', 'action' => 'index')
		)
	);
	
	function beforeFilter() {
		$this->Auth->allow('index');
	}
}
?>