<?php

class UserController extends BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		/*$users = DB::table('user')
                    ->orderBy('user_name')                    
                    ->paginate(5);*/

        $users = User::with('person')
		->orderBy('user_name')
        ->paginate(5);

		$this->layout->title = 'Seguridad';
		$this->layout->titulo = 'Lista Usuarios';
		$this->layout->nest(
			'content',
			'users.index',
			array(
				'users' => $users
			)
		);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'Seguridad';
		$this->layout->titulo = 'Agregar Usuario';
		$this->layout->nest(
			'content',
			'users.create',
			array()
		);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user_name = Input::get('user_name');
	    $email = Input::get('email');
	    $password = Input::get('password');
		$is_active = Input::get('is_active');
		$is_admin = Input::get('is_admin');

		$user = new User();
		$user->user_name = $user_name;
		$user->email = $email;
		$user->password = $password;
		$user->is_active = $is_active;
		$user->is_admin = $is_admin;
		$user->save();

		Session::flash('message', 'Registro guardado satisfactoriamente!');
		return Redirect::to('users');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->layout->title = 'Seguridad';
		$this->layout->titulo = 'Detalle de Usuario';
		$user = Usuario::find($id);
		$this->layout->nest(
			'content',
			'users.show',
			array(
				'user' => $user
			)
		);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->layout->title = 'Seguridad';
		$this->layout->titulo = 'Editar Usuario';
		$user = User::find($id);
		$this->layout->nest(
			'content',
			'users.edit',
			array(
				'user' => $user
			)
		);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user_name = Input::get('user_name');
	    $email = Input::get('email');	    
		$is_active = Input::get('is_active');
		$is_admin = Input::get('is_admin');
		
		$user->user_name = $user_name;
		$user->email = $email;		
		$user->is_active = $is_active;
		$user->is_admin = $is_admin;
		$user = User::find($id);		
		$user->save();

		Session::flash('message', 'Registro actualizado satisfactoriamente!');
		return Redirect::to('users');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		Session::flash('message', 'Registro eliminado satisfactoriamente!');
		return Redirect::to('users');
	}
	



}
