<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\password_reset;
use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;


class ResetPasswordController extends Controller
{
    public function index()
    {
      return view('requestpassword');
    }

    public function requestreset(Request $request)
    {
      $user = User::where('email', $request->email)->first();
      
      if($user == null ){
        return redirect('/passwordreset')->with('status', 'User Tidak Ditemukan');
      }
      else
      {
        password_reset::where('email', $request->email)->delete();
        
        $token=Str::random(32);

        Mail::to($request->email)->send(new ResetPassword($token));
        if (Mail::failures()) {
          echo 'Mail not sent successfully.';
        } else {

          password_reset::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
          ]);

          return redirect('/')->with('status', 'Mohon cek Email Anda untuk melakukan reset Password!');
        }
          
      }


    }


    public function resetpassword($token)
    {
      $user = password_reset::where('token', $token)->first();  
      // dd($user);

      if($user == null ){
        return redirect('/passwordreset')->with('status', 'Token Tidak Ditemukan, request Token lainnya?');
      }
      else
      {
        return view('resetpassword', ['user' => $user]);
      } 
    }



    public function updatepassword(Request $request)
    {
      $request->validate([
        'password' => 'regex:/^[^\s]+(\s*[^\s]+)*$/|min:6|confirmed|required'
      ]);

      $token = password_reset::where('token', $request->tokenpassword)->first();
      
      $user = User::where('email', $token->email)->first();

      if($user == null ){
        return redirect('/')->with('status', 'User Tidak Ditemukan, mohon Melakukan Registrasi');
      }
      else
      {
        $password = $request->password;
        $newpassword = bcrypt($password);

        $request->merge(['password' => $newpassword]);

        $user->update([
          'password' =>$request->password,
        ]);

        password_reset::where('token', $request->tokenpassword)->delete();

        return redirect('/')->with('status', 'Anda Berhasil Melakukan Reset Password');
      }
      // dd($user);

    }
}
