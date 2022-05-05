@extends('frontend.layouts.app')

@section('content')

<div class="section first-section" style="background: url('images/banner-product-listing.jpg') no-repeat;background-size: cover;background-position: center;">
    <div class="row">
      <div class="col lg-12 page-title">
        <h1 class="text-white margin-bottom text-uppercase text-center">Checkout</h1>
        <div class="text-small text-align-center"><a href="index.html" class="on-dark">Home</a> / <span class="low-text-contrast text-white">Checkout</span></div>
      </div>
    </div>
  </div>
  <section class="padding-top-bottom-double">
    <div class="container">
        <div class="row aiz-steps arrow-divider">
            <div class="col-lg-8 mx-auto">
                <div class="row aiz-steps arrow-divider">
                    <div class="col active" style="margin-bottom: 0px;">
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">1. SHOPPING BAG</p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center active-step">
                            <p class="fs-14 fw-600">2. SHIPPING & BILLING INFO</p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">3. PAYMENT</p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">4. CONFORM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <div class="section">
    <div class="container is-wide">
        <div class="col lg-7 md-12">
            <form action="{{ route('payment.checkout') }}" class="form-default" data-toggle="validator" role="form" method="POST" id="checkout-form">
                @csrf
                    <div class="container container-nested is-wrapping">
                        <div class="col lg-12 md-12 no-margin-bottom">
                            <h2 class="margin-bottom"> Select Payment Option </h2>
                              <div class="d-flex justify-content-center">
                                    @if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                    <div class="col lg-4 md-6" data-toggle="tooltip" data-title="Paypal">
                                      <div class="payment_option">
                                          <input class="bordered-form-check-input bordered-input" name="payment_option" id="paypal" type="radio" value="paypal" checked>
                                          <label class="bordered-form-check-label bordered-label" for="paypal">
                                              <img loading="lazy" src="{{asset('frontend/images/icons/cards/paypal.png')}}" class="img-fluid mb-2">
                                              <span class="d-block text-center">
                                                  <span class="d-block fw-600 fs-15">PayPal</span>
                                              </span>
                                          </label>
                                      </div>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                    <div class="col lg-4 md-6" data-toggle="tooltip" data-title="Stripe">
                                      <div class="payment_option">
                                          <input class="bordered-form-check-input bordered-input" name="payment_option" id="stripe" type="radio" value="stripe" checked>
                                          <label class="bordered-form-check-label bordered-label" for="stripe">
                                              <img loading="lazy" src="{{ asset('frontend/images/icons/cards/stripe.png')}}" class="img-fluid mb-2">
                                              <span class="d-block text-center">
                                                  <span class="d-block fw-600 fs-15">Stripe</span>
                                              </span>
                                          </label>
                                      </div>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                    <div class="col lg-4 md-6" data-toggle="tooltip" data-title="sslcommerz">
                                      <div class="payment_option">
                                          <input class="bordered-form-check-input bordered-input" name="payment_option" id="sslcommerz" type="radio" value="sslcommerz" checked>
                                          <label class="bordered-form-check-label bordered-label" for="sslcommerz">
                                              <img loading="lazy" src="{{ asset('frontend/images/icons/cards/sslcommerz.png')}}" class="img-fluid mb-2">
                                              <span class="d-block text-center">
                                                  <span class="d-block fw-600 fs-15">SSLCOMMERZ</span>
                                              </span>
                                          </label>
                                      </div>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                    <div class="payment_option" data-toggle="tooltip" data-title="instamojo">
                                      <div class="col lg-4 md-6">
                                          <input class="bordered-form-check-input bordered-input" name="payment_option" id="instamojo" type="radio" value="instamojo" checked>
                                          <label class="bordered-form-check-label bordered-label" for="instamojo">
                                              <img loading="lazy" src="{{ asset('frontend/images/icons/cards/instamojo.png')}}" class="img-fluid mb-2">
                                              <span class="d-block text-center">
                                                  <span class="d-block fw-600 fs-15">instamojo</span>
                                              </span>
                                          </label>
                                      </div>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                    <div class="col lg-4 md-6" data-toggle="tooltip" data-title="Razorpay">
                                      <div class="payment_option">
                                          <input class="bordered-form-check-input bordered-input" name="payment_option" id="Razorpay" type="radio" value="razorpay" checked>
                                          <label class="bordered-form-check-label bordered-label" for="Razorpay">
                                              <img loading="lazy" src="{{ asset('frontend/images/icons/cards/rozarpay.png')}}" class="img-fluid mb-2">
                                              <span class="d-block text-center">
                                                  <span class="d-block fw-600 fs-15">Razorpay</span>
                                              </span>
                                          </label>
                                      </div>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                    <div class="col lg-4 md-6" data-toggle="tooltip" data-title="Paystack">
                                      <div class="payment_option">
                                          <input class="bordered-form-check-input bordered-input" name="payment_option" id="Paystack" type="radio" value="paystack" checked>
                                          <label class="bordered-form-check-label bordered-label" for="Paystack">
                                              <img loading="lazy" src="{{ asset('frontend/images/icons/cards/paystack.png')}}" class="img-fluid mb-2">
                                              <span class="d-block text-center">
                                                  <span class="d-block fw-600 fs-15">Paystack</span>
                                              </span>
                                          </label>
                                      </div>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
                                    <div class="col lg-4 md-6" data-toggle="tooltip" data-title="VoguePay">
                                      <div class="payment_option">
                                          <input class="bordered-form-check-input bordered-input" name="payment_option" id="voguepay" type="radio" value="voguepay" checked>
                                          <label class="bordered-form-check-label bordered-label" for="voguepay">
                                              <img loading="lazy" src="{{ asset('frontend/images/icons/cards/vogue.png')}}" class="img-fluid mb-2">
                                              <span class="d-block text-center">
                                                  <span class="d-block fw-600 fs-15">VoguePay</span>
                                              </span>
                                          </label>
                                      </div>
                                    </div>
                                    @endif
                                    @if(\App\Addon::where('unique_identifier', 'paytm')->first() != null && \App\Addon::where('unique_identifier', 'paytm')->first()->activated)
                                    <div class="col lg-4 md-6" data-toggle="tooltip" data-title="Paytm">
                                      <div class="payment_option">
                                          <input class="bordered-form-check-input bordered-input" name="payment_option" id="paytm" type="radio" value="paytm" checked>
                                          <label class="bordered-form-check-label bordered-label" for="paytm">
                                              <img loading="lazy" src="{{ asset('frontend/images/icons/cards/paytm.jpg')}}" class="img-fluid mb-2">
                                              <span class="d-block text-center">
                                                  <span class="d-block fw-600 fs-15">Paytm</span>
                                              </span>
                                          </label>
                                      </div>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                        @php
                                            $digital = 0;
                                            foreach(Session::get('cart') as $cartItem){
                                                if($cartItem['digital'] == 1){
                                                    $digital = 1;
                                                }
                                            }
                                        @endphp
                                        @if($digital != 1)
                                        <div class="col lg-4 md-6" data-toggle="tooltip" data-title="Cash on Delivery">
                                          <div class="payment_option">
                                              <input class="bordered-form-check-input bordered-input" name="payment_option" id="cash_on_delivery" type="radio" value="cash_on_delivery" checked>
                                              <label class="bordered-form-check-label bordered-label" for="cash_on_delivery">
                                                  <img loading="lazy" src="{{ asset('frontend/images/icons/cards/cod.png')}}" class="img-fluid mb-2">
                                                  <span class="d-block text-center">
                                                      <span class="d-block fw-600 fs-15">Cash on Delivery</span>
                                                  </span>
                                              </label>
                                          </div>
                                        </div>
                                        @endif
                                    @endif
                                    @if (Auth::check())
                                        @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                                            @foreach(\App\ManualPaymentMethod::all() as $method)
                                            <div class="payment_option" data-toggle="tooltip" data-title="{{ $method->heading }}">
                                              <div class="col lg-3 md-6">
                                                  <input class="bordered-form-check-input bordered-input" name="payment_option" id="{{ $method->heading }}" type="radio" value="{{ $method->heading }}" checked>
                                                  <label class="bordered-form-check-label bordered-label" for="{{ $method->heading }}">
                                                      <img loading="lazy" src="{{ asset($method->photo)}}" class="img-fluid mb-2">
                                                      <span class="d-block text-center">
                                                          <span class="d-block fw-600 fs-15">{{ $method->heading }}</span>
                                                      </span>
                                                  </label>
                                              </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @if (Auth::check() && \App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1)
                        <div class="bb-login-form-divider"><span>Or</span></div>
                            <div class="col xl-6 col lg-8 col md-10 mx-auto">
                                <div class="text-center bg-gray py-4">
                                    <i class="fa"></i>
                                    <div class="h5 mb-4">Your wallet balance : <strong>{{ single_price(Auth::user()->balance) }}</strong></div>
                                    @if(Auth::user()->balance < $total)
                                        <button type="button" class="btn btn-base-2" disabled>Insufficient balance</button>
                                    @else
                                        <button  type="button" onclick="use_wallet()" class="btn btn-base-1">Pay with wallet</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                </form>
            </div>
        </div>
        <div class="col lg-5 md-12">
            <div class="c-cart-totals">
                <div class="container container-nested is-wrapping">
                    <div class="col lg-6 md-6 no-margin-bottom">
                        <h3 class="margin-bottom float-left">Your Order</h3>
                    </div>
                    <div class="col lg-6 md-6 no-margin-bottom">
                        <h3 class="margin-bottom float-right"><a href="{{ route('cart') }}" class="inline-link text-uppercase"
                                style="font-size: 18px;"><i class="fa icon" style="font-size: 22px;"></i> Edit</a></h3>
                    </div>
                    <div class="col lg-12 md-12 no-margin-bottom">
                        @include('frontend.partials.checkout-summary')
                        <p>Your personal data will be used to process your order, support your experience throughout
                            this website, and for other purposes described in our <a href="{{route('privacypolicy')}}"
                                class="animation-underline-link">privacy policy</a>.</p>
                        <a href="#" onclick="submitOrder(this)" class="inline-button">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <div class="section">
    <div class="container is-wide">
      <div class="col lg-3 md-6 sm-12 flex-align-middele no-margin-bottom-lg text-align-center">
        <div class="upper-footer flex-column-center">
          <div class="fa margin-right icon"></div>
          <div class="size-h4 text-with-icon margin-bottom-small text-align-center">FREE SHIPPING</div>
        </div>
      </div>
      <div class="col lg-3 md-6 sm-12 flex-align-middele no-margin-bottom-lg text-align-center">
        <div class="upper-footer flex-column-center">
          <div class="fa margin-right icon"></div>
          <div class="size-h4 text-with-icon margin-bottom-small text-align-center">SPECIAL OFFERS</div>
        </div>
      </div>
      <div class="col lg-3 md-6 sm-12 flex-align-middele no-margin-bottom-lg text-align-center">
        <div class="upper-footer flex-column-center">
          <div class="fa margin-right icon"></div>
          <div class="size-h4 text-with-icon margin-bottom-small text-align-center">ORDER PROTECTION</div>
        </div>
      </div>
      <div class="col lg-3 md-6 sm-12 flex-align-middele no-margin-bottom-lg text-align-center">
        <div class="upper-footer flex-column-center">
          <div class="fa margin-right icon"></div>
          <div class="size-h4 text-with-icon margin-bottom-small text-align-center">PROFESSIONAL SUPPORT</div>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
    <script type="text/javascript">
        function use_wallet(){
            $('input[name=payment_option]').val('wallet');
            $('#checkout-form').submit();
        }
        function submitOrder(el){
            $(el).prop('disabled', true);
            $('#checkout-form').submit();
        }
    </script>
@endsection
