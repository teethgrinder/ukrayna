<?php 

class Posts_Controller extends Base_Controller{
	public $restful = true;
	function __construct()
		{
			parent::__construct(); $this->filter('before', 'csrf')->on('posts');
		}
		
	public function get_index(){
		@posts = Post::all();
		return View::make('postindex')->with('posts',$posts);
	}
	public function get_show(){
		@posts = Post::all();
		return View::make('home.post.index')->with('posts',$posts);
	}
	public function get_add(){
		return View::make('home.post.form');
	}
	
	public function post_add(){
		$new_post = { }
		}
		
	public function get_edit($id){
		$post = Post::find($id);
		return View::make('home.edit.post')->with('post',$post);
	}
	
	public function put_edit(){
		//rules
		
	}
	
	public function get_delete($id){
			$post= Post::find($id);
			$post -> delete();
			}
	
}
