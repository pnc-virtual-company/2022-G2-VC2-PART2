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

    public function destroy($id)
    {
        return User::destroy($id);
    }

}
