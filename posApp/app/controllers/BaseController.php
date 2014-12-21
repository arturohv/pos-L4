<?php

class BaseController extends Controller {

	protected $layout = 'layouts.default';
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{

			$menus = DB::table('main_menu')					
					->where('is_visible', true)
                    ->orderBy('index')                    
                    ->get();
                   
			$this->layout = View::make($this->layout)->nest('menu', 'menus.view', array(
				'menus' => $menus
			));
			
		}
	}

	

}
