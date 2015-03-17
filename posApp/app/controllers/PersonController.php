<?php

class PersonController extends BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$persons = DB::table('person')
                    ->orderBy('last_name')                    
                    ->paginate(5);

		$this->layout->title = 'Mantenimiento';
		$this->layout->titulo = 'Lista de Personas';
		$this->layout->nest(
			'content',
			'persons.index',
			array(
				'persons' => $persons
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
		$this->layout->title = 'Mantenimiento';
		$this->layout->titulo = 'Agregar Persona';
		$this->layout->nest(
			'content',
			'persons.create',
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
		$nip = Input::get('nip');
	    $firstName = Input::get('firstName');
	    $lastName = Input::get('lastName');		

		$person = new Person();
		$person->nip = $nip;
		$person->first_name = $firstName;
		$person->last_name = $lastName;		
		$person->save();

		Session::flash('message', 'Registro guardado satisfactoriamente!');
		return Redirect::to('persons');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->layout->title = 'Mantenimiento';
		$this->layout->titulo = 'Detalle de Persona';
		$person = Person::find($id);
		$this->layout->nest(
			'content',
			'persons.show',
			array(
				'person' => $person
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
		$this->layout->title = 'Mantenimiento';
		$this->layout->titulo = 'Editar Persona';
		$person = Person::find($id);
		$this->layout->nest(
			'content',
			'persons.edit',
			array(
				'person' => $person
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
		$nip = Input::get('nip');
	    $firstName = Input::get('firstName');
	    $lastName = Input::get('lastName');		
		
		
		$person = Person::find($id);
		$person->nip = $nip;
		$person->first_name = $firstName;
		$person->last_name = $lastName;			
		$person->save();

		Session::flash('message', 'Registro actualizado satisfactoriamente!');
		return Redirect::to('persons');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$person = Person::find($id);
		$person->delete();
		Session::flash('message', 'Registro eliminado satisfactoriamente!');
		return Redirect::to('persons');
	}
	



}
