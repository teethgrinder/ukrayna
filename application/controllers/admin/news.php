<?php
class Admin_News_Controller extends Base_Controller {
	public $restful = true;
	function __construct()
	{
		parent::__construct();
		$this->filter('before', 'is_admin')->on('dashboard');
		$this->filter('before', 'csrf')->on('news');
	}
	public function get_all()
	{
		$news = News::all();
		return View:make('all')->('news',$news);
	}
	public function get_news($id)
	{
		$news = News::find($id);
		return View::make('show')->('news',$news);
	}
	public function get_new()
	{
		return View::make('new');
	}
	public function post_add()
	{ $data = ('title'=>Input::get('title'),
							'content'=>Input::get('content'),
							);
		$rules = array(
		'title' => 'required|min:3|max:255',
		'content' => 'required'
		);
		$v = Validator::make($data, $rules);
if ( $v->fails() )
{
	}
	public function get_edit($id=false)
	{
		$news = News::find($id);
		return View::make('edit')->with('news',$news);
	}
	public function post_edit($id=false)
	{
		$news = News::find($id);
	}
	public function get_delete($id)
	{
		$news = News::find($id);
		$news -> delete();
	}
}
