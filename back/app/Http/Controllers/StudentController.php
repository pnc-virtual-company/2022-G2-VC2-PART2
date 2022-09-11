<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->batch=$request->batch;
        $student->phone = $request->phone;
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();
        $user->students()->save($student);
        return "Create successfully";       

    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Student::destroy($id);
    }
    
    public function update(Request $request,$id)
    {
        $student=Student::findOrFail($id);
        $student->first_name =$request->first_name;
        $student->last_name =$request->last_name;
        $student->batch =$request->batch;
        $student->email =$request->email;
        $student->gender =$request->gender;
        $student->phone =$request->phone;
        $student->save();
        return response()->json([
            'message'=>'Your Updated is successfully'
        ]);
    }
}
