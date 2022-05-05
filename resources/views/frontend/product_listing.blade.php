@extends('frontend.layouts.app')

@if(isset($subsubcategory_id))
    @php
        $meta_title = \App\SubSubCategory::find($subsubcategory_id)->meta_title;
        $meta_description = \App\SubSubCategory::find($subsubcategory_id)->meta_description;
    @endphp
@elseif (isset($subcategory_id))
    @php
        $meta_title = \App\SubCategory::find($subcategory_id)->meta_title;
        $meta_description = \App\SubCategory::find($subcategory_id)->meta_description;
    @endphp
@elseif (isset($category_id))
    @php
        $meta_title = \App\Category::find($category_id)->meta_title;
        $meta_description = \App\Category::find($category_id)->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = \App\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Brand::find($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title = env('APP_NAME');
        $meta_description = \App\SeoSetting::first()->description;
    @endphp

@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('content')




  <div class="section accordion-section-product">
    <div class="container is-wide">
      <div class="col lg-3 md-4 xs-12 flex-20">
        <form class="" id="search-form" action="{{ route('search') }}" method="GET">
          <div class="accordion js-accordion" data-id="accordion1">
            <button type="button" id="accordionOne" class="accordion__button js-accordion__button is-active" aria-expanded="ture" aria-controls="sectionOne">
              Categories
            </button>
            <div id="sectionOne" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionOne" style="display: block; max-height: none;">
                <div class="text">
                  <ul class="product-categories" style="padding: 0;">
                    @foreach (App\Category::all() as $item)
                      <li class="{{areActiveRoutesHome(['products.category'])}}"><a href="{{ route('products.category', $item->slug) }}">{{$item->name}} <span class="count">({{count($item->products)}})</span></a></li>
                    @endforeach
                  </ul>
              </div>
            </div>
          </div>
          <div class="accordion js-accordion" data-id="accordion1">
            <button type="button" id="accordiontwo" class="accordion__button js-accordion__button" aria-expanded="false" aria-controls="sectionTwo">
              Occasion
            </button>
            <div id="sectionTwo" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordiontwo">
                <div class="text">
                  <ul class="product-categories" style="padding: 0;">
                    @foreach (App\Occasion::all() as $item)
                      <li class="{{areActiveRoutesHome(['products.occasion'])}}"><a href="{{ route('products.occasion', $item->slug) }}">{{$item->name}} <span class="count">({{count($item->products)}})</span></a></li>
                    @endforeach
                    </ul>
              </div>
            </div>
          </div>
          <div class="accordion js-accordion" data-id="accordion1">
            <button type="button" id="accordionThree" class="accordion__button js-accordion__button" aria-expanded="false" aria-controls="sectionThree">
              Fabric
            </button>
            <div id="sectionThree" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionThree">
                <div class="text">
                  <ul class="product-categories" style="padding: 0;">
                    @foreach (App\Fabric::all() as $item)
                      <li class="{{areActiveRoutesHome(['products.fabric'])}}"><a href="{{ route('products.fabric', $item->slug) }}">{{$item->name}} <span class="count">({{count($item->products)}})</span></a></li>
                    @endforeach
                    </ul>
              </div>
            </div>
          </div>
            <div class="accordion js-accordion" data-id="accordion1">
              <button type="button" id="accordionFour" class="accordion__button js-accordion__button" aria-expanded="false" aria-controls="sectionFour">
                Price
              </button>
              <div id="sectionFour" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionFour">
                  <div class="text">
                    <ul class="product-categories" style="padding: 0;">
                    @foreach ($final as $key=>$item)
                      @php $price = explode("-", $item); @endphp
                      @if(isset($price) && $price[2] != 0)
                        <li><input id="price-{{ $key }}" type="checkbox" name="prices[]"  onchange="filter()" value="{{$item}}" @if($test && in_array($item, $test)) checked @endif/>
                        <label for="price-{{ $key }}" style="display: inline !important;margin-left: 10px !important;padding-top: 0.5rem !important;">₹{{$price[0]}} to ₹{{$price[1]}}<span class="count" style="padding: .25rem 0 .5rem !important;">({{$price[2]}})</span></label></li>
                        @endif
                      @endforeach
                    </ul>
                </div>
              </div>
          </div>
          @foreach ($attributes as $key => $attribute)
            @if (\App\Attribute::find($attribute['id']) != null)
          <div class="accordion js-accordion" data-id="accordion1">
            <button type="button" id="accordionFive" class="accordion__button js-accordion__button" aria-expanded="false" aria-controls="sectionFive">
              {{ \App\Attribute::find($attribute['id'])->name }} Option
            </button>
            <div id="sectionFive" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionFive">
                <div class="text">
                  <ul class="product-categories" style="padding: 0;">
                      @if(array_key_exists('values', $attribute))
                          @foreach ($attribute['values'] as $key => $value)
                              @php
                                  $flag = false;
                                  if(isset($selected_attributes)){
                                      foreach ($selected_attributes as $key => $selected_attribute) {
                                          if($selected_attribute['id'] == $attribute['id']){
                                              if(in_array($value, $selected_attribute['values'])){
                                                  $flag = true;
                                                  break;
                                              }
                                          }
                                      }
                                  }
                                  if(array_key_exists($value,$attr)){
                                      $count =  $attr[$value];
                                  }
                              @endphp
                              <li> <input id="{{ \App\Attribute::find($attribute['id'])->name }}-{{ $key }}" type="checkbox" id="attribute_{{ $attribute['id'] }}_value_{{ $value }}" name="attribute_{{ $attribute['id'] }}[]" value="{{ $value }}" @if ($flag) checked @endif onchange="filter()">
                              <label for="{{ \App\Attribute::find($attribute['id'])->name }}-{{ $key }}" style="display: inline !important;margin-left: 10px !important;padding-top: 0.5rem !important;">{{$value}}<span class="count" style="padding: .25rem 0 .5rem !important;">({{$count}})</span></label></li>

                          @endforeach
                     @endif
                   </ul>
              </div>
            </div>
          </div>
          @endif
        @endforeach
          <div class="accordion js-accordion" data-id="accordion1">
            <button type="button" id="accordionsix" class="accordion__button js-accordion__button" aria-expanded="false" aria-controls="sectionsix">
              popular tags
            </button>
            <div id="sectionsix" class="accordion__body js-accordion__body" role="region" aria-labelledby="accordionsix">
                <div class="text tagcloud">
                  @foreach($tags as $tag)
                  <a href="{{ route('products.tag', $tag) }}">{{$tag}}</a>
                  @endforeach
              </div>
            </div>
          </div>
        </from>
      <!-- <form class="" id="search-form" action="{{ route('search') }}" method="GET">
        <div class="widget widget_product_categories">
          <h2 class="widget-title is-active">Categories</h2>
          <ul class="product-categories" style="display:block !important;">
            @foreach (App\Category::all() as $item)
              <li class="{{areActiveRoutesHome(['products.category'])}}"><a href="{{ route('products.category', $item->slug) }}">{{$item->name}} <span class="count">({{count($item->products)}})</span></a></li>
            @endforeach
            </ul>
        </div>

        <div class="widget widget_product_categories">
          <h2 class="widget-title">Occasion</h2>
          <ul class="product-categories">
            @foreach (App\Occasion::all() as $item)
              <li class="{{areActiveRoutesHome(['products.occasion'])}}"><a href="{{ route('products.occasion', $item->slug) }}">{{$item->name}} <span class="count">({{count($item->products)}})</span></a></li>
            @endforeach
            </ul>
        </div>

        <div class="widget widget_product_categories">
          <h2 class="widget-title">Fabric</h2>
          <ul class="product-categories">
            @foreach (App\Fabric::all() as $item)
              <li class="{{areActiveRoutesHome(['products.fabric'])}}"><a href="{{ route('products.fabric', $item->slug) }}">{{$item->name}} <span class="count">({{count($item->products)}})</span></a></li>
            @endforeach
            </ul>
        </div>

        <div class="widget widget_product_categories">
          <h2 class="widget-title">Price</h2>
          <ul class="product-categories">
          @foreach ($final as $key=>$item)
            @php $price = explode("-", $item); @endphp
            @if(isset($price) && $price[2] != 0)
              <li><input id="price-{{ $key }}" type="checkbox" name="prices[]"  onchange="filter()" value="{{$item}}" @if($test && in_array($item, $test)) checked @endif/>
              <label for="price-{{ $key }}" style="display: inline !important;margin-left: 10px !important;padding-top: 0.5rem !important;">₹{{$price[0]}} to ₹{{$price[1]}}<span class="count" style="padding: .25rem 0 .5rem !important;">({{$price[2]}})</span></label></li>
              @endif
            @endforeach
          </ul>
        </div>


        @if(isset($all_colors) && $all_colors != [])
        <div class="widget widget_layered_nav">
          <h2 class="widget-title">Color</h2>
          <div class="product-categories list-inline checkbox-color checkbox-color-circle custom-radios">
            @foreach ($all_colors as $key => $color)
              <div>
                <input type="radio" id="color-{{ $key }}" name="color" value="{{ $color }}"@if(isset($selected_color) && $selected_color == $color) checked @endif  onchange="filter()">
                <label for="color-{{ $key }}"  data-original-title="{{ \App\Color::where('code', $color)->first()->name }}">
                  <span style="background:{{ $color }};"><img style="width: 15px !important;height: 20px !important;" src="public/frontend/images/check-icn.svg" alt="" /></span>
                </label>
              </div>
            @endforeach
          </div>
        </div>
        @endif


        @foreach ($attributes as $key => $attribute)
          @if (\App\Attribute::find($attribute['id']) != null)
            <div class="widget widget_layered_nav">
              <h2 class="widget-title">{{ \App\Attribute::find($attribute['id'])->name }} Option</h2>
              <ul class="product-categories">
                  @if(array_key_exists('values', $attribute))
                      @foreach ($attribute['values'] as $key => $value)
                          @php
                              $flag = false;
                              if(isset($selected_attributes)){
                                  foreach ($selected_attributes as $key => $selected_attribute) {
                                      if($selected_attribute['id'] == $attribute['id']){
                                          if(in_array($value, $selected_attribute['values'])){
                                              $flag = true;
                                              break;
                                          }
                                      }
                                  }
                              }
                              if(array_key_exists($value,$attr)){
                                  $count =  $attr[$value];
                              }
                          @endphp
                          <li> <input id="{{ \App\Attribute::find($attribute['id'])->name }}-{{ $key }}" type="checkbox" id="attribute_{{ $attribute['id'] }}_value_{{ $value }}" name="attribute_{{ $attribute['id'] }}[]" value="{{ $value }}" @if ($flag) checked @endif onchange="filter()">
                          <label for="{{ \App\Attribute::find($attribute['id'])->name }}-{{ $key }}" style="display: inline !important;margin-left: 10px !important;padding-top: 0.5rem !important;">{{$value}}<span class="count" style="padding: .25rem 0 .5rem !important;">({{$count}})</span></label></li>

                      @endforeach
                 @endif
               </ul>
            </div>
          @endif
        @endforeach

        @if(isset($tags) && $tags != [])
          <div class="widget widget_product_tag_cloud">
            <h2 class="widget-title">POPULAR TAGS</h2>
            <div class="tagcloud">
              @foreach($tags as $tag)
              <a href="{{ route('products.tag', $tag) }}">{{$tag}}</a>
              @endforeach
              </div>
          </div>
        @endif
    </form> -->


    </div>


    <style media="screen">

      .accordion__button {
        justify-content: space-between;
        box-shadow: 0 0 0 0 rgb(0 0 0 / 20%) !important;
        padding: 15px 0 !important;
        border-top: 2px solid #f0f0f0;
      }

      .accordion__button:after {
        content: '\f107';
        display: block;
        margin-left: 15px;
        font-family: 'Font Awesome 5 free';
        font-weight: bold;
        float: right;
        font-size: 20px;
        color: #000000;
      }
      .accordion__button.is-active:after {
       content: '\f105';
      }
      .accordion__button.is-active {
         background: #ffffff;

         color: #000000;
      }

      ul.product-categories li {
        line-height: 30px;
      }

    .accordion {
            box-shadow: 0 0 0 0 rgb(0 0 0 / 25%);
            margin: 0px;
        }

       .accordion__button:focus {
         background: #ffffff;
         outline: none;
         color: #000000;
      }

      .text.show-more .moreText {
        display: inline;
        }
        .text.show-more .dots {
        display: none;
        }

        .moreText {
          display: none;
        }

        a.read-more-btn {
            cursor: pointer;
            font-size: 16px;
            color: #2874f0;
            font-weight: 500;
            padding: 0;
            margin: 24px 0;
        }

        .text.show-more a.read-more-btn {
            display: none !important;
        }

    </style>


      <div class="col lg-9 md--8 xs-12 xs-margin-bottom-double flex-80">
          @isset($occasion_id)
              <input type="hidden" name="occasion" value="{{ \App\Occasion::find($occasion_id)->slug }}">
          @endisset

          @isset($fabric_id)
          <input type="hidden" name="fabric" value="{{ \App\Fabric::find($fabric_id)->slug }}">
          @endisset

          @isset($category_id)
          <input type="hidden" name="category" value="{{ \App\Category::find($category_id)->slug }}">
          @endisset

          @isset($subcategory_id)
              <input type="hidden" name="subcategory" value="{{ \App\SubCategory::find($subcategory_id)->slug }}">
          @endisset
          @isset($subsubcategory_id)
              <input type="hidden" name="subsubcategory" value="{{ \App\SubSubCategory::find($subsubcategory_id)->slug }}">
          @endisset
            <div style="margin-bottom:8px">

              <form class="" id="search-forms" action="{{ route('search') }}" method="GET">
                <div class="col-xl-12">
                  <div class="_5THWM1">
                      <span class="_2i7N3j">Sort By</span>
                      <div class="_10UF8M @isset($sort_by) @if ($sort_by == '5') _3LsR0e @endif @endisset" onclick="filters('5')">Most Views</div>
                      <div class="_10UF8M @isset($sort_by) @if ($sort_by == '1') _3LsR0e @endif @endisset" onclick="filters('1')">Newest</div>
                      <div class="_10UF8M @isset($sort_by) @if ($sort_by == '2') _3LsR0e @endif @endisset" onclick="filters('2')">Oldest</div>
                      <div class="_10UF8M @isset($sort_by) @if ($sort_by == '3') _3LsR0e @endif @endisset" onclick="filters('3')">Price Low To High</div>
                      <div class="_10UF8M @isset($sort_by) @if ($sort_by == '4') _3LsR0e @endif @endisset" onclick="filters('4')">Price High To Low</div>
                      <input type="hidden" name="sort_by" id="sort_by" />
                      <button style="display:none" type="submit" id="control-qid13228"></button>
                  </div>
                </div>
              </form>
          </div>
              <div class="w-layout-grid c-products3x3">
                @foreach ($products as $key => $product)
                  <div class="c-product-thumb">
                      <div class="c-product-thumb__top">

                          <div class="_3ywSr_">
                            <div class="_312yBx SFzpgZ">
                              <a href="{{ route('product', $product->slug) }}" class="margin-bottom-small w-inline-block d-flex">
                                    <img class="product-img" src="{{ asset($product->thumbnail_img) }}" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                    @if(isset($product->discount) && $product->discount != 0)
                                      <div class="c-product-thumb__discount">
                                          <div>{{TotaldiscountPercent($product->id)}}%</div>
                                      </div>
                                    @endif
                                </a>
                            </div>
                        </div>
                          <div class="product_details">
                            <div class="text-xsmall weight-is-medium margin-bottom-small">
                              <a href="{{ route('products.category',$product->category->slug)}}">{{$product->category->name}}</a>
                            </div>
                            <a href="{{ route('product', $product->slug) }}" class="w-inline-block">
                                <div class="c-product__title">{{$product->name}}</div>
                            </a>
                            <div class="c-product__price-wrapper">
                              @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                                <div class="c-product__price is-slashed margin-right-small">{{ home_base_price($product->id) }}</div>
                              @else
                                <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                              @endif
                              <input type="hidden" name="id" value="{{ $product->id }}">
                              <a href="javascript:void(0)" onclick="addtocartbtns({{$product->id}})" class="button-rheycart">
                                Add to cart
                              </a>
                            </div>
                          </div>
                      </div>
                  </div>
                @endforeach
              </div>

        <div class="c-paging">
          <div class="iconfont margin-right-small is-11px"><em class="iconfont__no-italize"></em></div>

            @for ($i = 1; $i <= $products->lastPage() - 1; $i++)
              <a href="{{ $products->url($i) }}" class="c-paging__number {{ ($products->currentPage() == $i) ? 'is-dark is-rounded on-dark' : '' }}">{{ $i }}</a>
            @endfor
          <a href="{{ $products->url($products->lastpage()) }}" class="c-paging__number {{ ($products->lastpage() == $products->currentPage()) ? 'is-dark is-rounded on-dark' : '' }}">{{$products->lastPage()}}</a><a href="#" class="iconfont margin-left-small is-11px"><em class="iconfont__no-italize"></em></a> </div>
      </div>
    </div>
  </div>

@include('frontend.partials.subscribe')

</div>


@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }

        function filters(id){
          $("#sort_by").val(id);
          $('#search-forms').submit();
          $("#control-qid13228").click();
        }

        function Quick(id){
          $('.c-overlay').html(null);
          $.post('{{ route('quick.view') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
            $(".c-overlay").html(data);
          });
        }

    function closetest() {
      $('.c-overlay').hide();
    }

    function addtocartbtns(id) {
      $.post('{{ route('cart.addToCart') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
        $('.icon-button__badge').html(parseInt($('.icon-button__badge').html())+1);
          updateNavCart();
          showFrontendAlert('success', 'Item added in cart.');
      });
    }


    </script>

    <style media="screen">

    .footer-top-section.bg-gray {
        display: none;
    }


    @media screen and (max-width: 900px) {
      .mobile-mb-0 {
          margin-bottom: 0px !important;
      }
    }
    </style>


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

              function GetImage(id, url, price) {
                  $("._31hAvz").removeClass("active");
                  $("#image_"+id).addClass("active");
                  $("#big_image").attr("src", url);
                  $('#chosen_price').text('₹'+price);
              }

              function CheckPincode(params) {
                var pincode = $("#pincode").val();
                var productid= $("#productid").val();
                $("#pinmessage").text('');
                if(pincode == ""){
                    $("#pinmessage").addClass('enterpincode');
                    $("#pinmessage").text('Enter A Pincode');
                }else{
                  $("#pinmessage").text('');
                  $("#pinmessage").removeClass('enterpincode');

                  $.post('{{ route('pincode.check') }}',{_token:'{{ csrf_token() }}', id:productid, pincode:pincode}, function(data){

                        if(data.status == true){
                            $("#pinmessage").text('Product is availble for this pincode');
                        }else{
                          $("#pinmessage").addClass('enterpincode');
                            $("#pinmessage").text('Product is not availble for this pincode');
                        }

                    });
                }

              }

        </script>

@endsection
