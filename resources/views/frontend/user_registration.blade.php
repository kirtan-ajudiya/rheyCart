@extends('frontend.layouts.app')

@section('content')
@php
$banner = \App\Banner::where('published', 1)->where('position', 6)->first();
@endphp
<div class="section first-section" style="background: url('{{asset($banner->photo)}}') no-repeat;background-size: cover;background-position: center;">
  <div class="row">
    <div class="col lg-12 page-title">
      <h1 class="text-white margin-bottom text-uppercase text-center">Register</h1>
      <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span class="low-text-contrast text-white">Register</span></div>
    </div>
  </div>
</div>
<div class="section login-register">
  <div class="container d-flex-wrap-justify-center">
    <div class="col lg-8 md-12 text-align-center">
      <div class="login">
        <h2 class="text-uppercase margin-bottom">Create an Account</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <fieldset>
            <label class="text-align-left" for="Username">Username <span class="required">*</span></label>
            <input type="text" id="name" name="name" placeholder="Username" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span >
                    <strong style="color:red;">{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </fieldset>

          <fieldset>
            <label class="text-align-left" for="Username">email <span class="required">*</span></label>
            <input type="text" id="email" name="email" placeholder="Username" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span >
                    <strong style="color:red;">{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </fieldset>

          <fieldset>
            <label class="text-align-left" for="password">Password <span class="required">*</span></label>
            <input type="password" id="password" name="password" placeholder="Password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
            @if ($errors->has('password'))
                <span >
                    <strong style="color:red;">{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </fieldset>

          <fieldset>
            <label class="text-align-left" for="confirm-password">Confirm Password <span class="required">*</span></label>
            <input type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
                <span >
                    <strong style="color:red;">{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
          </fieldset>
          <div class="form-row form-group login-form-footer d-flex-wrap">
            <div class="custom-field">
              <input type="checkbox" id="privacy-policy" name="privacy_policy">
              <label for="privacy-policy" class="text-align-left">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="{{route('privacypolicy')}}" class="lost_password" target="_blank">privacy policy</a>.</label>
              @if ($errors->has('privacy_policy'))
                <span >
                    <strong style="color:red;">{{ $errors->first('privacy_policy') }}</strong>
                </span>
            @endif
            </div>
          </div>
          <button type="submit" class="inline-button">Register</button>
        </form>
        <div class="bb-login-form-divider"><span>Or</span></div>
        <a href="{{route('user.login')}}" class="create-account-btn-border">Login</a> </div>
    </div>
  </div>
</div>
@include('frontend.partials.subscribe')
@endsection

@section('script')
    <script type="text/javascript">

        var isPhoneShown = true;

        var input = document.querySelector("#phone-code");
        var iti = intlTelInput(input, {
            separateDialCode: true,
            preferredCountries: []
        });

        var countryCode = iti.getSelectedCountryData();


        input.addEventListener("countrychange", function() {
            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);
        });

//        $(document).ready(function(){
//            $('.email-form-group').hide();
//        });

        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }

//        function toggleEmailPhone(el){
//            if(isPhoneShown){
//                $('.phone-form-group').hide();
//                $('.email-form-group').show();
//                isPhoneShown = false;
//                $(el).html('Use Phone Instead');
//            }
//            else{
//                $('.phone-form-group').show();
//                $('.email-form-group').hide();
//                isPhoneShown = true;
//                $(el).html('Use Email Instead');
//            }
//        }
    </script>
@endsection
