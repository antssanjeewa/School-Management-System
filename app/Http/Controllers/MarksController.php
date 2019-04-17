<?php

namespace App\Http\Controllers;

use App\Model\Marks;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Marks::all();
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
                'child_id'=> '',
                'subject_id' => '',
                'teacher_id'=> '',
                'class_id'=> '',
                'marks'=> ''
            ]);
            
            Marks::create($data);
            return response()->json(["message"=>"Add Marks successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Marks  $Marks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Marks::find($id);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Marks  $Marks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $marks = Marks::find($request->id);
        if(!$marks){
            return response()->json(["message"=>"Marks Not Found"],404);
        }
        try{
            $data = $this->validate(request(), [
                'child_id'=> '',
                'subject_id' => '',
                'teacher_id'=> '',
                'class_id'=> '',
                'marks'=> ''
            ]);
            
            $marks->update($data);
            return response()->json(["message"=>"Add Marks successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Marks  $Marks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marks $Marks)
    {
        $Marks = Marks::find($request->id);
        if(!$Marks){
            return response()->json(["message"=>"Marks Not Found"],404);
        }
        $Marks->delete();
        return response()->json(['message'=>"Successfully Deleted..."],200);
    }
}
