
  
@extends('layout/mainlayout')

@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="main">
  <section class="signup">
    <div class="container">      
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" action="/" class="register-form" id="register-form">
                @csrf
                <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" class="@error('name') is-invalid @enderror" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}">
                        @error ('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" class="@error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}">
                        @error ('email')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" class="@error('password') is-invalid @enderror" name="password" id="pass" placeholder="Password" >
                        @error ('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat your password">
                    </div>
                    <!-- <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div> -->
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{asset('grupi/images/signup-image.jpg')}}" alt="sing up image"></figure>
                <a href="{{url('/')}}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
  </section>
</div>
          


@endsection
