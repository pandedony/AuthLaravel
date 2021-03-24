
  
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

                <h2 class="form-title">Reset Password</h2>
                {{-- Error Alert --}}
                @if(session('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{session('error')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif
                <form method="POST" action="{{url('/passwordreset')}}" class="register-form" id="login-form">
                @method('patch')
                  @csrf
                  <div class="form-group">
                      <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                      <input type="email" name="email" id="your_email" placeholder="Your Email" value="{{ old('email') }}"/>
                      @if($errors->has('email'))
                      <span class="error">{{ $errors->first('email') }}</span>
                      @endif
                  </div>
                  <div class="form-group form-button">
                      <input type="submit" name="signin" id="signin" class="form-submit" value="Request"/>
                  </div>
                </form>

            </div>
        </div>
    </div>
  </section>
</div>
          


@endsection
