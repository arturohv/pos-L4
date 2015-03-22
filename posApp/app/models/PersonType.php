<?php

class PersonType extends Eloquent
{
    protected $table      = 'person_type';
    protected $fillable   = array('person_type_name');
    protected $guarded    = array('id');   
    
}