<?php
class Admin_Pages_Controller extends Base_Controller {
	public $restful = true;
	function __construct()
	{
		parent::__construct();
		$this->filter('before', 'csrf')->on('post');
	}
	public function get_homepage()
	{
		$page = DB::table('pages')->where('template', '=', 'homepage')->first();
		//$types = Type::lists('title', 'id');
		Section::inject('title', $page->meta_title);
		Section::inject('description', $page->meta_description);
		Section::inject('keywords', $page->meta_keywords);
		$subject = DB::table('subjects')->first();
		return View::make('home.page.homepage')
						->with('page', $page)->with('subject',$subject);
						//->with('types', $types);
	}
	public function get_view($slug)
	{
		$page = DB::table('pages')->where('slug', '=', $slug)->first();
		if (! is_object($page))
			return Response::error('404'); 
		Section::inject('title', $page->meta_title);
		if (is_file(path('app').'views/home/page/'.$page->template.'.blade.php'))
		{
			return View::make('home.page.'.$page->template)->with('page', $page);
		}
		else
		{
			if (is_file(path('app').'views/home/page/default.blade.php'))
			{
				return View::make('home.page.default')->with('page', $page);
			}
			else
			{
				return Response::error('404'); 	
			}
		}
		
		
	}
	
	public function get_show(){
		$links = DB::table('links')->where('type', '=', '2')->get();
		$page = DB::table('pages')->where('slug', '=', 'haberler')->first();
		$subject = DB::table('subjects')->where('slug', '=', 'haberler')->first();
		$posts = Post::all();
		
		if (! is_object($page))
			return Response::error('404'); 
		Section::inject('title', $page->meta_title);
		if (is_file(path('app').'views/home/page/'.$page->template.'.blade.php'))
		{
			return View::make('home.page.haberler')->with('page', $page)->with('subject', $subject)->with('links',$links)->with('posts', $posts);
		}
		else
		{
			if (is_file(path('app').'views/home/page/default.blade.php'))
			{
				return View::make('home.page.default')->with('page', $page);
			}
			else
			{
				return Response::error('404'); 	
			}
		}
	}
	public function get_edit($id){
		$links = DB::table('links')->where('type', '=', '2')->get();
		$page = DB::table('pages')->where('slug', '=', 'haberler')->first();
		$subject = DB::table('subjects')->where('slug', '=', 'haberler')->first();
		$post = DB::table('posts')->where('id', '=', $id)->first();
		if (! is_object($page))
			return Response::error('404'); 
		Section::inject('title', $page->meta_title);
		if (is_file(path('app').'views/home/page/'.$page->template.'.blade.php'))
		{
			return View::make('home.post.edit')->with('page', $page)->with('subject', $subject)->with('links',$links)->with('post',$post);
		}
		else
		{
			if (is_file(path('app').'views/home/page/default.blade.php'))
			{
				return View::make('home.page.default')->with('page', $page);
			}
			else
			{
				return Response::error('404'); 	
			}
		}
	}
}
