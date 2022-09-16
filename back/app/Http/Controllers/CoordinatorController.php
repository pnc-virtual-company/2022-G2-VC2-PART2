<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    public function create_coordinator(Request $request)
    {
        //
        $coordinator = new Coordinator();
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->role = 1;
        $user->save();
        $user->coordinators()->save($coordinator);
        return "Create successfully";
    }
}
