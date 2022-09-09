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
}
