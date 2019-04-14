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
        $childs =  Children::all();
        return response()->json(['data'=>$childs],200);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $this->validate(request(), [
                'reg_number'=> '',
                'name' => 'required|string|max:50',
                'b_day'=> '',
                'gender'=> '',
                'address'=> '',
                'parent_name'=> '',
                'contact_number'=> ''
            ]);
            
            Children::create($data);
            return response()->json(["message"=>"Add Children successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
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
    public function update(Request $request)
    {
        $children = Children::find($request->id);
        if(!$children){
            return response()->json(["message"=>"Children Not Found"],404);
        }
        try{
            $data = $this->validate(request(), [
                'reg_number'=> '',
                'name' => 'required|string|max:50',
                'b_day'=> '',
                'gender'=> '',
                'address'=> '',
                'parent_name'=> '',
                'contact_number'=> ''
            ]);
            
            Children::update($data);
            return response()->json(["message"=>"Add Children successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function destroy(Children $children)
    {
        $children = Children::find($request->id);
        if(!$children){
            return response()->json(["message"=>"Children Not Found"],404);
        }
        $children->delete();
        return response()->json(['message'=>"Successfully Deleted..."],200);
    }
}
