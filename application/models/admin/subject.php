<?php 

namespace AdminModels;

class Subject extends \Subject {
public $expand = 600;
public $columns = array(
			'id',
			'title' 	=> array(
			'title' => 'title',
		),
			'slug' 	=> array(
			'title' => 'slug',
		),
		'content' 	=> array(
			'title' => 'template',
			'type'=>'wysiwyg'
		),
		
			'created_at' => array(
			'title' => 'Created', //the header title of the column
    ),
			'updated_at' => array(
       'title' => 'Updated',
    ));
 
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
			'slug' 	=> array(
			'title' => 'slug',
		),
		'content' 	=> array(
			'title' => 'template',
			'type'=>'wysiwyg'
		),
		 
			'created_at' => array(
			'title' => 'Created', //the header title of the column
    ),
			'updated_at' => array(
       'title' => 'Updated',
    ));
 

	public function on_delete()
	{
		$this->films()->delete();
	}
	 
	 

}
