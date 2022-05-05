@extends('frontend.layouts.app')

@section('content')

@php
$banner = \App\Banner::where('published', 1)->where('position', 6)->first();
@endphp
<div class="section first-section"
    style="background: url('{{asset($banner->photo)}}') no-repeat;background-size: cover;background-position: center;">
    <div class="row">
        <div class="col lg-12 page-title">
            <h1 class="text-white margin-bottom text-uppercase text-center">My Cart</h1>
            <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span
                    class="low-text-contrast text-white">Checkout</span></div>
        </div>
    </div>
</div>


<section class="padding-top-bottom-double">
    <div class="container">
        <div class="row aiz-steps arrow-divider">
            <div class="col-lg-8 mx-auto">
                <!-- <div class="row aiz-steps arrow-divider">
                    <div class="col active" style="margin-bottom: 0px;">
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">1. SHOPPING BAG</p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">2. SHIPPING & BILLING INFO</p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center active-step">
                            <p class="fs-14 fw-600">3. CHECKOUT </p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">4. CONFORM</p>
                        </div>
                    </div>
                </div> -->
                <div class="row aiz-steps arrow-divider">
            <div class="col" style="margin: 0 !important">
              <div class="text-center iocn success-step"> <i class="fa fa-shopping-cart"></i>
                <h3 class="fs-14 fw-500 d-none d-lg-block">Shopping Bag</h3>
              </div>
            </div>
            <div class="col" style="margin: 0 !important">
              <div class="text-center iocn success-step"> <i class="fa fa-map"></i>
                <h3 class="fs-14 fw-500 d-none d-lg-block opacity-50">Shipping Info</h3>
              </div>
            </div>
            <div class="col active" style="margin: 0 !important">
              <div class="text-center iocn active-step"> <i class="fa fa-check-circle"></i>
                <h3 class="fs-14 fw-500 d-none d-lg-block opacity-50">Checkout</h3>
              </div>
            </div>
            <div class="col opacity" style="margin: 0 !important">
              <div class="text-center iocn"> <i class="fa fa-credit-card"></i>
                <h3 class="fs-14 fw-500 d-none d-lg-block opacity-50">Payment</h3>
              </div>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="">
        <div class="container">
            <form action="{{ route('payment.checkout') }}" class="form-default" style="display: none;" data-toggle="validator" role="form" method="POST" id="checkout-form">
                @csrf

                <div class="col lg-9 md-12 no-margin-bottom padding-top-bottom-double" style="display: none;" >
                  <div class="container d-grid"></div>
                    {{-- <table class="table blodrdetai" style="border: 1px solid #ddd;">
                        <thead>
                            <tr>
                                <th style="padding-left: 30px;font-size: 15px;font-weight: 500;" scope="col" colspan="6">
                                    Enter Promo / Coupon Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 30px;" colspan="6" class="text-align-left">
                                    <input type="text" id="text" placeholder="">
                                    <a href="" class="input-group-btn auto-width">Apply</a>
                                </td>
                            </tr>
                        </tbody>
                    </table> --}}



                  <div class="responsive-table" style="display: none;">
                    <table class="table blodrdetai" style="border: 1px solid #ddd;">
                        <thead>
                            <tr>
                                <th style="padding-left: 30px;font-size: 15px;font-weight: 500;" scope="col" colspan="6">
                                    Payment Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
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
                                </td>
                                @endif
                                @if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
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
                                </td>
                                @endif
                                @if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
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
                                </td>
                                @endif
                                @if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
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
                                </td>
                                @endif
                                @if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
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
                                </td>
                                @endif
                                @if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
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
                                </td>
                                @endif
                                @if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
                                <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
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
                                </td>
                                @endif
                                {{-- @if(\App\BusinessSetting::where('type', 'paytm')->first()->value == 1)
                                <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
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
                                </td>
                                @endif --}}
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
                                    <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
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
                                    </td>
                                    @endif
                                @endif
                            </tr>
                        </tbody>
                    </table>
                  </div>
                    <div class="col lg-12 md-12 no-margin-bottom">
                        <button type="submit" class="inline-button">Place Order</button>
                    </div>
                </div>
            </form>


            <form action="{{ route('payment.checkout') }}" class="form-default" data-toggle="validator" role="form" method="POST" id="checkout-form">
                            @csrf
                            <div class="col lg-9 md-12 no-margin-bottom padding-top-bottom-double">
                              <div class="container d-grid">
                                    <div class="col lg-12 no-padding-lr">
                                        <div class="responsive-table">
                                            <table class="table bg-grey" style="border: 1px solid #ddd;">
                                            <thead>
                                                <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Product Detail</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $cart_count = 0;
                                                    if(Session::has('cart')){
                                                        $cart_count = count(Session::get('cart'));
                                                        $carts = Session::get('cart');
                                                        $total = 0;
                                                        $subtotal = 0;
                                                    }
                                                @endphp
                                                @foreach (Session::get('cart') as $key => $cartItem)
                                                @php
                                                    $product = \App\Product::find($cartItem['id']);
                                                    $total = $total + $cartItem['price']*$cartItem['quantity'];
                                                    $product_name_with_choice = $product->name;
                                                    if ($cartItem['variant'] != null) {
                                                        $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                                                    }
                                                    $subtotal += $cartItem['price']*$cartItem['quantity'];
                                                    $tax = $cartItem['tax']*$cartItem['quantity'];

                                                    $total = $subtotal+$tax;
                                                    if(Session::has('coupon_discount')){
                                                        $total -= Session::get('coupon_discount');
                                                    }
                                                @endphp
                                                    <tr>
                                                        <td style="border-top: 1px solid #ddd !important;"" scope=" row"> <a
                                                                href="{{ route('product', $product->slug) }}" class="inline-link sm-hidden"><img
                                                                    src="{{ asset($product->thumbnail_img) }}" alt=""></a></td>
                                                        <td style="border-top: 1px solid #ddd !important;"" scope=" row"> <a
                                                                href="{{ route('product', $product->slug) }}" class="inline-link">{{ $product_name_with_choice }}</a></td>
                                                        <td style="border-top: 1px solid #ddd !important;""><div class=" num-block skin-3">{{ $cartItem['quantity'] }}</td>
                                                        <td style="border-top: 1px solid #ddd !important;"" class=" text-align-right">{{ single_price($cartItem['price']) }}</td>
                                                        <td style="border-top: 1px solid #ddd !important;"" class=" text-align-center">4,032.00</td>
                                                        <td style="border-top: 1px solid #ddd !important;"" class=" text-align-center">{{ single_price($cartItem['price']) }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td style="padding: 0 8px;border-top: 1px solid #ddd !important;" colspan="6"
                                                        class="text-align-right">Subtotal: {{ single_price($subtotal) }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0 8px;border-top: 0px solid !important;" colspan="6"
                                                        class="text-align-right">(+)Shipping Charges: Free Shipping</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0 8px;border-top: 0px solid !important;" colspan="6"
                                                        class="text-align-right">You Pay: {{ single_price($total) }}</td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="container d-grid">
                                    <div class="col lg-12 no-padding-lr">
                                        <div class="responsive-table">
                                            <table class="table bg-grey" style="border: 1px solid #ddd;">
                                                <thead>
                                                    <tr>
                                                        <th style="padding-left: 30px;font-size: 15px;font-weight: 500;" scope="col" colspan="6">Add Comments About Your Order</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
                                                        <textarea id="message" placeholder=""  name="order_notes"
                                                            style="margin: 0px;width: 100%;height: 141px;"></textarea>
                                                    </td>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="container d-grid">
                                    <div class="col lg-12 no-padding-lr">
                                        <div class="responsive-table">
                                            <table class="table bg-grey" style="border: 1px solid #ddd;">
                                            <thead>
                                                <tr>
                                                    <th style="padding-left: 30px;font-size: 15px;font-weight: 500;" scope="col" colspan="2">
                                                    Payment Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                  <td style="padding: 10px 30px;" class="text-align-left">
                                                    <div class="container">
                                                      <div class="col lg-4 md-6 sm-12" data-toggle="tooltip" data-title="Razorpay">
                                                            <div class="payment_option">
                                                                <input class="bordered-form-check-input bordered-input" name="payment_option" id="Razorpay" type="radio" value="razorpay" checked="">
                                                                <label class="bordered-form-check-label bordered-label" for="Razorpay">
                                                                    <img loading="lazy" src="http://rheycart.codealphainfotech.com/public/frontend/images/icons/cards/rozarpay.png" class="img-fluid mb-2">
                                                                    <span class="d-block text-center">
                                                                        <span class="d-block fw-600 fs-15">Razorpay</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col lg-4 md-6 sm-12" data-toggle="tooltip" data-title="Cash on Delivery">
                                                            <div class="payment_option">
                                                                <input class="bordered-form-check-input bordered-input" name="payment_option" id="cash_on_delivery" type="radio" value="cash_on_delivery" checked="">
                                                                <label class="bordered-form-check-label bordered-label" for="cash_on_delivery">
                                                                    <img loading="lazy" src="http://rheycart.codealphainfotech.com/public/frontend/images/icons/cards/cod.png" class="img-fluid mb-2">
                                                                    <span class="d-block text-center">
                                                                        <span class="d-block fw-600 fs-15">Cash on Delivery</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                {{-- <table class="table blodrdetai" style="border: 1px solid #ddd;">
                                    <thead>
                                        <tr>
                                            <th style="padding-left: 30px;font-size: 15px;font-weight: 500;" scope="col" colspan="6">
                                                Enter Promo / Coupon Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="padding: 30px;" colspan="6" class="text-align-left">
                                                <input type="text" id="text" placeholder="">
                                                <a href="" class="input-group-btn auto-width">Apply</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> --}}




                                <div class="col lg-12 md-12 no-margin-bottom">
                                    <button type="submit" class="inline-button">Place Order</button>
                                </div>
                            </div>
                        </form>

            @php
            $shiping = Session::get('shipping_info');
            $billing = Session::get('billing_info');
            @endphp
            <div class="col lg-3 md-12 no-margin-bottom padding-top-bottom-double">
                <div class="custom-sidebar">
                    @if(isset($add) && $add['type'] == 1)
                    <table class="tabel">
                        <tbody>
                            <tr>
                                <th style="padding: 10px 22px;justify-content: left;">Shipping Address</th>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td class="text-align-left">{{ $shiping['firstname']}} &nbsp; {{ $shiping['lastname']}} <br>  {{ $shiping['address']}}, &nbsp;
                                    {{ $shiping['postal_code']}} <br> {{ $shiping['state']}}, &nbsp; {{ $shiping['country']}} <br> Phone: &nbsp; {{ $shiping['phone']}} </td>
                            </tr>
                        </tbody>
                        @if(Auth::check() == false)
                        <tbody>
                            <tr>
                                <td class="text-align-left">
                                    <div class="Change_btn">
                                        <a href="{{ route('checkout.shipping_info') }}" class="Change_Address_btn">Change Address</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                    @else
                    <table class="tabel">
                        <tbody>
                            <tr>
                                <th style="padding: 10px 22px;justify-content: left;">Shipping Address</th>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td class="text-align-left">{{ $billing['firstname']}} &nbsp; {{ $billing['lastname']}} <br>  {{ $billing['address']}}, &nbsp;
                                    {{ $billing['postal_code']}} <br> {{ $billing['state']}}, &nbsp; {{ $billing['country']}} <br> Phone: &nbsp; {{ $billing['phone']}} </td>
                            </tr>
                        </tbody>
                        @if(Auth::check() == false)
                        <tbody>
                            <tr>
                                <td class="text-align-left">
                                    <div class="Change_btn">
                                        <a href="{{ route('checkout.shipping_info') }}" class="Change_Address_btn">Change Address</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                    @endif
                </div>

                <div class="panel panel-defeal">
                    <table class="tabel">
                        <tbody>
                            <tr>
                                <th style="padding: 10px 22px;justify-content: left;">Billing Address</th>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td class="text-align-left">{{ $billing['firstname']}} &nbsp; {{ $billing['lastname']}} <br>  {{ $billing['address']}}, &nbsp;
                                    {{ $billing['postal_code']}} <br> {{ $billing['state']}}, &nbsp; {{ $billing['country']}} <br> Phone: &nbsp; {{ $billing['phone']}} </td>
                            </tr>
                        </tbody>
                        @if(Auth::check() == false)
                        <tbody>
                            <tr>
                                <td class="text-align-left">
                                    <div class="Change_btn">
                                        <a href="{{ route('checkout.shipping_info') }}" class="Change_Address_btn">Change Address</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                </div>
                <div class="panel panel-defeal">
                    <table class="tabel">
                        <tbody>
                          <tr>
                              <th style="padding: 10px 22px">Purchase With Confidence</th>
                          </tr>
                        </tbody>
                    </table>
                    <div class="panel-body">
                        <p> <i class="fas fa-exchange-alt"></i> HASSLE FREE RETURNS </p>
                        <p> <i class="fa fa-thumbs-up"></i> 100% ORIGINAL PRODUCTS </p>
                        <p> <i class="fas fa-user-lock"></i> HASSLE FREE RETURNS</p>
                    </div>
                    <div class="cardsblock">
                        <!-- <i class="fab fa-paypal"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-discover"></i>
                        <i class="fab fa-cc-visa"></i> -->
                        <img src="{{asset('frontend/images/footer-img.png')}}" height="40px" alt="">
                    </div>
                </div>
                <div class="panel panel-defeal">
                    <table class="tabel">
                        <tbody>
                            <tr>
                                <th style="padding: 10px 22px">Have A Question <br>
                                    We Are At Your Service.</th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="panel-body text-center">
                        <p style="justify-content: center;">
                            <a href="tel:+91 90339 00526"><span><i class="fa margin-right icon"
                                        style="font-size: 25px;"></i></span> +91 90339 00526 </a>
                        </p>
                        <p style="font-size: 20px;justify-content: center;">or</p>
                        <p>
                            <a style="color: #333;font-size: 20px;justify-content: center;margin: 0 auto;" href="mailto:info@rheycart.com"><span><i
                                        class="fa margin-right icon" style="font-size: 20px;"></i></span> Email </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
