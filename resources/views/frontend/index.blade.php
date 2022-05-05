@extends('frontend.layouts.app')
@section('content')

<div class="section-Banner position-relative ">
    <div class="is-fullwidth">
        <div class="col lg-12 lg-no-padding-lr no-margin-bottom" style="width:100%;">
            <div data-delay="3000" data-animation="fade" data-autoplay="1" data-easing="ease-out-expo"
                data-duration="900" data-infinite="1" class="c-heroslider w-slider">
                <div class="c-heroslider_mask w-slider-mask">
                  @foreach(App\Slider::where('published', 1)->get() as $key=>$slider)
                    <div class="c-heroslider__slide w-slide">
                        <div class="c-heroslider__content img" style="background-image: url(/public/{{$slider->photo}});">
                            <div class="container is-wide mo-light-bg">
                                <div class="col lg-7 md-12 position-relative">
                                    <h2 class="heading-alpha on-dark">Welcome To<br>
                                        <span style="color: #c6faff;">Rhey Cart</span></h2>
                                    <div class="flexh-align-center xs-is-wrapping overflow-hidden">
                                      <a data-w-id="hovereffect" href="{{ $slider->url }}"
                                          class="button-primary animated margin-top w-inline-block">
                                          <div class="button-primary-text animation-text-1">collection</div>
                                      </a>
                                    </div>
                                </div>
                                <div class="col lg-5"></div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
                <div class="w-slider-arrow-left">
                    <div class="w-icon-slider-left"></div>
                </div>
                <div class="w-slider-arrow-right">
                    <div class="w-icon-slider-right"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="Trending_saree">
  <div class="container" style="justify-content: center;">
    <div class="section-title hedding col text-align-center pt-20" style="margin: 0 !important;">
      <h5 class="hedding-title text-center"><hr><span>Trending Sarees</span></h5>
      <p>Our latest sarees collections have been crafted by some of the best clothing designers in the world</p>
    </div>
  </div>
  <div class="container is-wide project-boxes justify-content-center mr-ml-auto">
      <div class="col lg-6 md-6 sm-12 lastudio-banner">
        <a href="">
          <div class="project-box">
              <div class="project-thumb backface">
                  <div class="lastudio-banner-overlays"></div>
                  <div class="thumb bg-img-c">
                    <img src="../public/frontend/images/rheycart-img/banner-01.png" alt="">
                  </div>
                  <div class="lastudio-banner-content img-hedding-n first" style="padding: 30px;">KAMJIVRAM SILK SAREE</div>
              </div>
          </div>
        </a>
      </div>
      <div class="col lg-6 md-6 sm-12">
          <div class="col-lg-12 lastudio-banner mb-50">
          <a href="">
              <div class="project-box">
                  <div class="project-thumb">
                      <div class="lastudio-banner-overlay"></div>
                      <div class="thumb bg-mobile">
                          <img src="../public/frontend/images/rheycart-img/banner-02.png" alt="">
                      </div>
                      <div style="justify-content: left !important;padding: 30px 50px;"
                          class="lastudio-banner-content img-hedding-n">GEORGETTE SAREE</div>
                  </div>
              </div></a>
          </div>
          <div class="col-lg-12 lastudio-banner margin-auto">
            <a href="">
              <div class="project-box">
                  <div class="project-thumb">
                      <div class="lastudio-banner-overlay"></div>
                      <div class="thumb bg-mobile">
                          <img src="../public/frontend/images/rheycart-img/banner-03.png" alt="">
                      </div>
                      <div style="justify-content: left !important;padding: 30px 50px;"
                          class="lastudio-banner-content img-hedding-n">COTTON SILK SAREE</div>
                  </div>
              </div></a>
          </div>
      </div>
  </div>
</section>

<!--
<section class="mobile-none">
    @php
    $banner = App\Banner::where('published', 1)->where('position', 7)->get()->take(3);
  @endphp
  <div class="container is-wide project-boxes justify-content-center mr-ml-auto">
    @if (isset($banner) && $banner != "")
      <div class="col lg-6 md-6 sm-12 lastudio-banner">
        <a href="{{ $banner[0]->url }}" >
          <div class="project-box">
              <div class="project-thumb backface">
                  <div class="lastudio-banner-overlays"></div>
                  <div class="thumb bg-img-c"
                      style="background-image: url({{ asset($banner[0]->photo) }});">
                  </div>
                  <div class="lastudio-banner-content img-hedding-n first" style="padding: 30px;">KAMJIVRAM SILK SAREE</div>
              </div>
          </div></a>
      </div>
    @endif
    @if (isset($banner) && $banner != "")
      <div class="col lg-6 md-6 sm-12">
          <div class="col-lg-12 lastudio-banner mb-50">
          <a href="{{ $banner[1]->url }}" >
              <div class="project-box">
                  <div class="project-thumb">
                      <div class="lastudio-banner-overlay"></div>
                      <div class="thumb bg-mobile"
                          style="background-image: url({{ asset($banner[1]->photo) }});">
                      </div>
                      <div style="justify-content: left !important;padding: 30px 50px;"
                          class="lastudio-banner-content img-hedding-n">GEORGETTE SAREE</div>
                  </div>
              </div></a>
          </div>
          <div class="col-lg-12 lastudio-banner">
            <a href="{{ $banner[2]->url }}" >
              <div class="project-box">
                  <div class="project-thumb">
                      <div class="lastudio-banner-overlay"></div>
                      <div class="thumb bg-mobile"
                          style="background-image: url({{ asset($banner[2]->photo) }});">
                      </div>
                      <div style="justify-content: left !important;padding: 30px 50px;"
                          class="lastudio-banner-content img-hedding-n">COTTON SILK SAREE</div>
                  </div>
              </div></a>
          </div>
      </div>
    @endif
  </div>
