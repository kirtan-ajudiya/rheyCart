@extends('frontend.customer.inc.sidenav')
    @section('sidenavleft')
    @php
        $banner = \App\Banner::where('published', 1)->where('position', 6)->first();
    @endphp
    <div class="section first-section"
        style="background: url({{asset($banner->photo)}}) no-repeat;background-size: cover;background-position: center;">
        <div class="row">
            <div class="col lg-12 page-title">
                <h1 class="text-white margin-bottom text-uppercase text-center">My Wishlist</h1>
                <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span
                        class="low-text-contrast text-white">Wishlist</span></div>
            </div>
        </div>
    </div>
    @endsection

    @section('sidenavright')
  
    <div class="col lg-9 md-12 no-margin-bottom padding-top-bottom-double" id="new_wishlist">
        <h2>My Wishlist</h2>

        @if($wishlists->count() >0  )
            <div class="container d-grid">
                <div class="col lg-12 no-padding-lr">
                    <div class="responsive-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" colspan="2">Product Name</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Stock Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form id="option-choice-form">
                                    @csrf
                                @foreach($wishlists as $wishlish)
                                    <input type="hidden" name="id" value="{{ $wishlish->product->id }}">

                                    <tr>
                                        <th scope="row"><a href="#" onclick="removeFromWishlist({{ $wishlish->id }})" class="inline-link fw-800"><i class="fa is-24px">???</i></a>
                                        </th>
                                        <td><a href="{{route('product', $wishlish->product->slug)}}" class="inline-link sm-hidden"><img
                                                    src="{{ asset($wishlish->product->thumbnail_img) }}" alt=""></a></td>
                                        <td><a href="{{route('product', $wishlish->product->slug)}}" class="inline-link">{{$wishlish->product->name}}</a></td>
                                        <td class="text-align-right">
                                            @if(home_base_price($wishlish->product->id) != home_discounted_base_price($wishlish->product->id))
                                                {{ home_discounted_base_price($wishlish->product->id) }}
                                            @else
                                                {{ home_discounted_base_price($wishlish->product->id) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($wishlish->product->current_stock <= 0)
                                                Out of Stock
                                            @else
                                                In Stock
                                            @endif
                                          </td>
                                        <td><a onclick="addtocartbtn()" class="inline-button small">Add To Cart</a></td>

                                    </tr>
                                @endforeach
                            </form>
                                <div id="snackbar">
                                    <p>{{ __($wishlish->product->name) }} <a href="{{ route('cart') }}" class="animation-underline-link">click here</a> to continue check out.</p>
                                  </div>
                            </tbody>
                            <tfoot>
                                <tr style="border-top: 2px solid #000 !important;">
                                    <td colspan="6">
                                        <div class="social-icon">
                                            <p class="no-margin-bottom">SHARE ON:</p>
                                            <ul>
                                                <li><a href="" target="_blank" title="Facebook"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="" target="_blank" title="Twitter"><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="" target="_blank" title="Pinterest"><i
                                                            class="fab fa-pinterest-p"></i></a></li>
                                                <li><a href="" target="_blank" title="Email"><i
                                                            class="fas fa-envelope"></i></a></li>
                                                <li><a href="" target="_blank" title="WhatsApp"><i
                                                            class="fab fa-whatsapp"></i></a></li>
                                                <li><a href="" target="_blank" title="Instagram"><i
                                                            class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @else
                <p> No wishlist </p>
        @endif
    </div>


    @endsection


    
@section('script')
    <script type="text/javascript">

        
    function addtocartbtn() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        addToCart();
    }

    </script>
@endsection