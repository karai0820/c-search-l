<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = array('id');

    public static $rules =array(  
        'user_id' => 'required',
        'compound_id' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    );
}
