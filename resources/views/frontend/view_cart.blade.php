@extends('frontend.layouts.app')
    @section('content')



<style media="screen">
  tr.border-top:first-child {
    border: none;
  }

  tr.border-top {
      border-top: 1px solid #f0f0f0;
  }
</style>

    <div class="cart-summary payment_bg_color" id="cart-summary">
        @php
        $cart_count = 0;
            if(Session::has('cart')){
                $cart_count = count(Session::get('cart'));
                $carts = Session::get('cart');
            }
        @endphp
        <div class="container">
            @if( $cart_count >= 1 )
                <div class="col lg-9 md-12 no-margin-bottom padding-top-bottom-double">
                  <div class="bg-white">
                    <table class="table py-10">
                          <thead>
                            <tr>
                              <td scope="col" colspan="9" style="height: 25px">  </td>
                            </tr>
                            <tr>
                                <th scope="col" colspan="4">My Cart ( {{ count(Session::get('cart'))}} ) </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                  $total = 0;
                              @endphp
                              @foreach (Session::get('cart') as $key => $cartItem)
                                  @php
                                      $product = \App\Product::find($cartItem['id']);
                                      $total = $total + $cartItem['price']*$cartItem['quantity'];
                                      $product_name_with_choice = $product->name;
                                      if ($cartItem['variant'] != null) {
                                          $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                                      }
                                  @endphp
                              <tr class="border-top" scope="row" colspan="9">
                                <td scope="row" colspan="9" width="100%">
                                    <table>
                                      <tr>
                                        <th scope="col" colspan="9" style="height: 15px">  </th>
                                      </tr>
                                        <tr scope="row" colspan="9" width="100%">


                                  <th scope="row" colspan="1" width="20%">
                                    <a href="{{ route('product', $product->slug) }}" class="inline-link sm-hidden" style="padding: 0 40px;"><img src="{{ asset($product->thumbnail_img) }}" alt=""></a>
                                  </th>
                                  <td scope="row" colspan="9" width="100%"> <a href="{{ route('product', $product->slug) }}" class="inline-link">{{ $product_name_with_choice }}</a>
                                        <!-- <br> <br>  <strong> {{ single_price($cartItem['price']) }} </strong> -->
                                        <div class="c-product__price-wrapper mt-10">
                                          @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                                            <div class="c-product__price is-slashed margin-right-small">{{ home_base_price($product->id) }}</div>
                                          @else
                                            <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                                          @endif
                                          @if(isset($product->discount) && $product->discount != 0)
                                            <div class="c-product-thumb__discount_cart">
                                                <div>{{discount($product->id)}}% off</div>
                                            </div>
                                          @endif
                                        </div>
                                    </td>
                              </tr>
                              <tr class="">
                                  <td scope="col" colspan="9">
                                      <div class="num-block skin-3" style="padding: 15px 30px;">
                                          <div class="num-in"> <span class="minus dis"></span>
                                              <input type="text" id="NetQty" class="in-num"  value="{{ $cartItem['quantity'] }}" readonly="" onchange="updateQuantity({{ $key }}, this)">
                                              <span class="plus"></span> </div>
                                      </div>
                                      <div class="d-flex Remove_btn">
                                        <a href="#" data-modal-id="popup_{{$key}}" class="inline-link fw-600" style="display:inline-block !important;margin-left: 24px;">Remove</a>
  
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                <th scope="col" colspan="9" style="height: 15px">  </th>
                              </tr>
                            </tr>
                        </table>
                    </td>
                              @endforeach

                          </tbody>
                    </table>
                  </div>

                    <div class="product_code_btn">
                      <div class="product_code">
                        <div>
                            <form class="form-inline" action="{{ route('checkout.apply_coupon_code') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(Session::get('coupon_discount'))
                                        <div class="coupon focus">
                                            <input type="text" name="code" class="input-text" id="coupon_code"
                                                    placeholder="Coupon code" value="{{Session::get('coupon_code')}}">
                                            <button type="submit" class="button" value="Apply coupon">Apply coupon</button>
                                        </div>
                                    <a href="{{route('checkout.remove_coupon_code')}}" class="border-button"> Remove coupon </a>
                                @else
                                    <div class="coupon focus">
                                        <input type="text" name="code" class="input-text" id="coupon_code"
                                                placeholder="Coupon code">
                                        <button type="submit" class="button" value="Apply coupon">Apply coupon</button>
                                    </div>

                                @endif
                            </form>
                          </div>
                      </div>


                      <div class="product_btn">
                        <div>
                          <button type="button" name="button" class="_2KpZ6l _2ObVJD _3AWRsL">
                            <a href="{{ route('checkout.shipping_info') }}" class="fw-600">Place Order</a>
                          </button>
                        </div>
                      </div>
                    </div>


                    <style media="screen">
                    .product_code_btn {
                        display: flex;
                        justify-content: space-between;
                        flex-direction: row;
                        align-items: center;
                      }

                      @media only screen and  (max-width: 600px) {
                        .product_code_btn {
                            display: flex;
                            flex-direction: column;
                        }
                        .product_code_btn .product_btn {
                          margin-top: 50px;
                        }
                      }
                    </style>

                  @foreach (Session::get('cart') as $key => $cartItem)
                    <div id="popup_{{$key}}" class="modal-box modal">
                      <div class="modal-body">
                        <div class="close-icon js-modal-close"><i class="fa icon" style="font-size: 22px;"></i></div>
                        <h2 class="text">Remove Item</h2>
                        <div class="p-3 login-register">
                          <div class="">
                            <p class="text-center">Are you sure you want to remove this item?</p>
                          </div>
                          <div class="d-flex Remove_btn justify-content-center">
                            <a href="#" class="btn_cancel js-modal-close">Cancel</a>
                            <a href="javascript:void(0)"
                               onclick="removeFromCartView(event, {{ $key }})" class="inline-link Remove_btn btn_cancel fw-600">Remove</a>
                          </div>
                        </div>
                        <div class="w-clearfix">&nbsp;</div>
                      </div>
                    </div>
                  @endforeach

                    <style media="screen">
                      .Remove_btn a.btn_cancel {
                          font-weight: 500;
                          padding: 14px 0;
                          min-width: 166px;
                          border-radius: 2px;
                          color: #000;
                          box-shadow: none;
                          border: 1px solid #c2c2c2;
                          text-transform: uppercase;
                          text-align: center;
                        }

                        .Remove_btn a.Remove_btn {
                          font-size: 16px;
                          background: #2874f0;
                          border: none;
                          color: #fff;
                        }

                        div#popup2.modal {
                            width: 25% !important;
                        }

                        @media only screen and (min-width: 1025px) and (max-width: 1450px) {
                            div#popup2.modal {
                                width: 30% !important;
                            }
                        }

                    </style>

                </div>
                <div class="col lg-3 md-12 sm-12 no-margin-bottom sidebar_sticky padding-top-bottom-double" style="margin: 0 !important;">
                   @include('frontend.partials.cart_summary')
                </div>
                @else
            <div class="col lg-12 md-12 no-margin-bottom padding-top-bottom-double text-center">
                <h2> Your Cart is Empty </h2>
            </div>
            @endif
        </div>
    </div>



    @endsection

@section('script')

    <script>
    function showCheckoutModal(){
        $('#GuestCheckout').modal();
    }
    function removeFromCartView(e, key){
        e.preventDefault();
        removeFromCart(key);
    }
    function updateQuantity(key, element){
        $.post('{{ route('cart.updateQuantity') }}', {
            _token   :  '{{ csrf_token() }}',
            id       :  key,
            quantity :  element.value
        }, function(data){
            $('#cart-summary').html(data);
        });
    }

    </script>

@endsection
