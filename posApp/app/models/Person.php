<?php

class Person extends Eloquent
{
    protected $table      = 'person';
    protected $fillable   = array('person_type_id','nip','first_name','last_name');
    protected $guarded    = array('id');
    public    $timestamps = false;

    public function user()
    {
        return $this->belongsTo('User', 'id', 'id');
    }

    //return $this->hasOne('Phone', 'foreign_key', 'local_key');
    public function personType()
    {
        return $this->hasOne('PersonType','id','person_type_id');
    }
}