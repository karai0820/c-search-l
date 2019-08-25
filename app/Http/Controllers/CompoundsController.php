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
    public function index()//GET(/aaa)
    {
        return CompoundsResource::collection(Compounds::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//GET(/aaa/create)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 保存//POST(/aaa)
    public function store(Request $request) {
    $compound = new Compounds;
    $form = $request->all();

    $compound->fill($form)->save();
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Compounds  $compounds
     * @return \Illuminate\Http\Response
     */
    // １データ表示 GET(/aaa/{photo})
    public function show(Compounds $Compounds) {
    return new CompoundsResource($compounds);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compounds  $compounds
     * @return \Illuminate\Http\Response
     */
    public function edit(Compounds $compounds)//GET(/aaa/{photo}/edit)
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
    // 更新//PUT/Patch(/aaa/{photo})
    public function update(Request $request, Compounds $compounds) {
    $compound = Compounds::find($request->id);
    $edit_form = $request->all();
    $compound->fill($edit_form)->save();

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compounds  $compounds
     * @return \Illuminate\Http\Response
     */
    
    // 削除//DELETE(/aaa/{photo})
    public function destroy(Request $request, Compounds $compounds) {
    $compound = Compounds::find($request->id);
    $compound->delete();
   
}
}