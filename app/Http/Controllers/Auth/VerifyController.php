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

class VerifyController extends Controller
{
    public function index()
    {
      return view('verifyuser');
    }
    public function VerifyEmail($token)
    {
      
      $user = User::where('verification_token', $token)->first();  

      if($user == null ){
        return redirect('/verify')->with('verifyemail', 'Token Tidak Ditemukan');
      }

      $exptoken=strtotime($user->expired_token);
      $datenow=strtotime(Carbon::now());
      // dd($exptoken);
      if($exptoken < $datenow)
      {
        return redirect('/verify')->with('verifyemail', 'Token Expired');
      }
      else{

      $user->update([
        'verification' => 1,
        'verification_token' =>'',
        'email_verified_at' => Carbon::now(),
        'expired_token' => null,
      ]);
      
      return redirect('/')->with('status', 'Selamat, akun anda telah aktif');

      }
    }

    public function home()
    {
      return view('requestverify');
    }

    public function reqverify(Request $request)
    {
      $user = User::where('email', $request->email)->first();  
      if($user == null ){
        return redirect('/reqverify')->with('status', 'User Tidak Ditemukan');

      }
      // dd($user->verification);
      if($user->verification == '1')
      {
        return redirect('/')->with('status', 'User Telah Terverifikasi, Silahkan Login!');
      }
      else
      {
        $date = new DateTime('+30 minutes');
        $exptoken= $date->format('Y-m-d H:i:s');
        $token=Str::random(32);
        
        Mail::to($user->email)->send(new VerificationMail($token));
        if (Mail::failures()) {
          echo 'Mail not sent successfully.';
        } else {
        $user->update([
          'verification_token' =>$token,
          'expired_token' => $exptoken,
        ]);

        return redirect('/')->with('status', 'Please check your email to activate your account!');
        }
      }
    }
}
