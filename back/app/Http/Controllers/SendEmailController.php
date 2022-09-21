<?php

namespace App\Http\Controllers;
use App\Models\CodeGenerater;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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
            Mail::send('Emails.SendMail', $data, function ($message) use($email) {
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

    public function confirm_code(Request $request){
        $code = CodeGenerater::where('id',$request->code_id)->first();
        if (Hash::check($request->code, $code->user_code)) {
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        };
    }

    public function update_password(Request $request, $id){
        $student = User::find($id);
        if ($request->password === $request->pass_confirm){
            $student->password = bcrypt($request->password);
            $student->save();
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        }
    }
    // send mail to student
    public function send_mail(Request $request)

    {
        $user = User::where('email', $request->email);
        if($user) {
            $data = array('name' => $request->first_name);
            Mail::send('Emails.SendMessage', $data, function ($message) {
                $message->from('sfu@passerellesnumeriques.org', "SFU");
                $message->to('sopha.rathwep2022@gmail.com')->subject('Message:');
            });

            return 'Email sent Successfully';
        }

    }

    // -------- reset password ---------------
    public function reset_password(Request $request,$id) {
        $user = User::findOrFail($id);
        if (count($user) > 0) {
            if (Hash::check($user->password, $request->old_password)) {
                if ($request->password === $request->pass_confirm){
                    $user->password = bcrypt($request->password);
                    $user->save();
                    return response()->json(['success' => true]);
                }
            }
        }
    }
}
