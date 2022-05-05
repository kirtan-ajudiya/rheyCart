@extends('frontend.layouts.app')

@section('content')
@php
$banner = \App\Banner::where('published', 1)->where('position', 6)->first();
$setting = App\GeneralSetting::first();
@endphp
<div class="section first-section" style="background: url('{{asset($banner->photo)}}') no-repeat;background-size: cover;background-position: center;">
    <div class="row">
      <div class="col lg-12 page-title">
        <h1 class="text-white margin-bottom text-uppercase text-center">Contact us</h1>
        <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span class="low-text-contrast text-white">Contact Us</span></div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <form action="{{route('contacts.stores')}}" method="POST" >
        @csrf
      <div class="col lg-6 md-12">
        <h2 class="text-uppercase margin-bottom">We'd love to hear from you</h2>
        <p>Send us a message and we'll respond as soon as possible</p>
        <div class="container container-nested is-wrapping">
          <div class="col lg-6 md-12 no-margin-bottom" style="margin-bottom: 0 !important;">
            <div class="input-set-group">
              <label class="fw-500" for="first_name">First name&nbsp;<span class="required">*</span></label>
              <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" required/>
            </div>
          </div>
          <div class="col lg-6 md-12 no-margin-bottom" style="margin-bottom: 0 !important;">
            <div class="input-set-group">
              <label class="fw-500" for="last_name">Last name&nbsp;<span class="required">*</span></label>
              <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" required/>
            </div>
          </div>
          <div class="col lg-12 md-12 no-margin-bottom" style="margin-bottom: 0 !important;">
            <div class="input-set-group">
              <label class="fw-500" for="phone">Phone Number&nbsp;<span class="required">*</span></label>
              <input type="text" name="phone" id="phone" placeholder="Enter Phone Number" required/>
            </div>
          </div>
          <div class="col lg-12 md-12 no-margin-bottom" style="margin-bottom: 0 !important;">
            <div class="input-set-group">
              <label class="fw-500" for="email_address">Email address&nbsp;<span class="required">*</span></label>
              <input type="text" name="email" id="email_address" placeholder="Enter Email address" required/>
            </div>
          </div>
          <div class="col lg-12 md-12 no-margin-bottom" style="margin-bottom: 0 !important;">
            <div class="input-set-group">
              <label class="fw-500" for="message">Your Message (optional)</label>
              <textarea id="message" name="message" placeholder="Enter Your Message"></textarea>
            </div>
          </div>
          <div class="col lg-12 md-12 no-margin-bottom" style="margin-bottom: 0 !important;"> <button type="submit" class="inline-button auto-width">Submit</button> </div>
        </div>
      </div>
    </form>
      <div class="col lg-1 no-margin-bottom"></div>
      <div class="col lg-5 md-12">
        <div class="container container-nested">
          <div class="col lg-12">
            <div class="size-h2 margin-bottom text-uppercase">GET IN TOUCH</div>
            <p>If you've got more than just a general enquiry, you can find details on how to reach us as given below.</p>
            <div class="size-h3 margin-bottom">Rhey Cart</div>
            <div>
              <ul class="no-margin-trbl no-padding-trbl">
                <li class="d-flex mb-10"> <span><i class="fa margin-right icon" style="font-size: 25px;"></i></span> <span><a href="https://g.page/Rhey_Hub?share" target="_blank" style="color: #000;">{{$setting->address}}</a></span></li>
                <li class="d-flex mb-10"> <span><i class="fa margin-right icon" style="font-size: 25px;"></i></span> <span><a href="tel:{{$setting->phone}}" style="color: #000;">{{$setting->phone}}</a>,<br><a href="tel:{{$setting->phone_one}}" style="color: #000;">{{$setting->phone_one}}</a></span></li>
                <li class="d-flex mb-10"> <span><i class="fab fa-whatsapp margin-right" style="font-size: 25px;"></i></span> <span><a href="https://wa.me/{{$setting->whatsapp_number}}" target="_blank" style="color: #000;">{{$setting->whatsapp_number}}</a>,<br><a href="https://wa.me/{{$setting->whatsapp_number_one}}" style="color: #000;">{{$setting->whatsapp_number_one}}</a></span></li>
                <li class="d-flex mb-10"> <span><i class="fa margin-right icon" style="font-size: 25px;"></i></span> <span><a href="mailto:{{$setting->email}}" style="color: #000;">{{$setting->email}}</a></span></li>
                <li class="d-flex mb-10"> <span><i class="fa margin-right icon" style="font-size: 25px;"></i></span> <span style="color: #000;">{{$setting->time}}</span></li>
              </ul>
            </div>
            <div class="social-icon">
              <div class="size-h2 margin-bottom text-uppercase">WE'RE SOCIAL</div>
              <p>Follow us on social media to get inspired and catch all the behind the scene action.</p>
              <ul>
                <li><a href="{{$setting->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <!-- <li><a href="{{$setting->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="{{$setting->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <li><a href="{{$setting->linkdin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section has-bg-accent no-padding-trbl">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.3662926045317!2d72.84411251493512!3d21.17760318591801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e35e43f01a3%3A0x950b7e416c5fb174!2sRHEY!5e0!3m2!1sen!2sin!4v1632893369093!5m2!1sen!2sin" allowfullscreen="" loading="lazy" style="width: 100%; height: 500px; border: none;"></iframe>
  </div>
  @include('frontend.partials.subscribe')
@endsection
