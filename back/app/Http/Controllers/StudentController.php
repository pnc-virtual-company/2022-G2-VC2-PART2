<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
        $new_student = new Student();
        $new_student->first_name = $request->first_name;
        $new_student->last_name = $request->last_name;
        $new_student->batch = $request->batch;
        $new_student->email = $request->email;
        $new_student->gender = $request->gender;
        $new_student->phone = $request->phone;
        $new_student->save();
        return response()->json($new_student);
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
