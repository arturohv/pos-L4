<?php

class MainMenu extends Eloquent
{
    protected $table      = 'main_menu';
    protected $fillable   = array('parent_id','url','name','description','is_visible','index');
    protected $guarded    = array('id');
    public    $timestamps = false;

    public static function getMenuList()
	{
		$sql = 'select mn.id, mn.parent_id, mn.url, mn.name, 
			(Select mnp.name from main_menu mnp where mnp.id = mn.parent_id) as parent_name, mn.index,
			(Select count(id) from main_menu mnc where mn.id = mnc.parent_id) as num_children
			from main_menu mn order by index';
			
		return DB::select($sql);
	}

	public static function getMenuView()
	{
		$sql = 'select mn.id, mn.parent_id, mn.url, mn.name, 
			(Select mnp.name from main_menu mnp where mnp.id = mn.parent_id) as parent_name, mn.index,
			(Select count(id) from main_menu mnc where mn.id = mnc.parent_id) as num_children
			from main_menu mn 
			where is_visible = true order by index';
			
		return DB::select($sql);
	}   	   	
}