<?php

namespace App\Http\Controllers;

use App\Model\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Subject::all();
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
                'teacher_id'=> ''
            ]);
            
            Subject::create($data);
            return response()->json(["message"=>"Add Subject successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Subject  $Subject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Subject::find($id);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Subject  $Subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Subject = Subject::find($request->id);
        if(!$Subject){
            return response()->json(["message"=>"Subject Not Found"],404);
        }
        try{
            $data = $this->validate(request(), [
                'name' => 'required|string|max:50',
                'teacher_id'=> ''
            ]);
            
            Subject::update($data);
            return response()->json(["message"=>"Add Subject successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Subject  $Subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $Subject)
    {
        $Subject = Subject::find($request->id);
        if(!$Subject){
            return response()->json(["message"=>"Subject Not Found"],404);
        }
        $Subject->delete();
        return response()->json(['message'=>"Successfully Deleted..."],200);
    }
}
