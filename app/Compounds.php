<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compounds extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
    	'compound_name' => 'required|unique:post',
        'structure' => 'required|unique:post',
        'chemist' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
);
}