</section> -->
<!--
<section class="mobile-block">
  <div class="container">
    <div class="section-title col block-centered text-align-center both-border pt-50">
      <span class="title-tag">Trending Sarees</span>
      <p>Our latest sarees collections have been crafted <br> by some of the best clothing designers in the <br> world</p>
    </div>
  </div>

  @php
    $banner = App\Banner::where('published', 1)->where('position', 7)->get()->take(3);
  @endphp
  <div class="container is-wide project-boxes justify-content-center mr-ml-auto">
    @if (isset($banner) && $banner != "")
      <div class="col lg-4 md-4 sm-12 lastudio-banner">
        <a href="{{ $banner[0]->url }}" >
          <div class="project-box">
              <div class="project-thumb">
                  <div class="lastudio-banner-overlay"></div>
                  <div class="thumb bg-img-c"
                      style="background-image: url({{ asset($banner[0]->photo) }});">
                  </div>
                  <div class="lastudio-banner-content img-hedding-n first" style="padding: 30px;">KAMJIVRAM SILK SAREE</div>
              </div>
          </div></a>
      </div>
    @endif
    @if (isset($banner) && $banner != "")
      <div class="col lg-4 md-4 sm-12 lastudio-banner">
          <a href="{{ $banner[1]->url }}" >
              <div class="project-box">
                  <div class="project-thumb">
                      <div class="lastudio-banner-overlay"></div>
                      <div class="thumb bg-mobile"
                          style="background-image: url({{ asset($banner[1]->photo) }});">
                      </div>
                      <div style="justify-content: left !important;padding: 30px 50px;"
                          class="lastudio-banner-content img-hedding-n">GEORGETTE SAREE</div>
                  </div>
              </div></a>
          </div>

          <div class="col lg-4 md-4 sm-12 lastudio-banner">
            <a href="{{ $banner[2]->url }}" >
              <div class="project-box">
                  <div class="project-thumb">
                      <div class="lastudio-banner-overlay"></div>
                      <div class="thumb bg-mobile"
                          style="background-image: url({{ asset($banner[2]->photo) }});">
                      </div>
                      <div style="justify-content: left !important;padding: 30px 50px;"
                          class="lastudio-banner-content img-hedding-n">COTTON SILK SAREE</div>
                  </div>
              </div></a>
          </div>
    @endif
  </div>
</section> -->

<section class="section_Kurti section_gap">
  <div class="container" style="justify-content: center;">
    <div class="section-title hedding col text-align-center pt-20" style="margin: 0 !important;">
      <h5 class="hedding-title text-center"><hr><span>Popular Sarees</span></h5>
      <p>Lorem ipsum dolor sit consectetur adipiscing elit eiusmod tempor incididunt ut labore et dolore</p>
    </div>
  </div>
  <div class="container is-wide project-boxes justify-content-center mr-ml-auto">
    <div class="col lg-4 md-4 sm-12 mb-50">
      <div class="service-box text-left">
          <div class="service-img" style="box-shadow: 0 0 2px 0;">
            <div class="service-picture">
                <a href="">
                      <img src="../public/frontend/images/rheycart-img/Silk Saree.jpg" alt="">
                </a>
            </div>
          </div>
          <div class="service__content">
            <h3>Silk Saree</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua</p>
            <a class="button_btn_shop_now" href=""> Shop Now </a>
          </div>
      </div>
    </div>
    <div class="col lg-4 md-4 sm-12 mb-50">
      <div class="service-box text-left">
          <div class="service-img" style="box-shadow: 0 0 2px 0;">
            <div class="service-picture">
                <a href="">
                      <img src="../public/frontend/images/rheycart-img/Cotton Silk.jpg" alt="">
                </a>
            </div>
          </div>
          <div class="service__content">
            <h3>Cotton Silk</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua</p>
            <a class="button_btn_shop_now" href=""> Shop Now </a>
          </div>
      </div>
    </div>
    <!-- <div class="col lg-4 md-4 sm-12 mb-50">
      <div class="service-box text-left">
          <div class="service-img">
            <div class="service-picture">
                <a href="">
                      <img src="../public/frontend/images/rheycart-img/Georgette Saree.jpg" alt="">
                </a>
            </div>
          </div>
          <div class="service__content">
            <h3>Georgette Saree</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua</p>
            <a class="button_btn_shop_now" href=""> Shop Now </a>
          </div>
      </div>
    </div> -->
    <div class="col lg-4 md-4 sm-12 mb-50">
      <div class="service-box text-left">
          <div class="service-img" style="box-shadow: 0 0 2px 0;">
            <div class="service-picture">
                <a href="">
                      <img src="../public/frontend/images/rheycart-img/Chiffon Saree.jpg" alt="">
                </a>
            </div>
          </div>
          <div class="service__content">
            <h3>Chiffon Saree</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua</p>
            <a class="button_btn_shop_now" href=""> Shop Now </a>
          </div>
      </div>
    </div>
  </div>
</section>

