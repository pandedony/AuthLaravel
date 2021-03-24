<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
  public function index()
  {
    return view('login');
  }

  public function login(Request $request)
  {
    $input = $request->all();
    request()->validate
    ([
      'username' => 'required',
      'password' => 'required',
    ]);
    
    // $login = $request->only('username', 'password');
    
    $useremail = User::where('email', $request->username)->first();
      
    // dd($useremail);
    if($useremail == null ){
      return redirect('/')->with('status', 'User Tidak Ditemukan');
    }
    else
    {
      if($useremail->verification == '0')
      {
        return redirect('/')->with('status', 'Akun Belum terverifikasi');
      }
      else
      {
    $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))){
      $user = Auth::user();
      if ($user->level =='admin')
      {
          return redirect()->intended('admin');
      }
      else if ($user->level =='user')
      {
          return redirect()->intended('user');
      }
      return redirect()->intended('/');
    }

    return redirect('/')->with('status', 'Username / Password salah');
    }
    }
  }

  public function logout(Request $request)
  {
      $request->session()->flush();
      Auth::logout();
      return Redirect('/');
  }
}
