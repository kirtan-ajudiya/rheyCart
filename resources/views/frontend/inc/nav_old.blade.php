@php
 $setting = App\GeneralSetting::first();
@endphp

<!-- <header class="navigation-section" id="myHeader">
    <div class="navigation-overlay"></div>
    <div class="navigation-and-offcanvas">
        <div class="col lg-2 md-basis-auto md-order-first no-margin-bottom-lg">
            <div class="color-logo"> <a href="{{route('home')}}" class="brand justify-left w-inline-block w--current"> <img
                        src="{{asset('frontend/images/logo/logo.png')}}" alt="" style="width: 50%;"> </a> </div>
            <div class="sticky-logo"> <a href="{{route('home')}}" class="brand justify-left w-inline-block w--current"> <img
                        src="{{asset('frontend/images/logo/logo-white.png')}}" alt="" style="width: 50%;"> </a> </div>
        </div>
        <div class="col no-margin-bottom lg-8 md-basis-auto md-order-last">
            <nav class="navigation-menu flexh-justify-center position-relative md-margin-top"> <a href="{{route('home')}}"
                    class="nav-link on-dark {{areActiveRoutesHome(['home'])}}">Home</a> <a href="{{route('products')}}"
                    class="nav-link on-dark {{areActiveRoutesHome(['products'])}}">All Products</a>
                    @foreach (App\Category::all() as $item)
                        <a href="{{ route('products.category', $item->slug) }}" class="nav-link on-dark {{areActiveRoutesHome(['products.category', $item->slug])}}">{{$item->name}}</a>
                    @endforeach
                    <a href="{{route('abouts')}}" class="nav-link on-dark {{areActiveRoutesHome(['abouts'])}}">New Arrivals</a>
                    <a href="{{route('abouts')}}" class="nav-link on-dark {{areActiveRoutesHome(['abouts'])}}">Men</a>
                    <a href="{{route('abouts')}}" class="nav-link on-dark {{areActiveRoutesHome(['abouts'])}}">Women</a>
                    <a href="{{route('abouts')}}" class="nav-link on-dark {{areActiveRoutesHome(['abouts'])}}">About Us</a> <a
                    href="{{route('contacts')}}" class="nav-link on-dark {{areActiveRoutesHome(['contacts'])}}">Contact Us</a> </nav>
        </div>
        <div class="col no-margin-bottom lg-2 lg-text-align-right md-basis-auto">
            <div class="inline-block position-relative"> <a data-w-id="19441b04-6667-8112-1ac3-50ce8ef78c54" href="#"
                    class="c-navbar-icon is-brand-color on-dark"></a>
                <div class="c-search-popup w-form">
                    <form id="wf-form-Search" name="wf-form-Search" data-name="Search" method="get" action="{{route('search')}}">
                        @csrf
                        <input type="text" class="form-input-text w-input" maxlength="256" name="Search-2"
                            data-name="Search 2" placeholder="Search product" id="Search-2">
                    </form>
                    <a data-w-id="19441b04-6667-8112-1ac3-50ce8ef78c5f" href="#"
                        class="c-search-popup__close-btn w-inline-block">
                        <div><em class="iconfont__no-italize"></em></div>
                    </a>
                </div>
            </div>
            @if(Auth::check())
            <a href="{{route('dashboard')}}"class="c-navbar-icon is-19px on-dark"></a>
            @else
            <a href="{{route('user.login')}}"class="c-navbar-icon is-19px on-dark"></a>
            @endif

            <div data-w-id="19441b04-6667-8112-1ac3-50ce8ef78c65" class="c-cart" id="cart_item_id"> <a href="#"
                    class="c-navbar-icon on-dark">
                    @if(Session::has('cart'))
                        <span id="cart_items_sidenav">{{ count(Session::get('cart'))}}</span>
                    @else
                        <span id="cart_items_sidenav">0</span>
                    @endif
                </a>
                <div class="c-cart__dropdown" >
                    @if(Session::has('cart'))
                        @if(count($cart = Session::get('cart')) > 0)
                            @php
                                $total = 0;
                            @endphp
                            @foreach($cart as $key => $cartItem)
                                @php
                                    $product = \App\Product::find($cartItem['id']);
                                    $total = $total + $cartItem['price']*$cartItem['quantity'];
                                @endphp
                                <div class="c-cart__item" > <a href="#" class="c-cart__remove-btn w-inline-block">
                                        <div class="iconfont"><em onclick="removeFromCart({{ $key }})" class="iconfont__no-italize"></em></div>
                                    </a> <img src="{{ asset($product->thumbnail_img) }}" width="64" alt="" class="c-cart__thumbnail">
                                    <div class="text-align-left text-small flexv-space-between">
                                        <div class="is-heading-color margin-bottom-xsmall md-text-xsmall">{{ __($product->name) }}</div>
                                        <div class="weight-is-medium low-text-contrast">{{ $cartItem['quantity'] }} × {{ single_price($cartItem['price']*$cartItem['quantity']) }}</div>
                                    </div>
                                </div>
                            @endforeach

                                <div class="c-cart__section">
                                    <div>Subtotal : </div>
                                    <div>{{ single_price($total) }}</div>
                                </div>

                                <div class="c-cart__buttons"> <a href="{{ route('cart') }}"
                                        class="button-primary is-small min-width-100px is-ghost md-margin-bottom-small w-inline-block">
                                        <div class="button-primary-text flexv-justify-center" style="color: #45a48c;">view Cart</div>
                                    </a>
                                    @if(Auth::check())
                                    <a href="{{ route('checkout.shipping_info') }}" class="button-primary is-small min-width-100px w-inline-block">
                                        <div class="button-primary-text flexv-justify-center">Checkout</div>
                                    </a>
                                    @endif
                                </div>
                        @else
                            <div class="text-center p-3">
                                <i class="las la-frown la-3x opacity-60 mb-3"></i>
                                <h3 class="h6 fw-700">Your Cart is empty</h3>
                            </div>
                        @endif
                    @else
                        <div class="text-center p-3">
                            <i class="las la-frown la-3x opacity-60 mb-3"></i>
                            <h3 class="h6 fw-700">Your Cart is empty</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <a data-w-id="19441b04-6667-8112-1ac3-50ce8ef78c8b" href="#" class="c-nav__close-button w-inline-block">
            <div class="iconfont is-offcanvas-close-button"><em class="iconfont__no-italize"></em></div>
        </a>
    </div>
    <div class="mobile-navigation-bar"> <a href="{{route('home')}}" class="brand"><img src="{{asset('frontend/images/logo/logo.png')}}" alt=""
                class="logo-image"></a><a data-w-id="19441b04-6667-8112-1ac3-50ce8ef78c92" href="#"
            class="burger-button">
            <div class="iconfont is-burger"><em class="iconfont__no-italize"></em></div>
        </a> </div>
</header> -->
