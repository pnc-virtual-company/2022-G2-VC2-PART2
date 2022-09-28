<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class LoginController extends Controller
{
    public function userLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        //check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => false]);
        }
        $token = $user->createToken('myToken')->plainTextToken;
        return response()->json(['token' => $token, 'message' => 'success', 'user' => $user], 200);
    }
}