<!-- <section class="section_Kurti section_gap">
  <div class="container" style="justify-content: center;">
    <div class="section-title hedding col text-align-center pt-20" style="margin: 0 !important;">
      <h5 class="hedding-title text-center"><hr><span>Popular Sarees</span></h5>
      <p>Lorem ipsum dolor sit consectetur adipiscing elit eiusmod tempor incididunt ut labore et dolore</p>
    </div>
  </div>
  <div class="container is-wide project-boxes justify-content-center mr-ml-auto">
    <div class="col lg-4 md-4 sm-12 mb-50">
      <div class="service-box text-left">
          <div class="service-img">
            <div class="service-picture">
                <a href="">
                      <img src="../public/frontend/images/rheycart-img/Party Wear Kurti.png" alt="">
                </a>
            </div>
          </div>
          <div class="service__content">
            <h3>Party Wear Kurti</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua</p>
            <a class="button_btn_shop_now" href=""> Shop Now </a>
          </div>
      </div>
    </div>
    <div class="col lg-4 md-4 sm-12 mb-50">
      <div class="service-box text-left">
          <div class="service-img">
            <div class="service-picture">
                <a href="">
                      <img src="../public/frontend/images/rheycart-img/Bollywood Kurti.png" alt="">
                </a>
            </div>
          </div>
          <div class="service__content">
            <h3>Bollywood Kurti</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua</p>
            <a class="button_btn_shop_now" href=""> Shop Now </a>
          </div>
      </div>
    </div>
    <div class="col lg-4 md-4 sm-12 mb-50">
      <div class="service-box text-left">
          <div class="service-img">
            <div class="service-picture">
                <a href="">
                      <img src="../public/frontend/images/rheycart-img/Fashion Kurti.png" alt="">
                </a>
            </div>
          </div>
          <div class="service__content">
            <h3>Fashion Kurti</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua</p>
            <a class="button_btn_shop_now" href=""> Shop Now </a>
          </div>
      </div>
    </div>
  </div>
</section> -->

<section class="Popular_Kurti section_gap">
  <div class="container" style="justify-content: center;">
    <div class="section-title hedding col text-align-center pt-20">
      <h5 class="hedding-title text-center"><hr><span>Shop by Category</span></h5>
      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p> -->
    </div>
  </div>
    <div class="container position-relative is-wide">
        <div class="col lg-6 md-6 sm-12 lastudio-banner no-padding-lr margin-banner" style="margin: 10px 10px !important;">
            <a href="">
                <div class="lastudio-banner-overlay"></div>
                <img src="../public/frontend/images/rheycart-img/image-1.jpg" alt="" class="lastudio-banner-img">
                <div class="lastudio-banner-content">Saree</div>
            </a>
        </div>
        <div class="col lg-6 md-6 sm-12 lastudio-banner no-padding-lr margin-banner" style="margin: 10px 10px !important;">
            <a href="">
                <div class="lastudio-banner-overlay"></div>
                <img src="../public/frontend/images/rheycart-img/image-2.jpg" alt="" class="lastudio-banner-img">
                <div class="lastudio-banner-content">Kurti</div>
            </a>
        </div>
      </div>
      <div class="container position-relative is-wide">
        <div class="col lg-6 md-6 sm-12 lastudio-banner no-padding-lr margin-banner" style="margin: 10px 10px !important;">
            <a href="">
                <div class="lastudio-banner-overlay"></div>
                <img src="../public/frontend/images/rheycart-img/image-3.jpg" alt="" class="lastudio-banner-img">
                <div class="lastudio-banner-content">Dupatta</div>
            </a>
        </div>
        <div class="col lg-6 md-6 sm-12 lastudio-banner no-padding-lr margin-banner" style="margin: 10px 10px !important;">
            <a href="">
                <div class="lastudio-banner-overlay"></div>
                <img src="../public/frontend/images/rheycart-img/image-4.jpg" alt="" class="lastudio-banner-img">
                <div class="lastudio-banner-content">Blouse</div>
            </a>
        </div>
      </div>
</section>


<style>
.col.lg-4.lg-md-sm-no-margin-bottom.mt-80.xs-12 {
    z-index: 1;
}
</style>
<!-- <section>
  <div class="container is-wide">
    <div class="section-title col block-centered text-align-center both-border pt-50">
      <span class="title-tag">Popular Kurti</span>
      <p>Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit, sed do eiusmod tempor incididunt  <br> ut labore et dolore</p>
    </div>
  </div>
  <div class="container is-wide service-boxes">
    @php
        $counts = App\HomeCategory::where('status', 1)->count();
    @endphp
    @if($counts > 0)
    @foreach(App\HomeCategory::where('status', 1)->get()->take(4) as $item)
      @if (\App\SubCategory::find($item->subsubcategories) != null)
            @php $cat = \App\SubCategory::find($item->subsubcategories); @endphp
      <div class="col lg-3 md-6 sm-12 mb-50">
          <div class="service-box text-left">
              <div class="service-img">
                <div class="service-picture">
                    <a href="">
                          <img src="{{ asset($cat->banner) }}" alt="">
                    </a>
                </div>
              </div>
              <div class="service__content">
                <h3>{{$cat->name}}</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua</p>
                <a class="button_btn_shop_now" href="{{route('products.subcategory', $cat->slug)}}"> Shop Now </a>
              </div>
          </div>
      </div>
      @endif
    @endforeach
  @endif

  </div>
</section> -->

<!-- <section>
  <div class="container is-wide">
    <div class="section-title col block-centered text-align-center both-border pt-50">
      <span class="title-tag">Shop by Category</span>
    </div>
  </div>
  <div class="container is-wide project-boxes">
    @foreach(App\Category::get()->take(4) as $category)
      <div class="col lg-3 md-6 sm-12 text-align-center lastudio-banner">
        <div class="project-box">
            <div class="project-thumb">
                <div class="thumb bg-img-c" style="background-image: url({{ asset($category->banner) }});"></div>
            </div>
            <div class="project-desc text-center">
                <h4><a>{{ $category->name }}</a></h4>
                <p>MORE COLLECTION</p>
                <a href="{{ route('products.category', $category->slug) }}" class="project-link">
                  <i class="far fa-long-arrow-alt-right"></i>
                </a>
            </div>
        </div>
      </div>
    @endforeach
  </div>
</section> -->

