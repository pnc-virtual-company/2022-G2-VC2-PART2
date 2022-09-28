<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    public function get_coordinator_first($id)
    {
        return User::where("id", $id)->first();
    }
}
