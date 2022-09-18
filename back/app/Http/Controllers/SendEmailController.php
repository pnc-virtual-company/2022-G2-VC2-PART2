<?php

namespace App\Http\Controllers;
use App\Models\CodeGenerater;
use App\Models\User;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    public function forgot_password(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if ($user->email == $request->email) {
            $email = $request->email;
            $code = random_int(100000, 999999);
            $user_code = new CodeGenerater();
            $data = array('name' => $request->first_name, 'message' => 'Here is your verification code', 'code' => $code);
            Mail::send('Emails.SendMail', $data, function ($message) use ($email) {
                $message->from('sfu@passerellesnumeriques.org', "SFU");
                $message->to($email)->subject('Verification code');
            });
            $user_code->user_code = bcrypt($code);
            $user_code->user_id = $user->id;
            $user_code->save();
            $response = [
                'success'=> true,
                'user_id' => $user->id,
                'code_id' => $user_code->id,
            ];
            return response()->json($response);
        } else {
            return response()->json(['message' => 'user not found']);
        }
    }

    public function confirm_code(Request $request, $id){
        $code = CodeGenerater::where('id', $id)->first();
        if (Hash::check($request->code, $code->user_code)) {
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        };
    }

    public function update_password(Request $request, $id){
        $student = User::find($id);
        if ($request->password === $request->confirm_password){
            $student->password = bcrypt($request->password);
            $student->save();
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        }
    }
}