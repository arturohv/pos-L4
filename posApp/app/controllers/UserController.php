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
        ->get();

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

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$persons = DB::table('person')
                    ->orderBy('last_name')                    
                    ->get();
        

		$this->layout->title = 'Seguridad';
		$this->layout->titulo = 'Seleccione Persona';
		$this->layout->nest(
			'content',
			'users.select',
			array(
					'persons' => $persons
				)
		);
	}


	public function select($id)
	{
		$this->layout->title = 'Seguridad';
		$this->layout->titulo = 'Crear Usuario';
		$person = Person::find($id);
		$this->layout->nest(
			'content',
			'users.create',
			array(
				'person' => $person
			)
		);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try{
			$id = Input::get('id');
			$user_name = Input::get('user_name');
		    $email = Input::get('email');
		    $password = Input::get('password');
		    $password = Hash::make($password);
			$is_active = Input::get('is_active');
			$is_admin = Input::get('is_admin');

			if (is_null($is_active)){
				$is_active = false;
			}

			if (is_null($is_admin)){
				$is_admin = false;
			}

			$user = new User();
			$user->id = $id;
			$user->user_name = $user_name;
			$user->email = $email;
			$user->password = $password;
			$user->is_active = $is_active;
			$user->is_admin = $is_admin;
			$user->save();
			Session::flash('message_info', 'Registro guardado satisfactoriamente!');
			

		} catch(Exception $e) {
			Session::flash('message_error', 'Error al guardar el registro: '. $e->getMessage());
		}
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
		$user = User::find($id);
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
