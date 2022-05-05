@php
$bannera = App\Banner::where('published', 1)->where('position', 2)->first();
@endphp
<!-- <div class="section no-padding-top-bottom overflow-hidden">
    <div class="container is-full-wide">
        <div class="col lg-12 no-margin-bottom position-relative no-padding-lr overflow-hidden">
            <div class="container container-nested c-overlay-content cta-parallax"
                style=" background-image: url({{asset($bannera->photo)}}); !important;">
                <div class="col lg-8 block-centered md-12">
                    <div class="text-align-center size-h2 on-dark margin-bottom-double" style="text-transform: capitalize;">Fill the below form and get update our new offers</div>
                    <div class="max-width-500px block-centered no-margin-bottom w-form">
                        <form id="email-form" name="email-form" data-name="Email Form"
                            class="flexh-align-center xs-is-wrapping" method="POST" action="{{ route('subscribers.store') }}">
                            @csrf
                            <input type="email"
                                class="form-input-text no-margin-bottom lg-md-sm-margin-right-small xs-margin-bottom w-input"
                                maxlength="256" name="email" data-name="Email 2"
                                placeholder="Enter your email address" id="email-2" required="">
                            <button type="submit" class="inline-button-on-dark">Subscribe</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- <div class="section">
    <div class="container is-wide justify-content-center">
        <div class="col lg-3 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center">
            <div class="upper-footer flex-column-center">
                <div class="fa margin-right icon"></div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">FREE SHIPPING</div>
            </div>
        </div>
        <div class="col lg-3 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center">
            <div class="upper-footer flex-column-center">
                <div class="fa margin-right icon"></div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">SPECIAL OFFERS</div>
            </div>
        </div>
        <div class="col lg-3 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center">
            <div class="upper-footer flex-column-center">
                <div class="fa margin-right icon"></div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">ORDER PROTECTION</div>
            </div>
        </div>
        <div class="col lg-3 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center">
            <div class="upper-footer flex-column-center">
                <div class="fa margin-right icon"></div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">PROFESSIONAL SUPPORT</div>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="footer-top-section bg-gray">
    <div class="container is-wide justify-contact-center">
        <div class="footer-icon-set footer-icon-set col lg-2 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center">
            <div class="upper-footer flex-column-center">
                <div class="fa margin-right icon">
                  <img src="../public/uploads/images/Fast Delivery.png"  height="25px" alt="">
                </div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">Free <br> Shipping</div>
            </div>
        </div>
        <div class="footer-icon-set col lg-2 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center">
            <div class="upper-footer flex-column-center">
              <div class="fa margin-right icon">
                <img src="../public/uploads/images/best-quality.png"  height="30px" alt="">
              </div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">Quality And <br> Commitment</div>
            </div>
        </div>
        <div class="footer-icon-set col lg-2 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center">
            <div class="upper-footer flex-column-center">
              <div class="fa margin-right icon">
                <img src="../public/uploads/images/24-hour.png"  height="30px" alt="">
              </div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">24/7  <br> Support</div>
            </div>
        </div>
        <div class="footer-icon-set col lg-2 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center">
            <div class="upper-footer flex-column-center">
              <div class="fa margin-right icon">
                <img src="../public/uploads/images/Promise.png"  height="30px" alt="">
              </div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">Best Price <br> Promise</div>
            </div>
        </div>
        <div class="footer-icon-set col lg-2 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center">
            <div class="upper-footer flex-column-center">
              <div class="fa margin-right icon">
                <img src="../public/uploads/images/Payments.png"  height="25px" alt="">
              </div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">Secure <br> Payments</div>
            </div>
        </div>
    </div>
</div> -->
<div class="footer-top-section bg-gray">
    <div class="container is-wide">
        <div class="col lg-3 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center" style="margin: 0 !important;">
            <div class="upper-footer flex-column-center">
                <div class="fa margin-right icon"></div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">FREE SHIPPING</div>
            </div>
        </div>
        <div class="col lg-3 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center" style="margin: 0 !important;">
            <div class="upper-footer flex-column-center">
                <div class="fa margin-right icon"></div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">SPECIAL OFFERS</div>
            </div>
        </div>
        <div class="col lg-3 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center" style="margin: 0 !important;">
            <div class="upper-footer flex-column-center">
                <div class="fa margin-right icon"></div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">ORDER PROTECTION</div>
            </div>
        </div>
        <div class="col lg-3 md-6 sm-6 flex-align-middele no-margin-bottom-lg text-align-center" style="margin: 0 !important;">
            <div class="upper-footer flex-column-center">
                <div class="fa margin-right icon"></div>
                <div class="size-h4 text-with-icon margin-bottom-small text-align-center">PROFESSIONAL SUPPORT</div>
            </div>
        </div>
    </div>
</div>
