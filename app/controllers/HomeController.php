<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){

		$students = Student::all();
		$users = User::all();

		return View::make('index',compact('students','users'));
	}

	public function showCreate(){

		return View::make('create');
	}

	public function doCreate(){

		$student = new Student();

		$student->name=Str::title(Input::get('name'));
		$student->user_id=Input::get('user_id');
		$student->stars=0;

		$student->save();
		
		return Redirect::back();
	}

	public function show(User $user){		

		return View::make('show',compact('user'));
	}

	public function addStar(){

		$id = Input::get('id');
		$user_id = Input::get('user_id');

		if(Auth::user()->id == $user_id){

			Student::addStar($id);

		}
		return Redirect::back();
		
	}

	public function showRegister(){

		return View::make('register');
	}

	public function doRegister(){

		$data = Input::all();

		$rules = array(

			'name'=>'required|min:3|max:30',
			'username' => 'alpha_num|unique:users|min:2|max:15|required',
			'password' => 'min:6|max:20|required|' ,
			'email' => 'email|unique:users|required',
			'organization' =>'alpha|min:2|max:25|required',
			

		);

		$validator = Validator::make($data, $rules);

		if($validator->passes()){
		$user = new User();

		$user->name=		Str::title(Input::get('name'));
		$user->organization=Str::title(Input::get('organization'));
		$user->username=	Input::get('username');
		$user->email=		Input::get('email');
		$user->password=	Hash::make(Input::get('password'));

		$user->save();

		return Redirect::action('HomeController@showLogin');

		}
		else{

			return Redirect::action('HomeController@showRegister')->withErrors($validator);
		}
	}

	public function showLogin(){

		return View::make('login');
	}

	public function doLogin(){

		$rules = array(
			'email'    => 'required|email',
			'password' => 'required|alphaNum|min:3',
		);

		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} 

		else {

			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password'),
			);

			if (Auth::attempt($userdata)) {

				return Redirect::action('HomeController@show',Auth::user()->id);

			} else {	 	

				
				return Redirect::action('HomeController@showLogin');

			}

		}
	}

	public function doSearch(){

		$query=Input::get('query');

		$students = Student::whereRaw(
		"MATCH(name) AGAINST(? IN BOOLEAN MODE)",
        array($query)
    	)->get();

    	return View::make('results', compact('students'));

	}

	public function doLogout(){

		Auth::logout(); // log the user out of our application
		return Redirect::action('HomeController@index'); // redirect the user to the login screen
	}
}
