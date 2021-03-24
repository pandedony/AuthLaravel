
  
@extends('layout/mainlayout')

@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="main">
  <section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{asset('grupi/images/signin-image.jpg')}}" alt="sing up image"></figure>
                <a href="{{url('/register')}}" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
              @if (session('status'))
              <div style="color:green; font-weight:bold; font-size:20px;" class="alert alert-success">
                {{session('status')}}
              </div>
              @endif

                <h2 class="form-title">Sign in</h2>
                {{-- Error Alert --}}
                @if(session('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{session('error')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif
                <form method="POST" action="{{url('/login')}}" class="register-form" id="login-form">
                  @csrf
                  <div class="form-group">
                      <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                      <input type="email" name="username" id="your_name" placeholder="Your Name"/>
                      @if($errors->has('username'))
                      <span class="error">{{ $errors->first('username') }}</span>
                      @endif
                  </div>
                  <div class="form-group">
                      <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                      <input type="password" name="password" id="your_pass" placeholder="Password"/>
                      @if($errors->has('password'))
                      <span class="error">{{ $errors->first('password') }}</span>
                      @endif
                  </div>
                  <div class="form-group">
                      <a href="{{url('/passwordreset')}}">Forgot Password?</a>
                  </div>
                  <div class="form-group form-button">
                      <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                  </div>
                </form>

            </div>
        </div>
    </div>
  </section>
</div>
          


@endsection
