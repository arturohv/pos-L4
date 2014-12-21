<?php

class MainMenu extends Eloquent
{
    protected $table      = 'main_menu';
    protected $fillable   = array('parent_id','url','name','description','is_visible','index');
    protected $guarded    = array('id');
    public    $timestamps = false;

   	public static function getCmbList(){
		$objetos = DB::table('main_menu')->select('id', 'name')->orderBy('index')->get();
		$lstobjectos = array();
		
		foreach ($objetos as $objecto)
		{
		     $lstobjectos[$objecto->id] = $objecto->name;
		}

		return $lstobjectos;
	}
}