@extends('frontend.layouts.app')

@section('content')
@php
$banner = \App\Banner::where('published', 1)->where('position', 6)->first();
@endphp
<div class="section first-section" style="background: url('{{asset($banner->photo)}}') no-repeat;background-size: cover;background-position: center;">
    <div class="row">
      <div class="col lg-12 page-title">
        <h1 class="text-white margin-bottom text-uppercase text-center">About our company</h1>
        <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span class="low-text-contrast text-white">About Us</span></div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="col lg-4 md-4 sm-12 flex-align-middele no-margin-bottom-lg text-align-center">
        <div class="about-mision flex-column-center">
          <div class="choose-icon pos-rltv">
            <div class="fa margin-right icon"><i class="fas fa-rocket"></i></div>
          </div>
          <h3>Our Mission</h3>
          <p>We value our relationships with current and future customers and hope to communicate our appreciation to them through our outstanding quality of product, and efficient delivery.</p>
        </div>
      </div>
      <div class="col lg-4 md-4 sm-12 flex-align-middele no-margin-bottom-lg text-align-center">
        <div class="about-mision flex-column-center">
          <div class="choose-icon pos-rltv">
            <div class="fa margin-right icon"></div>
          </div>
          <h3>Our Vision</h3>
          <p>To make & offer the products according to our customer satisfaction. We are well versed and well equipped with all the provisions to check the finished products internally before offering to the customers.</p>
        </div>
      </div>
      <div class="col lg-4 md-4 sm-12 flex-align-middele no-margin-bottom-lg text-align-center">
        <div class="about-mision flex-column-center">
          <div class="choose-icon pos-rltv">
            <div class="fa margin-right icon"></div>
          </div>
          <h3>Our History</h3>
          <p>Established as a Proprietor firm in the year 2012, we "Radhey Textiles" are a leading Manufacturer of a wide range of Chiffon Saree, Silk Saree, Georgette Saree, etc.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container flex-align-center-align-item-flex-start">
      <div class="col lg-12 md-12 sm-12">
        <h2 class="text-uppercase">Why shop with us</h2>
        <div class="w-richtext">
          <h3>SIMPLE SHOPPING</h3>
          <p>Whether you shop online or in store or any of the leading third party marketplaces you get the same experience in terms of merchandise, price & service.</p>
          <h3>SECURE SHOPPING</h3>
          <p>Shopping on our website is 100% safe and secure as we do not store complete details or payment information of your credit/debit card in our system. This is information is directly transmitted securely to the bank for payment processing. However, caution must always be taken by the customer while making transactions on any online venue.</p>
          <h3>RANGE OF PRODUCTS AND BRANDS</h3>
          <p>We assort the collection from the best brands, trends, colours, fabrics, patterns to bring you a deep fashion selection wide across Women categories.</p>
          <h3>FREE RETURNS</h3>
          <p>At Rhey Cart we follow a policy that is – "We are responsible for what we sell". We offer free and easy returns on most of the merchandise bought online. If you are not completely satisfied with your purchase you can return the items via a courier pick up or exchange them in any of our stores across India.</p>
          <h3>100% ORIGINAL</h3>
          <p>We are responsible for what we sell and guarantee the originality of the products. All our products are sourced directly from the brands and carry brand warranty and genuineness certificate.</p>
          <h3>FREE ALTERATIONS</h3>
          <p>We offer free alteration at any Store for products purchased on online as well.</p>
          <h3>EXPRESS STORE PICK UP</h3>
          <p>We provide the facility of express pick up service at the store. You can shop online and collect your order from the nearest or preferred Rhey Cart store as per your convenience.</p>
          <h3>PERSONALIZED SHOPPING AT STORE</h3>
          <p>We offer personal shopper service with prior appointment at our store. You can avail the assistance of personal shoppers who are experts to guide you to shop in an exclusive lounge at the store.</p>
          <h3>PERSONAL SHOPPER SERVICE AT HOME</h3>
          <p>We also provide Personal Shopper At Home service and you can shop from the comforts of your home with prior appointment with assistance from our personal shoppers.</p>
          <h3>PERSONALIZED SHOPPING GUIDE</h3>
          <p>We provide personalized shopping assistance by following our Style Hub which is curated with latest fashion trends and suggestions.</p>
        </div>
      </div>
    </div>
  </div>
  @include('frontend.partials.subscribe')
@endsection
