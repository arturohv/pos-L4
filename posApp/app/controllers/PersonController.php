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
                    
                    ->get();

		$this->layout->title = 'Mantenimiento';
		$this->layout->titulo = 'Personas';
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
		$personTypes = PersonType::lists('person_type_name', 'id');

		$this->layout->title = 'Mantenimiento';
		$this->layout->titulo = 'Personas';
		$this->layout->nest(
			'content',
			'persons.create',
			array(
				'personTypes' => $personTypes
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
		$personType = Input::get('personType');
		$nip = Input::get('nip');
	    $firstName = Input::get('firstName');
	    $lastName = Input::get('lastName');		

		$person = new Person();
		$person->nip = $nip;
		$person->person_type_id = $personType;
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
		$this->layout->titulo = 'Personas';
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
		$personTypes = PersonType::lists('person_type_name', 'id');

		$this->layout->title = 'Mantenimiento';
		$this->layout->titulo = 'Personas';
		$person = Person::find($id);
		$this->layout->nest(
			'content',
			'persons.edit',
			array(
				'person' => $person,
				'personTypes' => $personTypes
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
		$personType = Input::get('personType');
		$nip = Input::get('nip');
	    $firstName = Input::get('firstName');
	    $lastName = Input::get('lastName');		
		
		
		$person = Person::find($id);
		$person->nip = $nip;
		$person->person_type_id = $personType;
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
