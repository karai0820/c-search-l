<?php

namespace App\Http\Controllers;

use App\Paddy;
use Illuminate\Http\Request;
use App\Http\Resources\Paddy AS PaddyResource;

class PaddyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PaddyResource::collection(Paddy::all());
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
    $paddy = new Paddy;
    $paddy->compound_id = $request->input('compound_id');
    $paddy->method_id = $request->input('method_id');
    $paddy->mode_of_action = $request->input('mode_of_action');
    $paddy->ECHCG = $request->input('ECHCG');
    $paddy->ORYSP_1 = $request->input('ORYSP_1');
    $paddy->ORYSP_3 = $request->input('ORYSP_3');
    $paddy->symptom = $request->input('symptom');
    $paddy->comment = $request->input('comment');
    $paddy->author = $request->input('author');
    $paddy->updater = $request->input('updater');
    $paddy->created_at = $request->input('created_at');
    $paddy->updated_at = $request->input('updated_at');
    $paddy->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paddy  $paddy
     * @return \Illuminate\Http\Response
     */
    public function show(Paddy $paddy)
    {
         return new PaddyResource($paddy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paddy  $paddy
     * @return \Illuminate\Http\Response
     */
    public function edit(Paddy $paddy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paddy  $paddy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paddy $paddy)
    {
    $paddy->compound_id = $request->input('compound_id','');
    $paddy->method_id = $request->input('method_id','');
    $paddy->mode_of_action = $request->input('mode_of_action','');
    $paddy->ECHCG = $request->input('ECHCG','');
    $paddy->ORYSP_1 = $request->input('ORYSP_1','');
    $paddy->ORYSP_3 = $request->input('ORYSP_3','');
    $paddy->symptom = $request->input('symptom','');
    $paddy->comment = $request->input('comment','');
    $paddy->author = $request->input('author','');
    $paddy->updater = $request->input('updater','');
    $paddy->created_at = $request->input('created_at','');
    $paddy->updated_at = $request->input('updated_at','');
    $paddy->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paddy  $paddy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paddy $paddy)
    {
        $paddy->delete();
    }
}
