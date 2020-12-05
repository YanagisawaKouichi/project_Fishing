<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    protected $guarded = array('id');
    //
    
    public static $rules = array(
        'name' => 'required',
        'body' => 'required',
        
        );
        
    public function histories()
    {
        return $this->hasMany('App\History');
    }
    
    public function places()
    {
      return $this->hasMany('App\Place');

    }
}
