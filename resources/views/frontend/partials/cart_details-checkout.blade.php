<div class="container is-wide">
          <div class="col lg-9 md-12 sm-12 sm-12 no-margin-bottom" style="padding: 0 20px !important; margin-bottom: 0 !important;">
            <section class="ac-container" style="display: none;"></section>
            <section>
                <div>
                  <div class="accordion js-accordion" data-id="accordion1">
                    @if(!Auth::check())
                    <button id="accordionOne" class="accordion__button js-accordion__button is-active" aria-expanded="false" aria-controls="sectionOne">
                      <div class="d-flex justify-content-center">
                        <div class="">
                          <p class="Done_icon">
                            Login or Signup <span> <i class="fas fa-check"></i> </span>
                          </p>
                        </div>
                        <div class="_2ARXM ">
                          <a href="javascript:void(0)" class="check_btn"> change </a>
                        </div>
                      </div>
                    </button>
                    <div id="sectionOne" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionOne">
                      <div style="padding: 18px;">
                        <div class="row">
                            <div class="col lg-6 md-6 sm-12 no-margin-bottom">
                              <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                  <input type="text" name="email" required="required"  class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" />
                                  <label for="input" class="control-label">Enter Email</label><i class="bar"></i>
                                  @if ($errors->has('email'))
                                    <span role="alert">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <input type="password" name="password" id="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                  <label for="password" class="control-label">Enter Password</label><i class="bar"></i>
                                  @if ($errors->has('password'))
                                    <span role="alert">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                                  @endif
                                </div>
                                <div class="_1Ijv5h">By continuing, you agree to  Rheycart's
                                  <a class="_2ARnXM" target="_blank" href="/terms">Terms of Use</a> and
                                  <a class="_2ARnXM" target="_blank" href="/privacypolicy">Privacy Policy</a>.
                                </div>
                                <div class="product_btn mt-20">
                                    <div>
                                      <button type="submit" name="button" class="_2KpZ6l _2ObVJD _3AWRsL">Login</button>
                                    </div>
                                </div>
                              </form>
                              <div class="product_btn mt-20">
                                  <!-- <div>
                                    <a class="_2ARnXM" href="/password/reset">Forgot Password</a>
                                  </div> -->
                                  <div class="text-left">
                                      <a class="_2ARnXM" href="{{ route('user.registration') }}">Create New Account</a>
                                  </div>
                              </div>
                            </div>
                            <div class="col lg-6 md-6 sm-12">
                                <div class="_1lc9Fi">
                                  <span class="blod">Advantages of our secure login</span>
                                  <ul>
                                    <li class="_1QGDTZ"> <i class="fas fa-truck"></i> <span>Easily Hassle free Returns</span></li>
                                    <li class="_1QGDTZ"> <i class="fas fa-bell"></i> <span>Get Relevant Alerts and Recommendation</span></li>
                                    <li class="_1QGDTZ"> <i class="fas fa-star"></i>  <span>Reviews, Ratings and more.</span></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    <button type="button" id="accordionTwo" class="accordion__button js-accordion__button {{ $errors->has('address') ? ' is-active' : '' }}" aria-expanded="false" aria-controls="sectionTwo">
                      <div class="d-flex justify-content-center">
                        <div class="">
                          <p class="Done_icon">
                            Delivery Address <span> <i class="fas fa-check"></i> </span>
                          </p>
                        </div>
                        <div class="_2ARXM ">
                          <a href="javascript:void(0)" class="check_btn"> change </a>
                        </div>
                      </div>
                    </button>
                    <div id="sectionTwo" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionTwo" @if( $errors->has('address')) style="display:block @endif">
                      <div style="padding: 20px;">
                            <form action="{{ route('checkout.store_shipping_infostore') }}" class="form-default" data-toggle="validator" role="form" method="POST" id="checkout-form">
                                  @csrf
                                <div class="container container-nested is-wrapping" style="margin: 0 !important;">
                                  <div class="col lg-6 md-6 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="input-set-group">
                                            <label class="fw-500 textarea" for="street_address">Street address&nbsp;<span
                                                    class="required">*</span></label>
                                                    <span class="drop-down-arrow"></span>
                                                <select id="address"  name="address">
                                                    <option value="" selected>Select Address</option>
                                                    @foreach(App\Address::where('user_id',Auth::user()->id)->where('type', 'billing')->get() as $item)
                                                        @if(isset($item->address) && $item->address != null)
                                                            <option value="{{$item->id}}">{{$item->address}}</option>
                                                        @endif
                                                    @endforeach
                                            </select>
                                            @error('address')
                                                <span style="color:red"><b>{{ $message }}</b></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col lg-12 md-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="custom-field">
                                            <input type="checkbox" value="1" name="Shiping_different_address" id="Shiping_different_address" onclick="myFunction1()">
                                            <label class="fw-500 textarea" for="Shiping_different_address" style="display: inline-block; padding: 0 30px;">Ship to a different address?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="display-none" id="shipping_details">
                                  <div class="container container-nested is-wrapping" style="margin: 0 !important;">
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                          <div class="form-group">
                                            <input type="text" required="required">
                                            <label for="Name" class="control-label">Name</label><i class="bar"></i>
                                          </div>
                                      </div>
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="form-group">
                                          <input type="number" required="required">
                                          <label for="number" class="control-label">10-digit mobile number</label><i class="bar"></i>
                                        </div>
                                      </div>
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="form-group">
                                          <input type="text" required="required">
                                          <label for="Pincode" class="control-label">Pincode</label><i class="bar"></i>
                                        </div>
                                      </div>
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="form-group">
                                          <input type="text" required="required">
                                          <label for="Locality" class="control-label">Locality</label><i class="bar"></i>
                                        </div>
                                      </div>
                                      <div class="col lg-12 md-12 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="form-group">
                                          <textarea required="required"></textarea>
                                          <label for="textarea" class="control-label">Address (Area and Street)</label><i class="bar"></i>
                                        </div>
                                      </div>
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="form-group">
                                          <input type="text" required="required">
                                          <label for="City" class="control-label">City/District/Town</label><i class="bar"></i>
                                        </div>
                                      </div>
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="form-group">
                                          <select>
                                            <option value="" disabled="">--Select State--</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadra &amp; Nagar Haveli &amp; Daman &amp; Diu">Dadra &amp; Nagar Haveli &amp; Daman &amp; Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                          </select>
                                          <label for="select" class="control-label">State</label><i class="bar"></i>
                                        </div>
                                      </div>
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="form-group">
                                          <input type="text" required="required">
                                          <label for="Landmark" class="control-label">Landmark (Optional)</label><i class="bar"></i>
                                        </div>
                                      </div>
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <div class="form-group">
                                          <input type="number" required="required">
                                          <label for="number" class="control-label">Alternate Phone (Optional)</label><i class="bar"></i>
                                        </div>
                                      </div>
                                      <div class="col lg-12 md-12 sm-12 no-margin-bottom" style="margin: 0 !important;">
                                        <p class="_2tiHgk">Address Type</p>
                                      </div>
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom">
                                        <div class="d-flex align-items-center Payment">
                                          <input type="radio" id="Home-delivery" name="Payment" value="Home-delivery">
                                          <label for="Home-delivery">Home (All day delivery)</label>
                                        </div>
                                      </div>
                                      <div class="col lg-6 md-6 sm-12 no-margin-bottom">
                                        <div class="d-flex align-items-center Payment">
                                          <input type="radio" id="Delivery" name="Payment" value="Delivery">
                                          <label for="Delivery">Work (Delivery between 10 AM - 5 PM)</label>
                                        </div>
                                      </div>
                                      <div class="col lg-12 no-padding-lr">
                                        <div class="product_btn d-flex justify-content-center">
                                          <div>
                                            <button type="button" name="button" class="_2KpZ6l _2ObVJD _3AWRsL" style="width: auto;">
                                              <a href="javascript:$('#checkout-form').submit();"  > Save And Deliver Here </a>
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="container d-grid" style="margin: 0 !important;">
                                    <div class="col lg-12 no-padding-lr" style="margin: 0 !important;">
                                      <div class="product_btn">
                                        <div>
                                          <button type="button" name="button" class="_2KpZ6l _2ObVJD _3AWRsL float_right" style="width: auto;">
                                            <a href="javascript:$('#checkout-form').submit();" > Deliver Here </a>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                         
                            </form>
                      </div>
                    </div>
                    <button type="button" id="accordionThree" class="accordion__button js-accordion__button" aria-expanded="false" aria-controls="sectionThree">
                      <div class="d-flex justify-content-center">
                        <div class="">
                          <p class="Done_icon">
                            Order Summary <span> <i class="fas fa-check"></i> </span>
                          </p>
                        </div>
                        <div class="_2ARXM ">
                          <a href="#" class="check_btn"> change </a>
                        </div>
                      </div>
                    </button>
                    <div id="sectionThree" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionThree">
                      <div style="padding: 20px;">
                        <div class="container d-grid">
                            <div class="col lg-12 no-padding-lr" style="margin: 0 !important;">
                                <div class="responsive-table">
                                  <div class="bg-white">
                                    <table class="table py-10">
                                      <thead>
                                        <tr>
                                          <td scope="col" colspan="9" style="height: 25px">  </td>
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
                                                      <div>{{ TotaldiscountPercent($product->id)}}% off</div>
                                                    </div>
                                                    @endif
                                                  </div>
                                                </td>
                                              </tr>
                                              <tr class="">
                                                <td scope="col" colspan="9">
                                                  <div class="num-block skin-3" style="padding: 15px 30px;">
                                                    <div class="num-in"> <span class="minus dis"></span>
                                                      <input type="text" id="NetQty" class="in-num"  value="{{ $cartItem['quantity'] }}" readonly="" onchange="updateQuantity({{ $key }}, this)" style="display: block;">
                                                      <span class="plus"></span>
                                                    </div>
                                                  </div>
                                                  <div class="d-flex Remove_btn">
                                                      <a href="javascript:void(0)" onclick="removeFromCartView(event, {{ $key }})" class="inline-link fw-600"
                                                      style="display:inline-block !important;margin-left: 24px;">Remove</a>
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
                                </div>
                              </div>
                            <div class="col lg-12 no-padding-lr" style="margin: 0 !important;">
                              <div class="product_btn">
                                <div>
                                  <button type="button" name="button" class="_2KpZ6l _2ObVJD _3AWRsL float_right" style="width: auto;">
                                    <a href="#">continue</a>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="button" id="accordionFour" class="accordion__button js-accordion__button" aria-expanded="false" aria-controls="sectionFour">
                        <div class="d-flex justify-content-center">
                          <div class="">
                            <p class="Done_icon">
                              Payment Options <span> <i class="fas fa-check"></i> </span>
                            </p>
                          </div>
                          <div class="_2ARXM ">
                            <a href="#" class="check_btn"> change </a>
                          </div>
                        </div>
                      </button>
                      <div id="sectionFour" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionFour">
                          <div style="padding: 20px;">
                          <form action="{{ route('payment.checkout') }}" method="POST" id="payment-form">
                              @csrf
                              <div class="container d-grid">
                                  <div class="col lg-12 no-padding-lr" style="margin: 0 !important;">
                                  @if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                    <div class="d-flex align-items-center Payment">
                                      <input type="radio" id="Razorpay" name="payment_option" value="razorpay">
                                      <label for="Razorpay">Razorpay</label>
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
                                    <div class="d-flex align-items-center Payment">
                                      <input type="radio" id="Cash-on-Delivery" name="payment_option" value="cash_on_delivery">
                                      <label for="Cash-on-Delivery">Cash on Delivery</label>
                                    </div>
                                    @endif
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                    <div class="d-flex align-items-center Payment">
                                      <input type="radio" id="Razorpay" name="payment_option" value="paypal">
                                      <label for="Razorpay">Paypal</label>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                    <div class="d-flex align-items-center Payment">
                                      <input type="radio" id="Razorpay" name="payment_option" value="stripe">
                                      <label for="Razorpay">Stripe</label>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
                                    <div class="d-flex align-items-center Payment">
                                      <input type="radio" id="Razorpay" name="payment_option" value="voguepay">
                                      <label for="Razorpay">Voguepay</label>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                    <div class="d-flex align-items-center Payment">
                                      <input type="radio" id="Razorpay" name="payment_option" value="instamojo_payment">
                                      <label for="Razorpay">Instamojo Payment</label>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                    <div class="d-flex align-items-center Payment">
                                      <input type="radio" id="Razorpay" name="payment_option" value="paystack">
                                      <label for="Razorpay">Paystack</label>
                                    </div>
                                    @endif

                                  </div>
                                  <div class="col lg-12 no-padding-lr" style="margin: 0 !important;">
                                    <div class="product_btn">
                                      <div>
                                        <button type="button" name="button" class="_2KpZ6l _2ObVJD _3AWRsL float_right" style="width: auto;">
                                          <a href="javascript:$('#payment-form').submit();"> place order </a>
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>

        </div>


        <style media="screen">
          input#Cash-on-Delivery , input#Razorpay , input#Home-delivery , input#Delivery  {
            margin-right: 20px;
            height: 30px;
            cursor: pointer;
          }

          .Payment-d-none {
              display: none;
          }

          .Payment label {
            cursor: pointer;
          }
        </style>

        <div class="col lg-3 md-12 sm-12 no-margin-bottom sidebar_sticky" style="margin: 10px  0 !important;">

          @include('frontend.partials.cart_summary')
          </div>
      </div>

        
      <script>
      function showCheckoutModal(){
          $('#GuestCheckout').modal();
      }
      function removeFromCartView(e, key){
          e.preventDefault();
          removeFromCart(key);
      }
      function updateQuantity(key, element){
          $.post('{{ route('cart.updateQuantityChekout') }}', {
              _token   :  '{{ csrf_token() }}',
              id       :  key,
              quantity :  element.value
          }, function(data){
              // updateNavCart();
              $('#cart-summary').html(data);
          });
      }

      </script>

      <script type="text/javascript">
        'use strict'

        class Accordion {
        constructor(element, options = {}) {
          this.accordion = element
          this.buttons = null
          this.bodies = null
          this.options = {
            activeClassName: 'is-active',
            closeOthers: true,
            ...options,
          }

          this.handleKeydown = this.handleKeydown.bind(this)
          this.handleClick = this.handleClick.bind(this)
          this.handleTransitionend = this.handleTransitionend.bind(this)

          this.init()
        }

        init() {
          if (this.accordion.classList.contains('is-init-accordion')) {
            throw Error('Accordion is already initialized.')
          }

          this.buttons = [...this.accordion.querySelectorAll('.js-accordion__button')]
          this.bodies = [...this.accordion.querySelectorAll('.js-accordion__body')]

          // Handle active accordion item
          for (const button of this.buttons) {
            if (!button.classList.contains(this.options.activeClassName)) continue
            button.setAttribute('aria-expanded', 'true')
            const body = button.nextElementSibling
            body.style.display = 'block'
            body.style.maxHeight = 'none'
          }

          // Hide all bodies except the active
          for (const body of this.bodies) {
            if (body.previousElementSibling.classList.contains(this.options.activeClassName)) continue
            body.style.display = 'none'
            body.style.maxHeight = '0px'
          }

          this.addEvents()

          this.accordion.classList.add('is-init-accordion')
        }

        closeOthers(elException) {
          for (const button of this.buttons) {
            if (button === elException) continue
            button.classList.remove(this.options.activeClassName)
            button.setAttribute('aria-expanded', 'false')
            const body = button.nextElementSibling
            body.style.maxHeight = `${body.scrollHeight}px`
            setTimeout(() => void (body.style.maxHeight = '0px'), 0)
          }
        }

        handleKeydown(event) {
          const target = event.target
          const key = event.which.toString()

          if (target.classList.contains('js-accordion__button') && key.match(/35|36|38|40/)) {
            event.preventDefault()
          } else {
            return false
          }

          switch (key) {
            case '36':
              // "Home" key
              this.buttons[0].focus()
              break
            case '35':
              // "End" key
              this.buttons[this.buttons.length - 1].focus()
              break
            case '38':
              // "Up Arrow" key
              const prevIndex = this.buttons.indexOf(target) - 1
              if (this.buttons[prevIndex]) {
                this.buttons[prevIndex].focus()
              } else {
                this.buttons[this.buttons.length - 1].focus()
              }
              break
            case '40':
              // "Down Arrow" key
              const nextIndex = this.buttons.indexOf(target) + 1
              if (this.buttons[nextIndex]) {
                this.buttons[nextIndex].focus()
              } else {
                this.buttons[0].focus()
              }
              break
          }
        }

        handleClick(event) {
          const button = event.currentTarget
          const body = button.nextElementSibling

          if (this.options.closeOthers) {
            this.closeOthers(button)
          }

          // Set height to the active body
          if (body.style.maxHeight === 'none') {
            body.style.maxHeight = `${body.scrollHeight}px`
          }

          if (button.classList.contains(this.options.activeClassName)) {
            // Close accordion item
            button.classList.remove(this.options.activeClassName)
            button.setAttribute('aria-expanded', 'false')
            setTimeout(() => void (body.style.maxHeight = '0px'), 0)
          } else {
            // Open accordion item
            button.classList.add(this.options.activeClassName)
            button.setAttribute('aria-expanded', 'true')
            body.style.display = 'block'
            body.style.maxHeight = `${body.scrollHeight}px`
          }
        }

        handleTransitionend(event) {
          const body = event.currentTarget
          if (body.style.maxHeight !== '0px') {
            // Remove the height from the active body
            body.style.maxHeight = 'none'
          } else {
            // Hide the active body
            body.style.display = 'none'
          }
        }

        addEvents() {
          this.accordion.addEventListener('keydown', this.handleKeydown)
          for (const button of this.buttons) {
            button.addEventListener('click', this.handleClick)
          }
          for (const body of this.bodies) {
            body.addEventListener('transitionend', this.handleTransitionend)
          }
        }

        destroy() {
          this.accordion.removeEventListener('keydown', this.handleKeydown)
          for (const button of this.buttons) {
            button.removeEventListener('click', this.handleClick)
          }
          for (const body of this.bodies) {
            body.addEventListener('transitionend', this.handleTransitionend)
          }

          this.buttons = null
          this.bodies = null

          this.accordion.classList.remove('is-init-accordion')
        }
        }

        // ---

        window.addEventListener('DOMContentLoaded', () => {
          const accordionEls = [...document.querySelectorAll('.js-accordion')]
          for (const accordionEl of accordionEls) {
              new Accordion(accordionEl)
          }
        })
      </script>
