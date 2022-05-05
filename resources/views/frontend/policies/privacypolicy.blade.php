@extends('frontend.policies.inc.sidenav')
    @section('sidenavleft')
    @php
        $banner = \App\Banner::where('published', 1)->where('position', 6)->first();
    @endphp
    <div class="section first-section"
        style="background: url({{asset($banner->photo)}}) no-repeat;background-size: cover;background-position: center;">
        <div class="row">
            <div class="col lg-12 page-title">
              <h1 class="text-white margin-bottom text-uppercase text-center">Privacy Policy</h1>
              <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span class="low-text-contrast text-white">Privacy Policy</span></div>
            </div>
        </div>
    </div>
        
    @endsection

    @section('sidenavright')
        
    <div class="col lg-9 md-12 no-margin-bottom padding-top-bottom-double bg-white">
        <div class="privacy-policy-text margin-bottom">
            <p>Rhey Cart is purely adhered to respect and protect your privacy. So, if you're asked about your personal
                information, like your postal address, email, phone, payment information etc., it's only to keep you in
                standard communication with us, before, during, and after your purchase. We do not reveal your personal
                information to any third party without your consent.</p>
            <p>We imply policies that believe in maintaining the utmost privacy practices. All our practices aim at
                transparency, accountability and preserving the personal information. We adhere to protect your privacy
                and ensure that the information we collect would not be sold, shared or rented to any third party. The
                sole purpose of ours is to collect information for easy processing of order and for communicating best
                offers.</p>
            <br>
            <p><b>Personally Identifiable Information :</b></p>
            <p>We collect primary information such as name, address and email address of the customers. The sole purpose
                is to use the accumulated information for sales perspective. We use customer's email id when we want to
                process the enquiries and update orders. We refer to the address and contact information for the purpose
                of mailing the order. The information we collect has no other reverence.</p>
            <br>
            <p><b>Latest Announcements :</b></p>
            <p>There are times when we wish to implement changes in our site and want to convey the same to our worthy
                customers. This is when we utilize the details like email address for conveying announcements. For
                instance, when we introduce a new section, we utilize the email addresses to convey the message to the
                audiences.</p>
            <br>
            <p><b>Cookies :</b></p>
            <p>We make use of cookies so as to track down the customer’s shopping session and personalize it further for
                a better shopping experience. Cookies are the text files which the websites place over the hard drive of
                user’s system to accumulate and store information regarding the shopping session. Cookies are not meant
                to harm your system and do not possess any private data.</p>
            <br>
            <p><b>Third Parties :</b></p>
            <p>We take help of third parties such as courier and shipping companies to complete the orders and secure
                payment gateways for billing. We also take aid of chat options to assist the customers when required.
                Hence, when a person signs up, we may share limited information with the third parties for the sake of
                service access.</p>
            <br>
            <p>We hold the complete right to disclose the customer’s personally identifiable information if required by
                legal authorities. This disclosure is done so as to comply efficiently towards the judicial proceedings.
            </p>
            <p>In case, India Emporium goes for a merger or sells off its asset to other company, we hold the right to
                surpass the personally identifiable information of the customers along. We shall however, notify the
                customers regarding the handling of personal information beforehand via email.</p>
            <p>Our privacy policy may incorporate changes in respect to information practices. In event of change, we
                will be notifying the customers via email or through a detailed note displayed over the website. We
                expect our customers to occasionally review the policy pages to keep an eye over the latest updates.</p>
            <div class="w-clearfix"></div>
        </div>
    </div>
    @endsection
