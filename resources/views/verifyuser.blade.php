
  
@extends('layout/mainlayout')

@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="main">
  <section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{asset('grupi/images/verify-notfound.jpg')}}" alt="sing up image"></figure>
            </div>

            <div class="signin-form">


              @if (session('verifyemail'))
                <h4 style="text-align:center;" class="mt-4">{{session('verifyemail')}}</h4>
                <a href="{{url('/reqverify')}}" style="font-weight:bold; font-size:20px; color:blue;" class="signup-image-link mt-5">Klik Disini Untuk Request Verifikasi</a>
              @endif


                         
            <div style="text-align:center; font-size:20px;"class="form-group form-button mt-5">
            <a href="{{url('/')}}">Login</a>
            /
            <a href="{{url('/register')}}">Register</a>
            </div>
            </div>
        </div>
    </div>
  </section>
</div>
          


@endsection
