<?php

class Homework extends Eloquent {

	/**
	 * The validation rules for homeworks.
	 *
	 * @var array
	 */
	public static $rules = array(
	    'title'=>'required|min:5',
	    'text'=>'required|min:10'
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'homeworks';

}
