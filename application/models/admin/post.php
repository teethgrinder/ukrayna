<?php 

namespace AdminModels;

class Post extends \Post {
public $expand = 600;
public $columns = array(
			'id',
			'title' 	=> array(
			'title' => 'title',
		),
			'created_at' => array(
			'title' => 'Created', //the header title of the column
    ),
			 );
 
public $filters = array
	(
		'id',
		'title'
	);

	public $edit = array
		(		'id',
			'title' 	=> array(
			'title' => 'title',
		),
 
		'content' 	=> array(
			'title' => 'template',
			'type'=>'wysiwyg'
		),
  );
 

	public function on_delete()
	{
		$this->films()->delete();
	}
}
