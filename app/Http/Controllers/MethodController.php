<?php

namespace App\Http\Controllers;

use App\Method;
use Illuminate\Http\Request;
use App\Http\Resources\Method AS MethodResource;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MethodResource::collection(Method::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $method = new Method;
    $method->compound_id = $request->input('compound_id');
    $method->test_area = $request->input('test_area');
    $method->test_title = $request->input('test_title');
    $method->test_day = $request->input('test_day');
    $method->test_scale = $request->input('test_scale');
    $method->concentration = $request->input('concentration');
    $method->conc_unit = $request->input('conc_unit');
    $method->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        return new MethodResource($method);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Method $method)
    {
    $method->compound_id = $request->input('compound_id','');
    $method->test_area = $request->input('test_area','');
    $method->test_title = $request->input('test_title','');
    $method->test_day = $request->input('test_day','');
    $method->test_scale = $request->input('test_scale','');
    $method->concentration = $request->input('concentration','');
    $method->conc_unit = $request->input('conc_unit','');
    $method->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        $method->delete();
    }
}