<!-- <div class="container is-wide project-boxes">
    <div class="col lg-3 md-6 sm-12 text-align-center lastudio-banner">
      <div class="project-box">
          <div class="project-thumb">
              <div class="thumb bg-img-c" style="background-image: url(../public/uploads/categories/banner/0ND1DkKwf8HVcMuWXG8n19FZJVhahoZTbidAcaYL.jpeg);"></div>
          </div>
          <div class="project-desc text-center">
              <h4><a>KURTI</a></h4>
              <p>MORE COLLECTION</p>
              <a href="" class="project-link">
                <i class="far fa-long-arrow-alt-right"></i>
              </a>
          </div>
      </div>
    </div>
    <div class="col lg-3 md-6 sm-12 text-align-center lastudio-banner">
      <div class="project-box">
          <div class="project-thumb">
              <div class="thumb bg-img-c" style="background-image: url(../public/uploads/categories/banner/0ND1DkKwf8HVcMuWXG8n19FZJVhahoZTbidAcaYL.jpeg);"></div>
          </div>
          <div class="project-desc text-center">
              <h4><a>DUPATTA</a></h4>
              <p>MORE COLLECTION</p>
              <a href="" class="project-link">
                <i class="far fa-long-arrow-alt-right"></i>
              </a>
          </div>
      </div>
    </div>
    <div class="col lg-3 md-6 sm-12 text-align-center lastudio-banner">
      <div class="project-box">
          <div class="project-thumb">
              <div class="thumb bg-img-c" style="background-image: url(../public/uploads/categories/banner/0ND1DkKwf8HVcMuWXG8n19FZJVhahoZTbidAcaYL.jpeg);"></div>
          </div>
          <div class="project-desc text-center">
              <h4><a>SAREE</a></h4>
              <p>MORE COLLECTION</p>
              <a href="" class="project-link">
                <i class="far fa-long-arrow-alt-right"></i>
              </a>
          </div>
      </div>
    </div>
    <div class="col lg-3 md-6 sm-12 text-align-center lastudio-banner">
      <div class="project-box">
          <div class="project-thumb">
              <div class="thumb bg-img-c" style="background-image: url(../public/uploads/categories/banner/0ND1DkKwf8HVcMuWXG8n19FZJVhahoZTbidAcaYL.jpeg);"></div>
          </div>
          <div class="project-desc text-center">
              <h4><a>BLOUSE</a></h4>
              <p>MORE COLLECTION</p>
              <a href="" class="project-link">
                <i class="far fa-long-arrow-alt-right"></i>
              </a>
          </div>
      </div>
    </div>
</div> -->

<section class="banner_slider">
  <section class="wow fadeIn example no-padding no-transition slider-top">
        <div style="min-height: 50px;">
            <div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto;
            top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="https://www.jssor.com/theme/svg/loading/static-svg/spin.svg" />
            </div>
            <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1500px; height: 500px; overflow: hidden;">
                <div>
                    <img data-u="image" src="../public/frontend/images/rheycart-img/bg-img.png"  class="slider" />
                </div>
                <div>
                    <img data-u="image" src="../public/frontend/images/rheycart-img/bg-img.png" class="slider" />
                </div>
                <div>
                    <img data-u="image" src="../public/frontend/images/rheycart-img/bg-img.png" class="slider" />
                </div>
            </div>
            <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
        </div>
    </div>
</section>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jssor-slider/27.1.0/jssor.slider.min.js'></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {

          var options = {
              $FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
              $AutoPlay: 1,                                       //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
              $Idle: 4000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
              $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

              $ArrowKeyNavigation: 1,   			                //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
              $SlideEasing: $Jease$.$OutQuint,                    //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
              $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
              $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
              //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
              //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
              $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
              $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
              $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
              $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

              $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                  $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                  $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                  $SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                  $Orientation: 1                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
              },

              $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                  $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                  $ChanceToShow: 2                                 //[Optional] Steps to go for each navigation request, default value is 1
              }
          };

          var jssor_slider1 = new $JssorSlider$("slider1_container", options);

          //responsive code begin
          //you can remove responsive code if you don't want the slider scales while window resizing
          function ScaleSlider() {
              var bodyWidth = document.body.clientWidth;
              if (bodyWidth)
                  jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
              else
                  window.setTimeout(ScaleSlider, 30);
          }
          ScaleSlider();

          $(window).bind("load", ScaleSlider);
          $(window).bind("resize", ScaleSlider);
          $(window).bind("orientationchange", ScaleSlider);
          //responsive code end
      });
</script>
</section>



