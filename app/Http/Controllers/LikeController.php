<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Http\Resources\Like AS LikeResource;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LikeResource::collection(Like::all());
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
    $like = new Like;
    $like->user_id = $request->input('user_id');
    $like->compound_id = $request->input('compound_id');
    $like->created_at = $request->input('created_at');
    $like->updated_at = $request->input('updated_at');
    $like->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        return new LikeResource($like);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
    $like->user_id = $request->input('user_id','');
    $like->compound_id = $request->input('dompound_id','');
    $like->created_at = $request->input('created_at','');
    $like->updated_at = $request->input('updated_at','');

    $like->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
         $like->delete();
    }
}
