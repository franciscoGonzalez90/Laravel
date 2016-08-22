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

	public function showWelcome()
	{
		if(Auth::check()){
			return Redirect::to('dashboard');
		}else{
			return View::make('Login.login');
		}
	}

	public function crearUsuario(){
		return View::make('vehiculo.crearVehiculo');
	}

	public function guardarUsuario(){
		// dd(substr(Input::get('nombre'),0,1).Input::get('apellido'));
		// dd(Input::get('password').' '.Input::get('repassword'));
		$rules=array(
				'nombre'=>'required',
				'apellido'=>'required',
				'password'=>'required',
				'email'=>'required|email',
				'telefono'=>'required',
				'repassword'=>'required'
			);

		$validator = Validator::make(
			Input::all()
			,$rules);

		if($validator->fails()){
			$messages=$validator->messages();
			return Redirect::back()
			->withErrors($messages);
		}

	$username=substr(Input::get('nombre'),0,1).Input::get('apellido');
	// $username=substr(Input::get('nombre'),0,$i).Input::get('apellido');
	if(DB::table('usuario')->where('username','=',$username)->exists()){
		for ($i=1; $i < strlen(Input::get('nombre')); $i++) {
				if(DB::table('usuario')->where('username','=',$username)->exists()){
					$username=substr(Input::get('nombre'),0,1).'.'.Input::get('apellido');
				}else if(DB::table('usuario')->where('username','=',$username)->exists()){
					$i=2;
					$username=substr(Input::get('nombre'),0,$i).Input::get('apellido');
				}
		}
	}


		if(Input::get('password') == Input::get('repassword')){
			$usuario=new User;
			$usuario->nombre=Input::get('nombre');
			$usuario->apellido=Input::get('apellido');
			$usuario->username=$username;
			$usuario->password=Hash::make(Input::get('password'));
			$usuario->email=Input::get('email');
			$usuario->telefono=Input::get('telefono');
			$usuario->isAdmin=false;
			$usuario->save();
			return Redirect::to('dashboard')->with('success','se ha creado un nuevo usuario!');
		}
		else
		{
			return Redirect::back()
			->with('error','Las contraseñas no son identicas!');
		}

	}

	public function modificarUsuario($id){
			$user=User::find($id);
			return View::make('vehiculo.modificarVehiculo',['user'=>$user]);
	}


	public function actualizarUsuario($id){

		$rules=array(
				'nombre'=>'required',
				'apellido'=>'required',
				'email'=>'required|email',
				'telefono'=>'required'
			);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			$messages=$validator->messages();
			return Redirect::back()
			->withErrors($messages);
		}else{

			$user=User::find($id);
			$user->nombre=Input::get('nombre');
			$user->apellido=Input::get('apellido');
			$user->email=Input::get('email');
			$user->telefono=Input::get('telefono');

			$resultado=$user->save();

			if($resultado == true){
				return Redirect::to('dashboard')->with('success','los datos fueron actualizados!');
			}else{
				return Redirect::back()->with('error','los datos no pudieron ser modificados!');
			}
		}
	}

	public function eliminarUsuario($id){
		$user=User::find($id);
		$resultado=$user->delete();
			if($resultado){
				return Redirect::to('dashboard')->with('success','Los datos fueron eliminados correctamente');
			}else{
				return Redirect::back()->with('error','No se puedieron eliminar los datos!');
			}
	}

	public static function getAllUsuarios(){
		$users=DB::table('usuario')->get();
		return $users;
	}


	public function getOneUsuario($id){
		$user=User::find($id);
		// dd(is_null($user));
		if(is_null($user)){
			return View::make('error',['error'=>'La ruta especificada no existe']);
		}else{
			return View::make('vehiculo.verVehiculo',['usr'=>$user]);
		}
	}


}
