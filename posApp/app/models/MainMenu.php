<?php

class MainMenu extends Eloquent
{
    protected $table      = 'main_menu';
    protected $fillable   = array('parent_id','url','name','description','is_visible');
    protected $guarded    = array('id');
    public    $timestamps = false;

    public function parent() {
        return $this->hasOne('main_menu', 'id', 'parent_id');
    }

    public function children() {
        return $this->hasMany('main_menu', 'parent_id', 'id');
    }  

    public static function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', NULL)->get();
    }
}