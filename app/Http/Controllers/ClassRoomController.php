<?php

namespace App\Http\Controllers;

use App\Model\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  ClassRoom::all();
        return response()->json(['data'=>$data],200);
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
                'name' => 'required|string|max:50',
                
            ]);
            
            ClassRoom::create($data);
            return response()->json(["message"=>"Add ClassRoom successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ClassRoom  $ClassRoom
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d = ClassRoom::find($id);
        return $d;
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ClassRoom  $ClassRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $classRoom = ClassRoom::find($request->id);
        if(!$classRoom){
            return response()->json(["message"=>"ClassRoom Not Found"],404);
        }
        try{
            $data = $this->validate(request(), [
                'name' => 'required|string|max:50',
                
            ]);
            
            $classRoom->update($data);
            return response()->json(["message"=>"Add ClassRoom successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ClassRoom  $ClassRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $ClassRoom)
    {
        $ClassRoom = ClassRoom::find($request->id);
        if(!$ClassRoom){
            return response()->json(["message"=>"ClassRoom Not Found"],404);
        }
        $ClassRoom->delete();
        return response()->json(['message'=>"Successfully Deleted..."],200);
    }
}
