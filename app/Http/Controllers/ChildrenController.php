<?php

namespace App\Http\Controllers;

use App\Model\Children;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Children::all();
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Children::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Children::find($id);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Children $children)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function destroy(Children $children)
    {
        //
    }
}