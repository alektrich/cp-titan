<?php

 
class UsersController extends BaseController {
 	

	public function __construct() {

	    $this->beforeFilter('csrf', array('on'=>'post'));
	    
	}

	// protected $layout = "layouts.main";
	protected $email = "";

	/**
     * Page with link code for page
     *
     * @param none
     * @return Registration View
     */
	/*public function getRegister() {

	    return View::make('users.register');

	}*/


	/**
     * Page with link code for page
     *
     * @param none
     * @return Save user into DB
     */
	public function postRegister() {

		$validator = Validator::make(Input::all(), User::$rules);
 
	    if ($validator->passes()) {
	        // validation has passed, save user in DB
	    	$user = new User;
		    $user->first_name = Input::get('firstname');
		    $user->last_name = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();

		    return Redirect::to('/')->with('message', '<p class="alert alert-success">Thanks for registering!</p>');

	    } else {
	        // validation has failed, display error messages  
	        return Redirect::to('/')->with('message', '<p class="alert alert-danger">Registration failed</p>')->withInput()->withErrors($validator); 
	    }


	}

	public function postLogin() {

		$email 	  = Input::get('email');
		$password = Input::get('password');

		$this->email = $email;

		if (Auth::attempt(array('email'=>$email, 'password'=>$password))) {

		    return Redirect::to('homeworks');

		} else {

		    return Redirect::to('/')
		        ->with('message', '<p class="alert alert-danger">Your username/password combination was incorrect</p>')
		        ->withInput();

		}

	}

	public function getLogout() 
	{
		Auth::logout();
		return Redirect::to('/');
	}

}