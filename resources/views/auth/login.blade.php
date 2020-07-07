@extends('layouts.appauth')
@section('title')
    Login
@endsection

@section('content')
    
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Login</a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            {{-- <input type="email" class="form-control" name="email" placeholder="Email Address" required autofocus> --}}
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            {{-- <input type="password" class="form-control" name="password" placeholder="Password" required> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            {{-- <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink"> --}}
                            <input class="filled-in chk-col-pink" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="/register">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a>Forgot Password?</a>
                            {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a> --}}
                        </div>
                        <div class="form-group row mb-0">
                        <div class="col-md-12 text-center">
                            <!-- <a href="{{url('auth/twitter')}}" class="btn btn-primary">Login with Twitter</a> -->
                            <a href="/sign-in/github" class="btn btn-secondary btn-block">Sign in with Github</a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection