<?php

class Person extends Eloquent
{
    protected $table      = 'person';
    protected $fillable   = array('nip','first_name','last_name');
    protected $guarded    = array('id');
    public    $timestamps = false;

    public function user()
    {
        return $this->belongsTo('User', 'id', 'id');
    } 
}