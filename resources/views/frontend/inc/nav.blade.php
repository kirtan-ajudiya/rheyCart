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
<section class="header-topbar">
  <div class="section_top_bar">
    <div class="container is-wide headre-topbar">
      <div class="col lg-6 md-6 sm-12 text-left" style="margin: 0 0 !important;">
        <ul class="top-headers">
          <li class=""> <span><i class="fa icon" style="font-size: 20px;color: #E6E6E6;"></i>
            <a href="tel:{{$setting->phone}}">{{$setting->phone}} </a></span>
          </li>
          <li class="topbar"> <span><i class="fa icon" style="font-size: 20px;color: #E6E6E6;"></i>
            <a href="mailto:{{$setting->email}}">{{$setting->email}} </a></span>
            </li>
        </ul>
      </div>
      <div class="col lg-6 md-6 sm-12 text-left" style="margin: 0 0 !important;padding-right: 8px;">
        <div class="header-social-icon">
          <ul>
            <li><a href="https://wa.me/{{$setting->whatsapp_number}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="{{$setting->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="{{$setting->linkdin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="{{$setting->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="{{$setting->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <!-- <li><a href="" class="button_btn_Contact us" target="_blank">Contact us</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="container is-wide topbar">
      <div class="col lg-6 md-basis-auto md-order-first no-margin-bottom-lg" style="margin: 0 0 !important;">
          <a href="{{ route('home') }}">
            <img src="{{asset('frontend/images/logo/logo.png')}}" alt="menu-logo" style="width: 13%;">
          </a>
      </div>
      <!-- <div class="col lg-4 md-6 sm-12 text-center" style="margin: 0 0 !important;">
        <div class="search_form1">
        <form id="wf-form-Search" name="wf-form-Search" data-name="Search" method="get" action="{{route('search')}}">
          <input type="text" name="q" id="search" placeholder="Search for saree, kurta and more" class="text-capitalize">
          <button type="submit" class="vertical_middle">
               <span><i class="fa margin-right icon" style="font-size: 25px;color: #707070;transform: rotate(270deg);"></i></span>
          </button>
        </form>
        </div>
      </div> -->
      <style>
        span.icon-button__badge {
          position: absolute;
          bottom: 26px;
          border: 2px solid;
          right: -7px;
          width: 17px;
          height: 17px;
          background: #01a58d;
          color: #ffffff;
          display: flex;
          justify-content: center;
          align-items: center;
          border-radius: 50%;
          font-size: 11px;
      }
      </style>
      <!-- <div class="col lg-6 md-6 sm-12" style="margin: 0 0 !important;">
        <div class="d-flex headers-topbar">
          <div class="search_form1">
          <form id="wf-form-Search" name="wf-form-Search" data-name="Search" method="get" action="{{route('search')}}">
            <input type="text" name="q" id="search" placeholder="Search for saree, kurta and more" class="text-capitalize">
            <button type="submit" class="vertical_middle">
                 <span><i class="fa margin-right icon" style="font-size: 25px;color: #707070;transform: rotate(270deg);"></i></span>
            </button>
          </form>
          </div>
            @auth
             <a href="{{ route('dashboard') }}"> <p>hello, <br> {{ Auth::user()->name }}</p> </a>
            @else
              <a class="button_btn_Login" href="{{ route('user.login') }}">Login</a>
            @endauth
             <a style="position:relative;" class="button_btn_Cart icon-button" href="{{ route('cart') }}"> <img src="../public/uploads/images/cart-plus.png" alt="cart-icon">
               @if(Session::has('cart'))
                <span class="icon-button__badge">{{ count(Session::get('cart'))}}</span>
              @endif
            </a>
        </div>
      </div> -->

      <div class="col lg-6 md-6 sm-12" style="margin: 0 0 !important;">
        <div class="d-flex headers-topbar">
          <div class="search_form1">
          <form id="wf-form-Search" name="wf-form-Search" data-name="Search" method="get" action="{{route('search')}}">
            <input type="text" name="q" id="search" placeholder="Search for saree, kurta and more" class="text-capitalize">
            <button type="submit" class="vertical_middle">
                 <span><i class="fa margin-right icon" style="font-size: 25px;color: #707070;transform: rotate(270deg);"></i></span>
            </button>
          </form>
          </div>
          @auth
           <a href="{{ route('dashboard') }}"> <p>hello, <br> {{ Auth::user()->name }}</p> </a>
          @else
            <a class="button_btn_Login" href="{{ route('user.login') }}">Login</a>
          @endauth
           <a style="position:relative;" class="button_btn_Cart icon-button" href="{{ route('cart') }}"> <img src="../public/uploads/images/cart-plus.png" alt="cart-icon">
             @if(Session::has('cart'))
              <span class="icon-button__badge">{{ count(Session::get('cart'))}}</span>
            @endif
            </a>
        </div>
      </div>
    </div>
  </div>
</section>

<div id="myOverlay" class="overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
  <div class="overlay-content">
    <form id="wf-form-Search" name="wf-form-Search" data-name="Search" method="get" action="{{route('search')}}">
      <input type="text" name="q" id="search" placeholder="Search for saree, kurta and more">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

  <header class="navigation-section" id="myHeader">
  <div class="wrapper">
      <nav>
        <input type="checkbox" id="show-search">
        <input type="checkbox" id="show-menu">
        <label for="show-menu" class="mobile-icon">
          <a href="/users/login">
            <i class="fas fa-user"></i>
          </a>
          <a href="/cart">
            <i class="fas fa-shopping-cart"></i>
          </a>
        </label>
        <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
        <div class="content">
          <div class="mobile-logo">
            <a href="{{route('home')}}">
              <img src="{{asset('frontend/images/logo/logo.png')}}" width="100" alt="menu-logo">
            </a>
          </div>
          <div class="menu-logo-header" style="display: none;">
            <div class="sticky-logo" style="display: none;">
               <a href="{{route('home')}}" class="brand justify-left w-inline-block w--current">
                 <img src="{{asset('frontend/images/logo/logo-white.png')}}" alt="" width="100">
               </a>
             </div>
          </div>
          <ul class="links">
            <li><a href="{{route('home')}}">Home</a></li>
            @foreach (\App\Category::all()->take(11) as $key => $category)
            <li>
              <a href="{{ route('products.category', $category->slug) }}"  @if(count($category->subcategories)>0)class="desktop-link"@endif>{{ $category->name }}</a>
              <input type="checkbox" id="{{ $category->name }}">
              <label for="{{ $category->name }}"   @if(count($category->subcategories)>0)class="desktop-link-1"@endif>{{ $category->name }}</label>
              <ul>
                @if(count($category->subcategories)>0)
                  @foreach ($category->subcategories as $key => $subcategory)
                    <li><a href="{{ route('products.subcategory', $subcategory->slug) }}">{{ $subcategory->name }}</a></li>
                  @endforeach
                @endif
              </ul>
            </li>
            @endforeach
            <li><a href="{{route('abouts')}}">About</a></li>
            <li><a href="{{route('contacts')}}">Contact</a></li>
            <!-- <li>
              <a href="#" class="desktop-link">Services</a>
              <input type="checkbox" id="show-services">
              <label for="show-services">Services</label>
              <ul>
                <li><a href="#">Drop Menu 1</a></li>
                <li><a href="#">Drop Menu 2</a></li>
                <li><a href="#">Drop Menu 3</a></li>
                <li>
                  <a href="#" class="desktop-link">More Items</a>
                  <input type="checkbox" id="show-items">
                  <label for="show-items">More Items</label>
                  <ul>
                    <li><a href="#">Sub Menu 1</a></li>
                    <li><a href="#">Sub Menu 2</a></li>
                    <li><a href="#">Sub Menu 3</a></li>
                  </ul>
                </li>
              </ul>
            </li> -->
          </ul>
          <ul class="headers-top-icon">
            <li>
              <button class="openBtn" onclick="openSearch()">
                <i class="fa fa-search"></i>
              </button>
            </li>
            <li>
              @auth
               <a href="{{ route('dashboard') }}"> <p>hello, <br> {{ Auth::user()->name }}</p> </a>
              @else
                <a href="{{ route('user.login') }}"><i class="fas fa-user"></i></a>
              @endauth
            </li>
            <li><a href="{{ route('cart') }}"> <i class="fas fa-cart-plus"></i>
              @if(Session::has('cart'))
               <span class="icon-button__badge">{{ count(Session::get('cart'))}}</span>
             @endif</a></li>
          </ul>
        </div>
      </nav>
    </div>
</header>

<style>
.sticky{
  background-color: #1a5f7a
}
</style>

<script type="text/javascript">
function openSearch() {
document.getElementById("myOverlay").style.display = "block";
}

function closeSearch() {
document.getElementById("myOverlay").style.display = "none";
}

</script>
