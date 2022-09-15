<?php
namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
class TeacherController extends Controller
{
    public function index()
    {
        return Teacher::with('users')->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $teacher = new Teacher();
        $teacher->position = $request->position;
        $teacher->phone=$request->phone;
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->role = 2;
        $user->save();
        $user->teachers()->save($teacher);
        return "Create successfully";
    }
    // find teacher by id
    public function show($id)
    {
        return Teacher::where("user_id", $id)->with('users')->get();
    }
    public function destroy($id)
    {
        return User::destroy($id);
    }
    
    public function update_teacher(Request $request, $id){
        $teacher_id = $request->teacher_id;
        $teacher = Teacher::findOrFail($teacher_id);
        $teacher->position = $request->position;
        $teacher->phone = $request->phone;
        $user =  User::FindOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();
        $user->teachers()->save($teacher);
        return response()->json([
            'message' => 'Successfully'
        ]);
    }
}
