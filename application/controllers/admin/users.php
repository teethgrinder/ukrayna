<?php
class Home_User_Controller extends Base_Controller {
	public $restful = true;
	function __construct()
	{
		parent::__construct();
		$this->filter('before', 'is_admin')->on('dashboard');
		//$this->filter('before', 'csrf')->on('post');
	}
	public function get_login()
	{  // $password = "whatever"; $hashed_password = Hash::make($password); dd(Hash::check($password, $hashed_password));
		return View::make('home.login');	
	}
	
	public function post_login() 
	{
		$userdata = array(
			'username' => Input::get('email'),
			'password' => Input::get('password')
			);
 
		if (Auth::attempt($userdata)) 
 
		 {return Redirect::to('admin'); 
		}else{
			return Redirect::to('user/login');
		}
	}
	
	public function get_signup(){
		return View::make('signup');
	}
	public function post_signup()    {		$new_user = array(
			'email' => Input::get('email'),
			'name' => Input::get('name'),
			'password' => Hash::make('password')
			);
  
       if( !SignupForm::is_valid() )
		{		
			return Redirect::back()->with_input()->with_errors( SignupForm::$validation );
		}

		// save input to session
			$user = new User($new_user);
			$user -> save();
		
		return Redirect::to('profile');
    }
    public function get_profile(){
	 return View::make('profile');	 
	}
	
	public function get_logout() 
	{
		Auth::logout();
		return Redirect::to('/');
	}
	public function get_dashboard()
	{
	return View::make('dashboard');	
	}
}