<style media="screen">
  .section-title.hedding {
    width: 470px;
  }

  .jssorl-009-spin img {
      animation-name: jssorl-009-spin;
      animation-duration: 1.6s;
      animation-iteration-count: infinite;
      animation-timing-function: linear;
  }

  @keyframes jssorl-009-spin {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }
  .jssorb031 {position:absolute;}
  .jssorb031 .i {position:absolute;cursor:pointer;}
  .jssorb031 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.3;}
  .jssorb031 .i:hover .b {fill:#fff;fill-opacity:.7;stroke:#000;stroke-opacity:.5;}
  .jssorb031 .iav .b {fill:#fff;stroke:#000;fill-opacity:1;}
  .jssorb031 .i.idn {opacity:.3;}
  .jssora051 {display:block;position:absolute;cursor:pointer;}
  .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
  .jssora051:hover {opacity:.8;}
  .jssora051.jssora051dn {opacity:.5;}
  .jssora051.jssora051ds {opacity:.3;pointer-events:none;}

  section.section_gap {
    padding: 30px 0;
  }

  section.Trending_saree .project-boxes .project-box .project-thumb.backface {
    height: 700px;
    object-fit: cover;
    width: 100%;
    overflow: hidden;
    object-position: top;
  }

  section.Trending_saree .project-boxes .project-box .project-thumb {
    height: 330px;
    width: 100%;
    overflow: hidden;
  }

  .project-boxes .service-box .service-picture img {
    width: 100%;
    height: 720px;
    object-fit: cover;
    object-position: center top;
  }
</style>



<!-- @php
$banner = App\Banner::where('published', 1)->where('position', 1)->first();
@endphp
<section>
  <div class="section no-padding-top-bottom overflow-hidden">
    <div class="is-full-wide">
      <div class="col lg-12 no-margin-bottom position-relative no-padding-lr overflow-hidden">
        <div class="container container-nested align-item-center h-650" style=" background-image: url({{asset($banner->photo)}});">
          <div class="col lg-3 md-12"></div>
          <div class="col lg-4 md-8 lg-md-sm-no-margin-bottom mt-80 xs-12">
            <div class="on-dark size-h1 margin-bottom-small">HEY! OUR EYES ARE ON YOU</div>
            <a data-w-id="hovereffect" href="{{route('products')}}" class="button-primary animated margin-top w-inline-block">
              <div class="button-primary-text animation-text-1">find out more</div>
              <div class="button-primary-text for-hover animation-text-2">let's go <span class="fa margin-left"></span></div>
            </a>
          </div>
          <div class="col lg-5 md-12"></div>
        </div>
      </div>
    </div>
  </div>
</section> -->


<style media="screen">
  section .producat_slider .slider {
    width: auto;
    margin: 15px 50px;
    }

    .slider .slick-prev:before,
    .slider .slick-next:before {
      color: #292e3e;
      font-weight: 900 !important;
      font-family: 'Font Awesome 5 Free' !important;
    }

    .slider .slick-prev:before , .slick-next:before {
      content: "" !important;
      background-image: url('../public/frontend/images/icons/slider-arrow.svg');
      position: absolute;
      width: 16px;
      height: 30px;
    }

     .slick-next:before {
      transform: rotate(180deg);
    }

    section .producat_slider .slick-prev {
      z-index: 5;
    }
    .producat_slider_card .c-product-thumb {
      margin: 10px 20px;
      box-shadow: rgb(0 0 0 / 18%) 0 0 4px;
      background-color: #ffffff !important;
    }

     .producat_slider_card .product_details .weight-is-medium a {
      font-size: 14px;
      color: #707070 !important;
      margin-right: 12px;
    }

    .producat_slider_card .product_details .c-product_title {
      margin: 10px 0;
      color: #383838;
      font-weight: 500;
      }
</style>

<section class="section_products_slider section_gap">
  <div class="container" style="justify-content: center;">
    <div class="section-title hedding col text-align-center pt-20">
      <h5 class="hedding-title text-center"><hr><span>Trending Now</span></h5>
    </div>
  </div>
  <div class="producat_slider">
        <div class="slider">
            <div>
              <div class="producat_slider_card">
                <div class="c-product-thumb">
                    <div class="c-product-thumb__top">

                        <div class="_3ywSr_">
                          <div class="_312yBx SFzpgZ">
                            <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="margin-bottom-small w-inline-block d-flex">
                                  <img class="product-img" src="http://rheycart.codealphainfotech.com/public/uploads/products/thumbnail/kbs7OXkIHtJLuBNGm5UXyPTnu8SvTBEBXAhHwDtb.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                  <div class="c-product-thumb__discount">
                                    <div>77%</div>
                                  </div>
                              </a>
                          </div>
                      </div>
                        <div class="product_details">
                          <div class="d-flex" style="align-items: center;">
                            <div class="text-xsmall weight-is-medium">
                              <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                            </div>
                            <div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div>
                          </div>
                          <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="w-inline-block">
                              <div class="c-product_title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                          </a>
                          <div class="c-product__price-wrapper">
                            <div class="c-product__price margin-right-small">₹1,250</div>
                            <div class="c-product__price is-slashed">₹1,250</div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div>
              <div class="producat_slider_card">
                <div class="c-product-thumb">
                    <div class="c-product-thumb__top">

                        <div class="_3ywSr_">
                          <div class="_312yBx SFzpgZ">
                            <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="margin-bottom-small w-inline-block d-flex">
                                  <img class="product-img" src="http://rheycart.codealphainfotech.com/public/uploads/products/thumbnail/kbs7OXkIHtJLuBNGm5UXyPTnu8SvTBEBXAhHwDtb.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                  <div class="c-product-thumb__discount">
                                    <div>77%</div>
                                  </div>
                              </a>
                          </div>
                      </div>
                        <div class="product_details">
                          <div class="d-flex" style="align-items: center;">
                            <div class="text-xsmall weight-is-medium">
                              <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                            </div>
                            <div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div>
                          </div>
                          <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="w-inline-block">
                              <div class="c-product_title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                          </a>
                          <div class="c-product__price-wrapper">
                            <div class="c-product__price margin-right-small">₹1,250</div>
                            <div class="c-product__price is-slashed">₹1,250</div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div>
              <div class="producat_slider_card">
                <div class="c-product-thumb">
                    <div class="c-product-thumb__top">

                        <div class="_3ywSr_">
                          <div class="_312yBx SFzpgZ">
                            <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="margin-bottom-small w-inline-block d-flex">
                                  <img class="product-img" src="http://rheycart.codealphainfotech.com/public/uploads/products/thumbnail/kbs7OXkIHtJLuBNGm5UXyPTnu8SvTBEBXAhHwDtb.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                  <div class="c-product-thumb__discount">
                                    <div>77%</div>
                                  </div>
                              </a>
                          </div>
                      </div>
                        <div class="product_details">
                          <div class="d-flex" style="align-items: center;">
                            <div class="text-xsmall weight-is-medium">
                              <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                            </div>
                            <div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div>
                          </div>
                          <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="w-inline-block">
                              <div class="c-product_title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                          </a>
                          <div class="c-product__price-wrapper">
                            <div class="c-product__price margin-right-small">₹1,250</div>
                            <div class="c-product__price is-slashed">₹1,250</div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div>
              <div class="producat_slider_card">
                <div class="c-product-thumb">
                    <div class="c-product-thumb__top">

                        <div class="_3ywSr_">
                          <div class="_312yBx SFzpgZ">
                            <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="margin-bottom-small w-inline-block d-flex">
                                  <img class="product-img" src="http://rheycart.codealphainfotech.com/public/uploads/products/thumbnail/kbs7OXkIHtJLuBNGm5UXyPTnu8SvTBEBXAhHwDtb.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                  <div class="c-product-thumb__discount">
                                    <div>77%</div>
                                  </div>
                              </a>
                          </div>
                      </div>
                        <div class="product_details">
                          <div class="d-flex" style="align-items: center;">
                            <div class="text-xsmall weight-is-medium">
                              <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                            </div>
                            <div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div>
                          </div>
                          <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="w-inline-block">
                              <div class="c-product_title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                          </a>
                          <div class="c-product__price-wrapper">
                            <div class="c-product__price margin-right-small">₹1,250</div>
                            <div class="c-product__price is-slashed">₹1,250</div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div>
              <div class="producat_slider_card">
                <div class="c-product-thumb">
                    <div class="c-product-thumb__top">

                        <div class="_3ywSr_">
                          <div class="_312yBx SFzpgZ">
                            <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="margin-bottom-small w-inline-block d-flex">
                                  <img class="product-img" src="http://rheycart.codealphainfotech.com/public/uploads/products/thumbnail/kbs7OXkIHtJLuBNGm5UXyPTnu8SvTBEBXAhHwDtb.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                  <div class="c-product-thumb__discount">
                                    <div>77%</div>
                                  </div>
                              </a>
                          </div>
                      </div>
                        <div class="product_details">
                          <div class="d-flex" style="align-items: center;">
                            <div class="text-xsmall weight-is-medium">
                              <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                            </div>
                            <div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div>
                          </div>
                          <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="w-inline-block">
                              <div class="c-product_title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                          </a>
                          <div class="c-product__price-wrapper">
                            <div class="c-product__price margin-right-small">₹1,250</div>
                            <div class="c-product__price is-slashed">₹1,250</div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div>
              <div class="producat_slider_card">
                <div class="c-product-thumb">
                    <div class="c-product-thumb__top">

                        <div class="_3ywSr_">
                          <div class="_312yBx SFzpgZ">
                            <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="margin-bottom-small w-inline-block d-flex">
                                  <img class="product-img" src="http://rheycart.codealphainfotech.com/public/uploads/products/thumbnail/kbs7OXkIHtJLuBNGm5UXyPTnu8SvTBEBXAhHwDtb.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                  <div class="c-product-thumb__discount">
                                    <div>77%</div>
                                  </div>
                              </a>
                          </div>
                      </div>
                        <div class="product_details">
                          <div class="d-flex" style="align-items: center;">
                            <div class="text-xsmall weight-is-medium">
                              <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                            </div>
                            <div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div>
                          </div>
                          <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="w-inline-block">
                              <div class="c-product_title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                          </a>
                          <div class="c-product__price-wrapper">
                            <div class="c-product__price margin-right-small">₹1,250</div>
                            <div class="c-product__price is-slashed">₹1,250</div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div>
              <div class="producat_slider_card">
                <div class="c-product-thumb">
                    <div class="c-product-thumb__top">

                        <div class="_3ywSr_">
                          <div class="_312yBx SFzpgZ">
                            <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="margin-bottom-small w-inline-block d-flex">
                                  <img class="product-img" src="http://rheycart.codealphainfotech.com/public/uploads/products/thumbnail/kbs7OXkIHtJLuBNGm5UXyPTnu8SvTBEBXAhHwDtb.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                  <div class="c-product-thumb__discount">
                                    <div>77%</div>
                                  </div>
                              </a>
                          </div>
                      </div>
                        <div class="product_details">
                          <div class="d-flex" style="align-items: center;">
                            <div class="text-xsmall weight-is-medium">
                              <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                            </div>
                            <div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div>
                          </div>
                          <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="w-inline-block">
                              <div class="c-product_title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                          </a>
                          <div class="c-product__price-wrapper">
                            <div class="c-product__price margin-right-small">₹1,250</div>
                            <div class="c-product__price is-slashed">₹1,250</div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div>
              <div class="producat_slider_card">
                <div class="c-product-thumb">
                    <div class="c-product-thumb__top">

                        <div class="_3ywSr_">
                          <div class="_312yBx SFzpgZ">
                            <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="margin-bottom-small w-inline-block d-flex">
                                  <img class="product-img" src="http://rheycart.codealphainfotech.com/public/uploads/products/thumbnail/kbs7OXkIHtJLuBNGm5UXyPTnu8SvTBEBXAhHwDtb.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                  <div class="c-product-thumb__discount">
                                    <div>77%</div>
                                  </div>
                              </a>
                          </div>
                      </div>
                        <div class="product_details">
                          <div class="d-flex" style="align-items: center;">
                            <div class="text-xsmall weight-is-medium">
                              <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                            </div>
                            <div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div>
                          </div>
                          <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="w-inline-block">
                              <div class="c-product_title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                          </a>
                          <div class="c-product__price-wrapper">
                            <div class="c-product__price margin-right-small">₹1,250</div>
                            <div class="c-product__price is-slashed">₹1,250</div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div>
              <div class="producat_slider_card">
                <div class="c-product-thumb">
                    <div class="c-product-thumb__top">

                        <div class="_3ywSr_">
                          <div class="_312yBx SFzpgZ">
                            <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="margin-bottom-small w-inline-block d-flex">
                                  <img class="product-img" src="http://rheycart.codealphainfotech.com/public/uploads/products/thumbnail/kbs7OXkIHtJLuBNGm5UXyPTnu8SvTBEBXAhHwDtb.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                                  <div class="c-product-thumb__discount">
                                    <div>77%</div>
                                  </div>
                              </a>
                          </div>
                      </div>
                        <div class="product_details">
                          <div class="d-flex" style="align-items: center;">
                            <div class="text-xsmall weight-is-medium">
                              <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                            </div>
                            <div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div><div class="fa is-black"></div>
                          </div>
                          <a href="http://rheycart.codealphainfotech.com/product/Printed-Fashion-Chiffon-Saree--Blue-9NIIj" class="w-inline-block">
                              <div class="c-product_title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                          </a>
                          <div class="c-product__price-wrapper">
                            <div class="c-product__price margin-right-small">₹1,250</div>
                            <div class="c-product__price is-slashed">₹1,250</div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>

        </div>
        <script type="text/javascript">
            $(()=>{
              var createSlick = ()=>{
                let slider = $(".slider");

                slider.not('.slick-initialized').slick({
                  autoplay: false,
                  infinite: true,
                  dots: false,
                  slidesToShow: 5,
                  slidesToScroll: 5,
                  responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        adaptiveHeight: true,
                      },
                    },
                    {
                      breakpoint: 1500,
                      settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                      },
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                      },
                    },
                  ],
                });
              }

              createSlick();

              $(window).on( 'resize orientationchange', createSlick );
              })
        </script>
  </div>

