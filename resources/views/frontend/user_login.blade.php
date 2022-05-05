@extends('frontend.layouts.app')

@section('content')
@php
$banner = \App\Banner::where('published', 1)->where('position', 6)->first();
@endphp
<div class="section first-section" style="background: url('{{asset($banner->photo)}}') no-repeat;background-size: cover;background-position: center;">
    <div class="row">
      <div class="col lg-12 page-title">
        <h1 class="text-white margin-bottom text-uppercase text-center">LOGIN</h1>
      <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span class="low-text-contrast text-white">Login</span></div>
      </div>
    </div>
</div>
<div class="section login-register">
    <div class="container d-flex-wrap-justify-center">
        <div class="col lg-8 md-12 text-align-center">
            <div class="login">
                <h2 class="text-uppercase margin-bottom">Login</h2>
                <form  action="{{ route('login') }}" method="POST">
                  @csrf
                    <fieldset>
                        <label class="text-align-left" for="Username">email <span class="required">*</span></label>
                        <input type="text" id="email" name="email" placeholder="Email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                          <span role="alert">
                              <strong style="color:red">{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                    </fieldset>
                    <fieldset>
                        <label class="text-align-left" for="password">Password <span class="required">*</span></label>
                        <input type="password" name="password" id="password" placeholder="Password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @if ($errors->has('password'))
                          <span role="alert">
                              <strong style="color:red">{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                    </fieldset>
                    <button type="submit" class="inline-button">Login</button>
                </form>
                <div class="form-row form-group login-form-footer d-flex-wrap">
                    <div class="custom-field">
                        <input type="checkbox" id="rememberme" name="remember">
                        <label for="rememberme">Remember me</label>
                    </div>
                    <span class="lost_password"><a href="{{ route('password.request') }}">Lost your password?</a></span>
                </div>
                <div class="bb-login-form-divider"><span>Or</span></div>
                <a href="{{ route('user.registration') }}" class="create-account-btn-border">Create an Account</a>
            </div>
        </div>
    </div>
</div>
@include('frontend.partials.subscribe')
@endsection

@section('script')

@endsection
