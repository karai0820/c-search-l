<?php

namespace App\Http\Controllers;

use App\Upland;
use Illuminate\Http\Request;
use App\Http\Resources\Upland AS UplandResource;

class UplandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UplandResource::collection(Upland::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $upland = new Upland;
    $upland->compound_id = $request->input('compound_id');
    $upland->method_id = $request->input('method_id');
    $upland->mode_of_action = $request->input('mode_of_action');
    $upland->ECHUT = $request->input('ECHUT');
    $upland->DIGAD = $request->input('DIGAD');
    $upland->ZEAMD = $request->input('ZEAMD');
    $upland->TRZAX = $request->input('TRZAX');
    $upland->symptom = $request->input('symptom');
    $upland->comment = $request->input('comment');
    $upland->author = $request->input('author');
    $upland->updater = $request->input('updater');
    $upland->created_at = $request->input('created_at');
    $upland->updated_at = $request->input('updated_at');
    $upland->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Upland  $upland
     * @return \Illuminate\Http\Response
     */
    public function show(Upland $upland)
    {
        return new UplandResource($upland);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Upland  $upland
     * @return \Illuminate\Http\Response
     */
    public function edit(Upland $upland)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upland  $upland
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upland $upland)
    {
    $upland->compound_id = $request->input('compound_id','');
    $upland->method_id = $request->input('method_id','');
    $upland->mode_of_action = $request->input('mode_of_action','');
    $upland->ECHUT = $request->input('ECHUT','');
    $upland->DIGAD = $request->input('DIGAD','');
    $upland->ZEAMD = $request->input('ZEAMD','');
    $upland->TRZAX = $request->input('TRZAX','');
    $upland->symptom = $request->input('symptom','');
    $upland->comment = $request->input('comment','');
    $upland->author = $request->input('author','');
    $upland->updater = $request->input('updater','');
    $upland->created_at = $request->input('created_at','');
    $upland->updated_at = $request->input('updated_at','');
    $upland->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Upland  $upland
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upland $upland)
    {
        $upland->delete();
    }
}
