<?php

namespace App\Http\Controllers;

use App\Model\AttendDate;
use Illuminate\Http\Request;

class AttendDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  AttendDate::all();
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
                'class_date'=> '',
                
            ]);
            
            AttendDate::create($data);
            return response()->json(["message"=>"Add AttendDate successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AttendDate  $AttendDate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AttendDate::find($id);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AttendDate  $AttendDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attendDate = AttendDate::find($request->id);
        if(!$attendDate){
            return response()->json(["message"=>"AttendDate Not Found"],404);
        }
        try{
            $data = $this->validate(request(), [
                'class_date'=> '',     
            ]);
            
            $attendDate->update($data);
            return response()->json(["message"=>"Add AttendDate successfuly","responce"=>$data],201);
        }catch(Exception $e){
            return response()->json(["message"=>"Somthing want to wrong on the server."],  $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AttendDate  $AttendDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendDate $AttendDate)
    {
        $AttendDate = AttendDate::find($request->id);
        if(!$AttendDate){
            return response()->json(["message"=>"AttendDate Not Found"],404);
        }
        $AttendDate->delete();
        return response()->json(['message'=>"Successfully Deleted..."],200);
    }
}
