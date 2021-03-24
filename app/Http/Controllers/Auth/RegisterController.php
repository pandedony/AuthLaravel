<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
      return view('register');
    }

    public function userregister(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'regex:/^[^\s]+(\s*[^\s]+)*$/|min:6|confirmed|required'
      ]);


      $user = User::where('email', $request->email)->first();

      if($user == null ){
        $date = new DateTime('+30 minutes');
        $exptoken= $date->format('Y-m-d H:i:s');
        
        $password = $request->password;
        $newpassword = bcrypt($password);
        
        $token=Str::random(32);
        
        
        
        Mail::to($request->email)->send(new VerificationMail($token));
      }
      else
      {
        return redirect('/register')->with('status', 'Email Sudah Digunakan!');

      }
      if (Mail::failures()) {
        echo 'Mail not sent successfully.';
      } else {

      $request->merge(['password' => $newpassword]);
      $request->merge(['verification_token' => $token]);
      $request->merge(['expired_token' => $exptoken]);

      User::create($request->all());

      return redirect('/')->with('status', 'Please check your email to activate your account!');
    } 
    // return redirect('/')->with('status', 'Please check your email to activate your account!');
    }
}
