<?php

class MainMenuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $titulo_text = 'Seguridad';

	public function index()
	{		
		/*$menus = DB::table('main_menu')
					->where('parent_id',null)					
                    ->orderBy('index')
                    ->paginate(5);*/
		
		$data = MainMenu::getMenuList();

		$perPage = 5;
		$total = count($data);
		$start = (Paginator::getCurrentPage() - 1) * $perPage;
		$sliced = array_slice($data, $start, $perPage);
		// Create a paginator instance.
		$menus = Paginator::make($sliced, $total, $perPage);
             
		$this->layout->title = 'Lista de Menu';
		$this->layout->titulo = $this->titulo_text;
		$this->layout->nest(
			'content',
			'menus.index',
			array(
				'menus' => $menus
			)
		);
	}

	public function subIndex($id)
	{		
		$menus = DB::table('main_menu')
					->where('parent_id',$id)
                    ->orderBy('index')                    
                    ->paginate(5); 

        $parent = MainMenu::find($id);     
              
		$this->layout->title = 'Lista de Menu';
		$this->layout->titulo = $this->titulo_text;
		$this->layout->nest(
			'content',
			'menus.subIndex',
			array(
				'menus' => $menus,
				'parentId' => $id,
				'parent' => $parent
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
		$this->layout->title = 'Nuevo Elemento';
		$this->layout->titulo = $this->titulo_text;;
		$this->layout->nest(
			'content',
			'menus.create'			
		);
	}

	public function createSubMenu($id)
	{
		$subMenu = DB::table('main_menu')
					->where('id',$id)                                     
                    ->get();                   

		$this->layout->title = 'Nuevo Elemento';
		$this->layout->titulo = $this->titulo_text;;
		$this->layout->nest(
			'content',
			'menus.createSubMenu',
			array(
				'subMenu' => $subMenu
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
		$parent_id = Input::get('parent_id');
		$url = Input::get('url');
		$name = Input::get('name');	
		$description = Input::get('description');	
		$is_visible = Input::get('is_visible');	
		$index = Input::get('index');	

		$menu = new MainMenu();
		$menu->parent_id = $parent_id;
		$menu->url = $url;
		$menu->name = $name;
		$menu->description = $description;
		$menu->is_visible = $is_visible;
		$menu->index = $index;
		$menu->save();
		Session::flash('message', 'Registro guardado satisfactoriamente!');
		return Redirect::to('menus');
	}


	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->layout->title = 'Editar Elemento';
		$this->layout->titulo = $this->titulo_text;;
		$menu = MainMenu::find($id);
		$this->layout->nest(
			'content',
			'menus.edit',
			array(
				'menu' => $menu
			)
		);
	}

	public function editSubMenu($id)
	{
		$this->layout->title = 'Editar Elemento';
		$this->layout->titulo = $this->titulo_text;;
		$menu = MainMenu::find($id);
		$this->layout->nest(
			'content',
			'menus.editSubMenu',
			array(
				'menu' => $menu
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
		$parent_id = Input::get('parent_id');
		$url = Input::get('url');
		$name = Input::get('name');	
		$description = Input::get('description');	
		$is_visible = Input::get('is_visible');	
		$index = Input::get('index');	
		
		$menu = MainMenu::find($id);
		$menu->parent_id = $parent_id;
		$menu->url = $url;
		$menu->name = $name;
		$menu->description = $description;
		$menu->is_visible = $is_visible;
		$menu->index = $index;
		$menu->save();
		Session::flash('message', 'Registro actualizado satisfactoriamente!');
		return Redirect::to('menus');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$menu = MainMenu::find($id);
		$menu->delete();
		Session::flash('message', 'Registro eliminado satisfactoriamente!');
		return Redirect::to('menus');
	}


}
