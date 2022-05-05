@extends('frontend.layouts.app')
    @section('content')
    <!-- @php
    $status = $order->orderDetails->first()->delivery_status;
    $banner = \App\Banner::where('published', 1)->where('position', 6)->first();
    @endphp
<div class="section first-section"
    style="background: url('{{asset($banner->photo)}}') no-repeat;background-size: cover;background-position: center;">
    <div class="row">
        <div class="col lg-12 page-title">
            <h1 class="text-white margin-bottom text-uppercase text-center">My Cart</h1>
            <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span
                    class="low-text-contrast text-white">Order Successful</span></div>
        </div>
    </div>
</div> -->

<section class="padding-top-bottom-double" style="display: none;">
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
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">3. CHECKOUT </p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center active-step">
                            <p class="trash-btn fs-14 fw-600">4. CONFORM</p>
                        </div>
                    </div>
                </div> -->
                <div class="row aiz-steps arrow-divider">
                <div class="col " style="margin: 0 !important">
                  <div class="text-center iocn success-step"> <i class="fa fa-shopping-cart"></i>
                    <h3 class="fs-14 fw-500 d-none d-lg-block">Shopping Bag</h3>
                  </div>
                </div>
                <div class="col" style="margin: 0 !important">
                  <div class="text-center iocn success-step"> <i class="fa fa-map"></i>
                    <h3 class="fs-14 fw-500 d-none d-lg-block opacity-50">Shipping Info</h3>
                  </div>
                </div>
                <div class="col" style="margin: 0 !important">
                  <div class="text-center iocn success-step"> <i class="fa fa-check-circle"></i>
                    <h3 class="fs-14 fw-500 d-none d-lg-block opacity-50"> Checkout</h3>
                  </div>
                </div>
                <div class="col active" style="margin: 0 !important">
                  <div class="text-center iocn active-step"> <i class="fa fa-credit-card"></i>
                    <h3 class="fs-14 fw-500 d-none d-lg-block opacity-50">Payment</h3>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<div class="">
    <div class="container">
      <div class="col lg-12 md-12 no-margin-bottom padding-top-bottom-double">
        <div class="text-align-center">
          <h2>Thank you. Your order has been received.</h2>
          <p style="font-size: 1.625rem;line-height: 1.6;" class="fw-300">Order <span class="mask">#{{ $order->code }}</span> was placed on <span class="mask">{{ date("F j, Y", $order->date) }}</span> payment method <span class="mask">{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</span> and is currently <span class="mask">{{ ucfirst(str_replace('_', ' ', $status)) }}</span>.</p>
        </div>
        <h2>Order details</h2>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="2">Product</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order->orderDetails as $key => $orderDetail)
              <tr>
                <th scope="row"><a href="{{ route('product', $orderDetail->product->slug) }}" class="inline-link sm-hidden"><img src="{{ asset($orderDetail->product->thumbnail_img) }}" alt="" class="margin-right "></a></th>
                <td>
                  @if ($orderDetail->product != null)
                    <a href="{{ route('product', $orderDetail->product->slug) }}" class="inline-link">{{ $orderDetail->product->name }}</a> x {{ $orderDetail->quantity }}
                  @else
                      <strong>{{ __('Product Unavailable') }}</strong>
                  @endif
              </td>
                <td class="text-align-right">{{ single_price($orderDetail->price) }}</td>
              </tr>
              @endforeach
            </tbody>
            <tfoot class="cart-table">
              <tr>
                <th scope="row" colspan="2">Subtotal:</th>
                <td class="text-align-right">{{ single_price($order->orderDetails->sum('price')) }}</td>
              </tr>
              <tr>
                <th scope="row" colspan="2">Tax:</th>
                <td class="text-align-right">{{ single_price($order->orderDetails->sum('tax')) }}</td>
              </tr>
              <tr>
                <th scope="row" colspan="2">Shipping:</th>
                <td class="text-align-right">{{ single_price($order->orderDetails->sum('shipping_cost')) }}</td>
              </tr>
              <tr>
                <th scope="row" colspan="2">Discount:</th>
                <td class="text-align-right">{{ single_price($order->coupon_discount) }}</td>
              </tr>
              <tr>
                <th scope="row" colspan="2">Payment method:</th>
                <td class="text-align-right">{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</td>
              </tr>
              <tr>
                <th scope="row" colspan="2">Total:</th>
                <td class="fw-700 text-align-right">{{ single_price($order->grand_total) }}</td>
              </tr>
            </tfoot>
          </table>
        </div>
          @php
              $note = json_decode($order->billing_address)->order_notes;
          @endphp
          @if(isset($note) && $note != "")
              <div class="order_details_notes">
                <h3>Note:</h3>
                <p class="no-margin-bottom">{{ json_decode($order->billing_address)->order_notes }}</p>
              </div>
          @endif
        <div class="container is-full-wide margin-top">
          <div class="col lg-6 md-6 sm-12 no-margin-bottom no-padding-lr">
            <h2>Billing Address</h2>
            <p class="fs-19px fw-500" style="font-style: italic;text-transform: capitalize;">{{ json_decode($order->billing_address)->firstname }} {{ json_decode($order->billing_address)->lastname }}<br>{{ json_decode($order->billing_address)->address}}<br>{{ json_decode($order->billing_address)->postal_code }} - {{ json_decode($order->billing_address)->city }}, {{ json_decode($order->billing_address)->state }}, {{ json_decode($order->billing_address)->country }}<br><br>{{ json_decode($order->billing_address)->phone }}<br>{{ json_decode($order->billing_address)->email }}</p>
          </div>
          <div class="col lg-6 md-6 sm-12 no-margin-bottom no-padding-lr">
            <h2>Shipping Address</h2>
            <p class="fs-19px fw-500" style="font-style: italic;text-transform: capitalize;">{{ json_decode($order->shipping_address)->firstname }} {{ json_decode($order->shipping_address)->lastname }}<br>{{ json_decode($order->shipping_address)->address}}<br>{{ json_decode($order->shipping_address)->postal_code }} - {{ json_decode($order->shipping_address)->city }}, {{ json_decode($order->shipping_address)->state }}, {{ json_decode($order->shipping_address)->country }}<br><br>{{ json_decode($order->shipping_address)->phone }}<br>{{ json_decode($order->shipping_address)->email }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
