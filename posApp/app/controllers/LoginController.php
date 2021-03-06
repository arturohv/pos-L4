<?php

class LoginController extends BaseController {


public function index()
	{
    	return View::make('users.login');	
	}

	public function postSignin() {		
        if (Auth::attempt(array('user_name'=>Input::get('username'), 'password'=>Input::get('password')))) {
    		return Redirect::to('menus')->with('message', 'You are now logged in!');
		} else {
    		return Redirect::to('/')
	        ->with('message', 'Your username/password combination was incorrect')
	        ->withInput();
		}   
	}

}