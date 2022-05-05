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
                                        <br> <br>  <strong> {{ single_price($cartItem['price']) }} </strong>
                                    </td>
                                  <!-- <td>
                                      <div class="num-block skin-3">
                                          <div class="num-in"> <span class="minus dis"></span>
                                              <input type="text" id="NetQty" class="in-num"  value="{{ $cartItem['quantity'] }}" readonly="" onchange="updateQuantity({{ $key }}, this)">
                                              <span class="plus"></span> </div>
                                      </div>
                                  </td> -->
                                  <!-- <td class="text-align-right">{{ single_price($cartItem['price']) }}</td> -->
                                  <!-- <td class="text-align-center"><a href="javascript:void(0)"  onclick="removeFromCartView(event, {{ $key }})" class="inline-link fw-800">
                                      <i class="fa is-24px"></i></a></td> -->
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
                                        <!-- <a href="javascript:void(0)"
                                           onclick="removeFromCartView(event, {{ $key }})" class="inline-link fw-600"
                                           style="display:inline-block !important;margin-left: 24px;">Remove</a> -->
                                      </div>
                                  </td>
                                  <!-- <td scope="col" colspan="3" class="text-align-left d-flex" width="50%" style="align-items: center; height: 50px;"><a href="javascript:void(0)"
                                     onclick="removeFromCartView(event, {{ $key }})" class="inline-link fw-600">Remove</a></td> -->
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

                  <!-- <div style="margin-bottom: 10px; padding-bottom: 10px;"></div> -->
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
                      <!-- <div class="product_btn">
                        <div>
                          @if(Auth::check())
                              <div> <a href="{{ route('checkout.shipping_info') }}" class="inline-button">Proceed to checkout</a> </div>
                          @else
                              <div> <a href="#" data-modal-id="popup1" class="inline-button">Proceed to checkout</a> </div>
                          @endif
                        </div>
                      </div> -->
                      <div class="product_btn">
                        <div>
                          @if(Auth::check())
                            <div>
                              <button type="button" name="button" class="_2KpZ6l _2ObVJD _3AWRsL">
                                <a href="{{ route('checkout.shipping_info') }}" class="fw-600">Place Order</a>
                              </button>
                            </div>
                            @endif
                        </div>
                      </div>
                    </div>


                    <style media="screen">
                    .product_code_btn {
                        display: flex;
                        justify-content: space-between;
                        flex-direction: row;
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


                    <!-- <div>
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

                            @if(Auth::check())
                                <div> <a href="{{ route('checkout.shipping_info') }}" class="inline-button">Proceed to checkout</a> </div>
                            @else
                                <div> <a href="#" data-modal-id="popup1" class="inline-button">Proceed to checkout</a> </div>
                            @endif
                        </form>
                        {{-- <button type="submit" disabled class="margin-left border-button" name="update cart"
                            value="update cart">Update Cart</button> --}}
                    </div> -->
                </div>
                <div class="col lg-3 md-12 sm-12 no-margin-bottom sidebar_sticky padding-top-bottom-double" style="margin: 0 !important;">
                   @include('frontend.partials.cart_summary')

                    <!-- @if(Auth::check())
                        <div> <a href="{{ route('checkout.shipping_info') }}" class="inline-button">Proceed to checkout</a> </div>
                    @else
                        <div> <a href="#" data-modal-id="popup1" class="inline-button">Proceed to checkout</a> </div>
                    @endif -->
                </div>
                @else
            <div class="col lg-12 md-12 no-margin-bottom padding-top-bottom-double text-center">
                <h2> Your Cart is Empty </h2>
            </div>
            @endif
        </div>
    </div>


<script>
    $(document).ready(function() {
      $('.num-in span').click(function () {
          var $input = $(this).parents('.num-block').find('input.in-num');
        if($(this).hasClass('minus')) {
          var count = parseFloat($input.val()) - 1;
          count = count < 1 ? 1 : count;
          if (count < 2) {
            $(this).addClass('dis');
          }
          else {
            $(this).removeClass('dis');
          }
          $input.val(count);
        }
        else {
          var count = parseFloat($input.val()) + 1
          $input.val(count);
          if (count > 1) {
            $(this).parents('.num-block').find(('.minus')).removeClass('dis');
          }
        }
        $input.change();
        return false;
      });
    });
    </script>
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
            updateNavCart();
            $('#cart-summary').html(data);
        });
    }

    </script>


@endsection
