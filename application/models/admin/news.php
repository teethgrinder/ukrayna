<?php 

namespace AdminModels;

class News extends \News {
public $expand = 400;
public $columns = array(
			'id',
			'title' 	=> array(
			'title' => 'title',
		),
			'content' => array(
			'type'	=> 'wysiwyg' ,
			'title'	=> 'içerik',
			
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
	(	'id',
		'title' => array(
			'title' => 'title',
		),
			'content' => array(
			'type'	=> 'wysiwyg' ,
			'title'	=> 'içerik',
			
		),
		'created_at' => array(
        'title' => 'Created', //the header title of the column
    ),
	 
	);

	public function on_delete()
	{
		$this->films()->delete();
	}
	 
	 

}
