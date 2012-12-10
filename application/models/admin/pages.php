<?php 

namespace AdminModels;

class Pages extends \Pages {
	
public $columns = array(
			'id',
			'title' 	=> array(
			'title' => 'title',
		),
			'slug' 	=> array(
			'title' => 'slug',
		),
		'template' 	=> array(
			'title' => 'template',
		),
		'meta_title' 	=> array(
			'title' => 'meta_title',
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
		'template' 	=> array(
			'title' => 'template',
		),
		'meta_title' 	=> array(
			'title' => 'meta_title',
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
