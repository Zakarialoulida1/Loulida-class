<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class ForgetPasswordmanager extends Controller
{
    public function create()
    {
        return view('auth.forgot-password');
    }


    public function store(Request $request) 
    {
        $request->validate([
            'email' => ['required', 'email'],
           
            
        ]);


        DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->delete();


        $token =Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);
        Mail::send('email.forget-password',['token'=>$token],function($message)use($request){
            $message->to($request->email);
            $message->subject("Reset password");
        } );
        return redirect()->to(route('password.request'))->with('success','we have send a message to reset your password');
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
 }
 public function resetPassword($token){
    return view("auth.new-password",compact('token'));
 }
 public function resetPasswordStore(Request $request){
    

$request->validate([
    'email'=> 'required|email|exists:users',
    'password'=>"required|string|min:6|confirmed",
    'password_confirmation'=> 'required',
]);
$updatePassword=DB::table('password_reset_tokens')->where([
    'email'=>$request->email,
    'token'=>$request->token,
            
]);


if(!($updatePassword)){
      return view('auth.forgot-password')->with('error', 'the time to reset your password is done insert your email  ');   
}
User::where('email',$request->email)->update(['password'=>Hash::make($request->password)]);
DB::table('password_reset_tokens')->where([
    'email'=>$request->email,])->delete();
return  to_route('login')->with('success','password reset success');
 }
}
