<?php
class Home_Page_Controller extends Base_Controller {
	public $restful = true;
	function __construct()
	{
		parent::__construct();
		$this->filter('before', 'csrf')->on('post');
		$this->filter('before', 'csrf')->on('subject');
	}
	public function get_homepage()
	
	{	
		$links = DB::table('links')->where('type', '=', '1')->get();
		$posts = Post::all();
		$page = DB::table('pages')->where('template', '=', 'homepage')->first();
		//$types = Type::lists('title', 'id');
		Section::inject('title', $page->meta_title);
		Section::inject('description', $page->meta_description);
		Section::inject('keywords', $page->meta_keywords);
	 
		return View::make('home.page.homepage')
						->with('page', $page)->with('posts',$posts)->with('links',$links);
						//->with('types', $types);
	}
	public function get_view($slug)
	
	{	$links = DB::table('links')->where('type', '=', '1')->get();
		$page = DB::table('pages')->where('slug', '=', $slug)->first();
		$subject = DB::table('subjects')->where('slug', '=', $slug)->first();
		if (! is_object($page))
			return Response::error('404'); 
		Section::inject('title', $page->meta_title);
		if (is_file(path('app').'views/home/page/'.$page->template.'.blade.php'))
		{
			return View::make('home.page.'.$page->template)->with('page', $page)->with('subject', $subject)->with('links',$links);
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
	public function get_edit($slug){
		$links = DB::table('links')->where('type', '=', '2')->get();
		$page = DB::table('pages')->where('slug', '=', $slug)->first();
		$subject = DB::table('subjects')->where('slug', '=', $slug)->first();
		if (! is_object($page))
			return Response::error('404'); 
		Section::inject('title', $page->meta_title);
		if (is_file(path('app').'views/home/page/'.$page->template.'.blade.php'))
		{
			return View::make('home.page.edit')->with('page', $page)->with('subject', $subject)->with('links',$links);
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
	public function put_edit($slug){
	 
		$subject = Subject::where('slug', '=', $slug)->first();
		$rules = array(
            
            'title'  => 'required|max:255',
            'content' => 'required',
        );
     $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails())
        {
            Messages::add('error',$validation->errors->all());

	   }else{
            $subject->title = Input::get('title');
            $subject->content = Input::get('content');
 
            $subject->save();
      
            return Redirect::to('edit/egitim');
        }
		}
	
	public function post_photo_upload($page_id) {
		$path = path('base').'/public/img/page/' . (int)$page_id;
		$filename = uniqid() . '.jpg';

		Input::upload('file', $path, Input::file('file.name'));

		$success = Resizer::open( $path . '/' . Input::file('file.name') )
					->resize( 800 , 600 , 'auto' )
					->save( $path . '/' . $filename , 90 );

		File::delete( $path . '/' . Input::file('file.name'));

		die('{ "filelink": "/img/page/' . (int)$page_id . '/' . $filename . '" }');

	}
	}

