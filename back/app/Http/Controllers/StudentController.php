<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    /**
     * get all students from the database with specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::with('users')->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->generation=$request->generation;
        $student->phone = $request->phone;
        $student->class = $request->class;
        $student->major = $request->major;
        $student->date_of_birth = $request->date_of_birth;
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->role = 3;
        $user->save();
        $user->students()->save($student);
        return response()->json([
            'message'=>'success'
        ]);
    }
    public function show($id)
    {
        return Student::where("user_id", $id)->with('users')->get();
    }


    public function updateStudent(Request $request,$id)
    {
        $student=Student::findOrFail($id);
        $student->generation=$request->generation;
        $student->phone = $request->phone;
        $student->class = $request->class;
        $student->major = $request->major;
        $student->date_of_birth = $request->date_of_birth;
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();
        $user->students()->save($student);
        return response()->json([
            'message'=>'success'
        ]);
    }
      /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::destroy($id);
        if ($delete){
            return response()->json([
                'message'=>'success'
            ]);
        }
    }
}
