<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
    	'compound_id' => 'required',
        'test_area' => 'required',
        'test_title' => 'required'
        'test_day' => 'required',
        'test_scale' => 'required',
        'concentration' => 'required'
        'conc_unit' => 'required',
 
    );
}