</section>


<!--
@php
$trendings = filter_products(\App\Product::where('published', 1)->where('todays_deal', 1 )->limit(12))->get();
@endphp
@if(count($trendings) > 0)
<section>
  <div class="container is-wide">
    <div class="section-title col block-centered text-align-center both-border pt-50">
      <span class="title-tag">Trending now</span>
    </div>
  </div>
  <div class="container is-wide service-boxes">
      <div class="col lg-12">
        <div class="w-layout-grid c-grid1x4">
        @foreach ($trendings as $key => $product)
          <div class="c-product-thumb pt-0">
            <div class="c-product-thumb__top">
              <a href="{{ route('product', $product->slug) }}" class="w-inline-block">
                <img class="product-img" src="{{ asset($product->thumbnail_img) }}" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
                @if(isset($product->discount) && $product->discount != 0)
                <div class="c-product-thumb__discount">
                  <div>{{discount($product->id)}}%</div>
                </div>
                @endif
              </a>
              <div class="product__content">
                <div class="text-xsmall weight-is-medium">
                    <a href="{{ route('products.category',$product->category->slug)}}">{{$product->category->name}}</a>
                    @php
                          $total = 0;
                          $total += $product->reviews->count();
                      @endphp
                      {{ renderStarRating($product->rating) }}
                </div>
                <a href="{{ route('product', $product->slug) }}" class="w-inline-block">
                  <div class="c-product__title"?>{{ $product->name }}</div>
                </a>
                <div class="c-product__price-wrapper">
                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                  <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                  <div class="c-product__price is-slashed">{{ home_base_price($product->id) }}</div>
                @else
                    <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach -->
          <!-- <div class="c-product-thumb">
            <div class="c-product-thumb__top">
              <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                <img class="product-img" src="../public/uploads/products/thumbnail/zzaRziaCZBBjbDCQILlZj4yqBNrJQT3NoqvORxPP.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
              </a>
              <div class="product__content">
                <div class="text-xsmall weight-is-medium">
                    <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                    <div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div>
                </div>
                <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                  <div class="c-product__title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                </a>
                <div class="c-product__price-wrapper">
                  <div class="c-product__price margin-right-small">₹1,250</div>
                  <div class="c-product__price is-slashed">₹1,250</div>
                </div>
              </div>
            </div>
          </div>
          <div class="c-product-thumb">
            <div class="c-product-thumb__top">
              <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                <img class="product-img" src="../public/uploads/products/thumbnail/zzaRziaCZBBjbDCQILlZj4yqBNrJQT3NoqvORxPP.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
              </a>
              <div class="product__content">
                <div class="text-xsmall weight-is-medium">
                    <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                    <div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div>
                </div>
                <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                  <div class="c-product__title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                </a>
                <div class="c-product__price-wrapper">
                  <div class="c-product__price margin-right-small">₹1,250</div>
                  <div class="c-product__price is-slashed">₹1,250</div>
                </div>
              </div>
            </div>
          </div>
          <div class="c-product-thumb">
            <div class="c-product-thumb__top">
              <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                <img class="product-img" src="../public/uploads/products/thumbnail/zzaRziaCZBBjbDCQILlZj4yqBNrJQT3NoqvORxPP.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
              </a>
              <div class="product__content">
                <div class="text-xsmall weight-is-medium">
                    <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                    <div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div>
                </div>
                <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                  <div class="c-product__title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                </a>
                <div class="c-product__price-wrapper">
                  <div class="c-product__price margin-right-small">₹1,250</div>
                  <div class="c-product__price is-slashed">₹1,250</div>
                </div>
              </div>
            </div>
          </div>
          <div class="c-product-thumb">
            <div class="c-product-thumb__top">
              <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                <img class="product-img" src="../public/uploads/products/thumbnail/zzaRziaCZBBjbDCQILlZj4yqBNrJQT3NoqvORxPP.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
              </a>
              <div class="product__content">
                <div class="text-xsmall weight-is-medium">
                    <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                    <div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div>
                </div>
                <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                  <div class="c-product__title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                </a>
                <div class="c-product__price-wrapper">
                  <div class="c-product__price margin-right-small">₹1,250</div>
                  <div class="c-product__price is-slashed">₹1,250</div>
                </div>
              </div>
            </div>
          </div>
          <div class="c-product-thumb">
            <div class="c-product-thumb__top">
              <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                <img class="product-img" src="../public/uploads/products/thumbnail/zzaRziaCZBBjbDCQILlZj4yqBNrJQT3NoqvORxPP.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
              </a>
              <div class="product__content">
                <div class="text-xsmall weight-is-medium">
                    <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                    <div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div>
                </div>
                <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                  <div class="c-product__title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                </a>
                <div class="c-product__price-wrapper">
                  <div class="c-product__price margin-right-small">₹1,250</div>
                  <div class="c-product__price is-slashed">₹1,250</div>
                </div>
              </div>
            </div>
          </div>
          <div class="c-product-thumb">
            <div class="c-product-thumb__top">
              <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                <img class="product-img" src="../public/uploads/products/thumbnail/zzaRziaCZBBjbDCQILlZj4yqBNrJQT3NoqvORxPP.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
              </a>
              <div class="product__content">
                <div class="text-xsmall weight-is-medium">
                    <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                    <div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div>
                </div>
                <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                  <div class="c-product__title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                </a>
                <div class="c-product__price-wrapper">
                  <div class="c-product__price margin-right-small">₹1,250</div>
                  <div class="c-product__price is-slashed">₹1,250</div>
                </div>
              </div>
            </div>
          </div>
          <div class="c-product-thumb">
            <div class="c-product-thumb__top">
              <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                <img class="product-img" src="../public/uploads/products/thumbnail/zzaRziaCZBBjbDCQILlZj4yqBNrJQT3NoqvORxPP.jpeg" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt="">
              </a>
              <div class="product__content">
                <div class="text-xsmall weight-is-medium">
                    <a href="http://rheycart.codealphainfotech.com/search?category=Saree-LLvWZ">Saree</a>
                    <div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div><div class="fa is-blank"></div>
                </div>
                <a href="http://rheycart.codealphainfotech.com/product/Womens-Banarasi-Pure-Chiffon-Saree-With-Blouse-Piece6-xcchj" class="w-inline-block">
                  <div class="c-product__title">Women's Banarasi Pure Chiffon Saree With Blouse Piece6</div>
                </a>
                <div class="c-product__price-wrapper">
                  <div class="c-product__price margin-right-small">₹1,250</div>
                  <div class="c-product__price is-slashed">₹1,250</div>
                </div>
              </div>
            </div>
          </div> -->
        <!-- </div>
      </div>
    </div>
