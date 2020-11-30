<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historyplace extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'place_id' => 'required',
        'placeedited_at' => 'required',
    );
}
