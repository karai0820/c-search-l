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
    public function paddies(){
        return $this->hasMany('App\Paddy');
    public function uplands(){
        return $this->hasMany('App\Upland');
}
}
