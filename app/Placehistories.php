<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placehistories extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'place_id' => 'required',
        'placeedited_at' => 'required',
    );
}
