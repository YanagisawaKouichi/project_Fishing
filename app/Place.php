<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = array('id');
    
    // 以下を追記
    public static $rules = array(
        'name' => 'required',
        'body' => 'required',
        
    );
    
    public function placehistories()
    {
      return $this->hasMany('App\Historyplace');

    }
}
