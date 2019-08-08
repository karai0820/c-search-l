<?php

namespace App\Http\Controllers;

use App\Compounds;
use Illuminate\Http\Request;
use App\Http\Resources\Compounds AS CompoundsResource;

class CompoundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompoundsResource::collection(Compounds::all());

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
    // 保存
    public function store(Request $request) {
    $compound = new Compounds;
    $compound->compound_name = $request->input('compound_name');
    $compound->structure = $request->input('structure');
    $compound->chemist = $request->input('chemist');

    $compound->save();
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Compounds  $compounds
     * @return \Illuminate\Http\Response
     */
    // １データ表示
    public function show(Compounds $Compounds) {
    return new CompoundsResource($compounds);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compounds  $compounds
     * @return \Illuminate\Http\Response
     */
    public function edit(Compounds $compounds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compounds  $compounds
     * @return \Illuminate\Http\Response
     */
    // 更新
    public function update(Request $request, Compounds $compounds) {
    $compounds->compound_name = $request->compound_name;
    $compounds->structure = $request->structure;
    $compounds->chemist = $request->chemist;

    $compounds->save();
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compounds  $compounds
     * @return \Illuminate\Http\Response
     */
    
    // 削除
    public function destroy(Compounds $compounds) {
    $compounds->delete();
}
}