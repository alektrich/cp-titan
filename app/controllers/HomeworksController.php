<?php

 
class HomeworksController extends BaseController {
 	

	public function __construct() {

	    $this->beforeFilter('csrf', array('on'=>'post'));
	    
	}


	/**
     * Homeworks
     *
     * @param none
     * @return Get homework
     */
	public function getHomework() {

		try 
		{
			$userId = Auth::user()->id;
		}
		catch (Exception $e) {
			return Redirect::to('/');
		}
		
		if($homeworks = Homework::where('user_id', '=', $userId)->get()) {
			$data['homeworks'] = $homeworks;
		}

		$data['username'] = Auth::user()->firstname;

		return View::make('homeworks', $data);

	}

	/**
     * Page with link code for page
     *
     * @param none
     * @return Save homework into DB
     */
	public function postHomework() {

		$validator = Validator::make(Input::all(), Homework::$rules);
 
	    if ($validator->passes()) {
	        // validation has passed, save user in DB
	    	$homework = new Homework;
		    $homework->user_id = Auth::user()->id;
		    $homework->title = Input::get('title');
		    $homework->text = Input::get('text');
		    $homework->save();

		    return Redirect::to('homeworks')->with('message', '<p class="alert alert-success">Homework saved successfully</p>');

	    } else {
	        // validation has failed, display error messages  
	        return Redirect::to('homeworks')->with('message', '<p class="alert alert-danger">Failed to save new homework</p>')->withInput()->withErrors($validator); 
	    }


	}

}