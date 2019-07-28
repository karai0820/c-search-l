<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upland extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
    	'compound_id' => 'required',
        'method_id' => 'required',
        'author' => 'required',
        'updater' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'

        );
}
