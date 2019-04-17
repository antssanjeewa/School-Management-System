<?php

namespace App\Http\Controllers;

use App\Model\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Teacher::all();
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
                'b_day'=> '',
                'gender'=> '',
                'address'=> '',
                'contact_number'=> ''
            ]);
            
            Teacher::create($data);
            return response()->json(["message"=>"Add Teacher successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Teacher::find($id);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $teacher = Teacher::find($request->id);
        if(!$teacher){
            return response()->json(["message"=>"Teacher Not Found"],404);
        }
        try{
            $data = $this->validate(request(), [
                'name' => 'required|string|max:50',
                'b_day'=> '',
                'gender'=> '',
                'address'=> '',
                'contact_number'=> ''
            ]);
            
            $teacher->update($data);
            return response()->json(["message"=>"Add Teacher successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $Teacher)
    {
        $Teacher = Teacher::find($request->id);
        if(!$Teacher){
            return response()->json(["message"=>"Teacher Not Found"],404);
        }
        $Teacher->delete();
        return response()->json(['message'=>"Successfully Deleted..."],200);
    }
}
