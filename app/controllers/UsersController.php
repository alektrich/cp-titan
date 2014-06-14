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

		    $data['successMessage'] = "You are registered successfully!";
	        return Redirect::to('/', $data);

	    } else {
	        // validation has failed, display error messages  
	        return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput(); 
	    }


	}

	public function postLogin() {

		$email 	  = Input::get('email');
		$password = Input::get('password');

		$this->email = $email;

		if (Auth::attempt(array('email'=>$email, 'password'=>$password))) {

			$data['firstname'] = User::where('email', $email)->pluck('first_name');

			// dd($this->email);

		    return View::make('lifegraphic', $data);

		} else {

		    return Redirect::to('users/login')
		        ->with('message', '<p class="alert alert-error">Your username/password combination was incorrect</p>')
		        ->withInput();

		}

	}

}