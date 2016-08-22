<?php

class LoginController extends Controller{

	public  function __construct(){}

	// public function showWelcome()
	// {
	// 	return View::make('Login.login');
	// }

	public function login(){

		if (Auth::attempt(Input::only('username','password')))
		{
		    return Redirect::intended('dashboard');
		}
		else
		{
			return Redirect::back()
			->with('error','El usuario y el password no corresponden')
			->withInput();
		}

	}

	public function estaActivaSesion(){
		if(Auth::check()){
			return Redirect::to('dashboard');
		}else{
			return Redirect::back('/')
			->with('error','No esta logueado!');
		}
	}

	public function logout(){
		Auth::logout();

		return Redirect::to('/')
		->with('sucess','Has salido del sistema satisfactoriamente!');
	}

	public function dashboard()
	{
		return View::make('Dashboard.dashboard')->with('users',HomeController::getAllUsuarios());
	}

}