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
        $newStudent = new Student();
        $newStudent->first_name = $request->first_name;
        $newStudent->last_name = $request->last_name;
        $newStudent->batch = $request->batch;
        $newStudent->email = $request->email;
        $newStudent->gender = $request->gender;
        $newStudent->phone = $request->phone;
        $newStudent->save();
        return response()->json($newStudent);
    }
}