</section>
@endif -->

<!--
<div class="section has-bg-accent">
    <div class="container is-wide">
        <div class="col block-centered text-align-center lg-6 md-12 section-title">
            <h2 class="size-h1">Shop by category</h2>
            <p>Our latest mens collections have been crafted by some of the best  clothing designers in the world</p>
        </div>
    </div>
    <div class="container is-wide">
        @foreach(App\Category::where('featured', 1)->get() as $category)
        <div class="col lg-4 md-6 sm-12 text-align-center"> <a href="{{ route('products.category', $category->slug) }}" class="w-inline-block shop-by-category"><img
                    src="{{asset($category->banner)}}" alt="" class="is-rounded margin-bottom">
                <div class="size-h3">{{$category->name}}</div>
            </a> </div>
        @endforeach
    </div>
</div>
@php
$trendings = filter_products(\App\Product::where('published', 1)->where('todays_deal', 1 )->limit(12))->get();
@endphp
@if(count($trendings) > 0) -->
 <!-- <div class="section">
    <div class="container is-wide">
      <div class="col block-centered text-align-center lg-6 md-12">
        <h2 class="size-h1">Trending now</h2>
      </div>
    </div>
    <div class="container is-wide">
      <div class="col lg-12">
      <div class="w-layout-grid c-grid1x4">
          @foreach ($trendings as $key => $product)
            <div class="c-product-thumb">
                <div class="c-product-thumb__top">
                  <a href="{{ route('product', $product->slug) }}" class="margin-bottom-small w-inline-block">
                        <img class="product-img" src="{{ asset($product->thumbnail_img) }}" sizes="(max-width: 479px) 93vw, (max-width: 991px) 60vw, 560px" alt=""> -->
                        <!-- <div style="background-image: url({{ asset($product->thumbnail_img) }});" class="product-img"></div> -->
                           <!-- @if(isset($product->discount) && $product->discount != 0)
                            <div class="c-product-thumb__discount">
                                <div>{{discount($product->id)}}%</div>
                            </div>
                          @endif
                    </a>
                    <div class="text-xsmall weight-is-medium"><a href="{{ route('products.category',$product->category->slug)}}">{{$product->category->name}}</a></div>
                    <div class="c-product__rating">
                      @php
                          $total = 0;
                          $total += $product->reviews->count();
                      @endphp
                      {{ renderStarRating($product->rating) }}
                    </div>
                    <a href="{{ route('product', $product->slug) }}" class="w-inline-block">
                        <div class="c-product__title">{{$product->name}}</div>
                    </a>
                </div>
                <div class="c-product__price-wrapper">
                  @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                    <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                    <div class="c-product__price is-slashed">{{ home_base_price($product->id) }}</div>
                  @else
                    <div class="c-product__price margin-right-small">{{ home_discounted_base_price($product->id) }}</div>
                  @endif
                    <a href="javascript:void(0)" onclick="addtocartbtns({{$product->id}})" id="addtocart" class="button-rheycart">Add to cart</a>

                </div> -->
                <!-- <div class="c-product__quickview"> <a href="#" onclick="Quick({{$product->id}})" class="button-primary is-small w-inline-block">
                        <div class="button-primary-text"><span class="fa-regular is-16px"></span>Quick view</div>
                    </a> </div> -->
            <!-- </div>
          @endforeach
        </div>

      </div>
    </div>
  </div> -->
@endif
@include('frontend.partials.subscribe')

@endsection

@section('script')
    <script type="text/javascript">


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
        $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
          updateNavCart();
          showFrontendAlert('success', 'Item added in cart.');
      });
    }

      </script>


@endsection
