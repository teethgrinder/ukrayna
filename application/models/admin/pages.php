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
		)
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
			'slug' 	=> array(
			'title' => 'slug',
		),
		'template' 	=> array(
			'title' => 'template',
		),
		'meta_title' 	=> array(
			'title' => 'meta_title',
		) );
 

	public function on_delete()
	{
		$this->films()->delete();
	}
	 
	 

}
