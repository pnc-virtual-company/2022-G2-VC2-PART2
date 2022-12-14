<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Mail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;


class StudentController extends Controller
{
    /**
     * get all students from the database with specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_all_students() {
        return Student::get();
    }
    public function get_students()
    {
        return Student::with(['users', 'comments', 'comments.teachers.users'])->get();
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
        $student->generation = $request->generation;
        $student->phone = $request->phone;
        $student->class = $request->class;
        $student->major = $request->major;
        $student->date_of_birth = $request->date_of_birth;
        $student->status = false;
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->role = 3;
        $user->save();
        $user->students()->save($student);
        return response()->json([
            'message' => 'success'
        ]);
    }
    public function get_student_by_user_id($id)
    {
        return Student::where("user_id", $id)->with('users')->get();
    }

    // ---------------------- get student spacefic id -----------------------
    public function get_student_by_id($id)
    {
        return Student::where("id", $id)->with('users')->get();;
    }
    public function update_student(Request $request, $id)
    {
        $student_id = $request->student_id;
        $student = Student::findOrFail($student_id);
        $student->generation = $request->generation;
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
            'message' => 'success'
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
        $delete = User::destroy($id);
        if ($delete) {
            return response()->json([
                'message' => 'success'
            ]);
        }
    }

    public function update_tutor(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->status = $request->status;
        $student->tutor = $request->tutor;
        $student->reasons = $request->reasons;
        $student->save();
        return response()->json([
            'message' => 'Status Updated successfully'
        ]);
    }
    public function update_status(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->status = $request->status;
        $student->save();
        return response()->json([
            'message' => 'Status Updated successfully'
        ]);
    }
    // get only student that teacher at to student_following_up list
    public function get_student_follwing_up()
    {
        return Student::with('users', 'comments')->where('status', '1')->paginate(10);
    }

    // get student to display in follow up list
    public function get_student_display_follow_up()
    {
        return Student::with('users')->paginate(5);
    }

    // display student list in teacher
    public function get_student_list(){
        return Student::with('users')->paginate(10);
    }
    public function import(Request $request){
        echo $request->file;
        Excel::import(new UsersImport, $request->file('file')->store('files'));
        return response()->json([
            'message' => 'import successfully'
        ]);
    }
    // update student image
    public function update_user_img(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $path = public_path('profile');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('profile');
        if ($file != null) {
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $fileName);
            $user->profile = asset('profile/' . $fileName);
            $user->save();
            return response()->json(["message" => "user update successfully"]);
        }
    }
}
