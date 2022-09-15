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
    public function get_students()
    {
        return Student::with('users')->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_student(Request $request)
    {
        $student = new Student();
        $student->batch = $request->batch;
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
    public function get_student_by_id($id)
    {
        return Student::where("user_id", $id)->with('users')->get();
    }
    public function update_student(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->batch = $request->batch;
        $student->phone = $request->phone;
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();
        $user->students()->save($student);
        return response()->json([
            'message' => 'Your Updated is successfully'
        ]);
    }
    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function delete_student($id)
    {
        return User::destroy($id);
    }
}
