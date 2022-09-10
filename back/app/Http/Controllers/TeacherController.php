<?php
namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
class TeacherController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $teacher= new Teacher();
        $teacher->first_name =$request->first_name;
        $teacher->last_name= $request->last_name;
        $teacher->gender=$request->gender;
        $teacher->position=$request->position;
        $teacher->email =$request->email;
        $teacher->save();
        return response()->json([
            'Your created is successfully'
        ]);
    }

}
