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

		$student->name=Input::get('name');
		$student->user_id=Input::get('user_id');
		$student->stars=0;

		$student->save();

		return Redirect::action('HomeController@index');
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
		else{

			echo 'u cant do dat.';
		}
		return Redirect::action('HomeController@index');
	}

	public function showRegister(){

		return View::make('register');
	}

	public function doRegister(){

		$user = new User();

		$user->name=		Input::get('name');
		$user->organization=Input::get('organization');
		$user->username=	Input::get('username');
		$user->email=		Input::get('email');
		$user->password=	Hash::make(Input::get('password'));

		$user->save();

		return Redirect::action('HomeController@index');
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

				return Redirect::action('HomeController@index');

			} else {	 	

				
				return Redirect::action('HomeController@showLogin');

			}

		}
	}

	public function doLogout(){

		Auth::logout(); // log the user out of our application
		return Redirect::action('HomeController@index'); // redirect the user to the login screen
	}
}
