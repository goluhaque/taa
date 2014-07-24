<?php
class Cat extends AppModel {
	var $name = 'Cat';
	var $useDbConfig = 'DEFAULT';
	public $hasAndBelongsToMany = array(
        'Post' =>
            array(
                'className'              => 'Post',
                'joinTable'              => 'posts_cats',
                'foreignKey'             => 'cat_id',
                'associationForeignKey'  => 'post_id',
                'unique'                 => 'keepExisting',
                'conditions'             => '',
                'fields'                 => array('post.id','post.title','post.body'),
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )
    );
}
?>