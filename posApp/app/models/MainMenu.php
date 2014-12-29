<?php

class MainMenu extends Eloquent
{
    protected $table      = 'main_menu';
    protected $fillable   = array('parent_id','url','name','description','is_visible','index');
    protected $guarded    = array('id');
    public    $timestamps = false;   	
}