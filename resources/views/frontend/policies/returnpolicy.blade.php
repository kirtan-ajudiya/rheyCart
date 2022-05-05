@extends('frontend.policies.inc.sidenav')
    @section('sidenavleft')
    @php
        $banner = \App\Banner::where('published', 1)->where('position', 6)->first();
    @endphp
    <div class="section first-section"
        style="background: url({{asset($banner->photo)}}) no-repeat;background-size: cover;background-position: center;">
        <div class="row">
            <div class="col lg-12 page-title">
              <h1 class="text-white margin-bottom text-uppercase text-center">Cancellation & Return Policy</h1>
              <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span class="low-text-contrast text-white">Cancellation & Return Policy</span></div>
            </div>
        </div>
    </div>
        
    @endsection

    @section('sidenavright')
        
    <div class="col lg-9 md-12 no-margin-bottom padding-top-bottom-double bg-white">
        <div class="privacy-policy-text margin-bottom">
            <p>Rhey Cart takes utmost pride in its policy making since all its policy is designed to benefit its
                Customers. Every transaction by a Customer is not a sale for us but it is an investment for us. That’s
                how <b>Rhey Cart</b> is able to build a Brand that is known for its Trust, Quality & Value! Our primary
                goal is to satisfy our customers.</p>
            <p>Our team works day and night to ensure that you receive your products in the best possible condition – so
                be rest assured! However, policies are policies and are mandatory!So, we have ensured that our
                <b>Exchange & Returns Policy</b> is narrated in the most simplistic manner so that there is no
                difficulty for you to understand. Like all other policies, let’s once again pretend to talk to each
                other about this Policy :</p>
            <br>
            <p><b>Hi! I am buying from your Website for the first time – what if I don’t like product? Can I exchange
                    it?</b></p>
            <p>Yes, absolutely! If you don’t like the product that you have purchased, you are free to send it back to
                us within 30 days.Just report the return to us within 24 hours of receiving the product. You may call or
                email us to process your request. Also make sure that if you intend to exchange the product, the product
                is not opened and is kept exactly in the same state as it was sent to you i.e. in a new condition
                without opening or altering its folds so that we can onward use it! We will not be able to, for obvious
                reasons, accept any exchange of products that have been damaged and are not in a new condition or have
                been tampered with. We request you to confirm before sending the parcel back to us .Please note that
                after the initiation of reverse pick up, it would take around 2 – 3 days for the item to be collected
                from the destination address.We usually take 1 day but it may extend to 2-3 business days to assess the
                product sent by you for exchange, are satisfactory for us to accept. We accordingly will inform you and
                issue you a Credit Note that you can use to buy another Saree. If the new saree that you are buying
                instead of the old is priced higher, you will, obviously, have to pay such differential amount.</p>
            <br>
            <p><b>How will I send the product back to you if I want to exchange it?</b></p>
            <p>Simple, just email us at <a href="" class="animation-underline-link fw-500">info@domainname.com</a> or
                call our Helpline at <a href="tel:+919033900526" class="animation-underline-link fw-500">+91 90339
                    00526</a>, <a href="tel:+919313512128" class="animation-underline-link fw-500">+91 93135 12128</a>
                with your order no. and product details and we will send someone to collect the Parcel from your
                address.</p>
            <br>
            <p><b>What if I want to exchange a Saree and do not like any sarees on your website, can I visit your
                    showrooms and exchange the Saree?</b></p>
            <p>Absolutely, you can come to any one of our showrooms (as shown in our website) and choose any product
                that you desire to exchange your Saree with. No problem!</p>
            <br>
            <p><b>What if the Saree that I receive has a manufacturing defect or damage? What will I do?</b></p>
            <p>Go on your computer and email us or pick up your phone and call us on the contact details and we will
                ensure that the Saree is promptly collected from your address. Don’t worry, you don’t have to bear any
                cost for the same. It is our fault and hence, we will pay for everything and ensure that a defect /
                damage free Saree is resent to you promptly. We request you to inform us within 24 hours of receiving
                such defected / damaged Saree.</p>
            <br>
            <p><b>What if I receive a wrong Saree?</b></p>
            <p>Although, this usually would never happen but if it does then just email us or contact us on our Helpline
                and we will ensure that someone comes to your address and collect the wrong Saree sent to you. Don’t
                worry, you don’t have to bear any cost for the same. It is our fault, we will pay for everything and
                ensure that the right Saree is delivered to you.</p>
            <br>
            <p><b>Will I get my money back if the Saree is damaged and you cannot give me another piece?</b></p>
            <p>For return of any product having manufacturing defect or damage, we would make our best efforts to ensure
                that the same or similar piece is sent to you. However, if you are unsatisfied, we will ensure that your
                entire money is refunded to you without any deductions. We will take 7-10 working days to process the
                same. The balance amount shall be refunded in the same mode as your mode of payment i.e. if you paid by
                a credit card, the money will be refunded to the same credit card.</p>
            <p>For exchange of sarees that you have ordered and later have decided to change it,we shall ensure that you
                are provided with all the assistance to see a varied range of our collection so you can choose another
                saree. However, should you still decide not to choose any saree, we shall issue you a Credit Note in
                your Account ( usually it takes 5 -7 business days to issue the Credit Note ) that you can later utilize
                / redeem when you make an online purchase.</p>
            <br>
            <p><b>Who will pay for the shipping cost for exchange / return of products?</b></p>
            <p>If there is a defect or damage in the saree that you are retuning / exchanging or if a wrong saree is
                sent to you then we will pay for the to and fro shipping cost of the Saree. If you are exchanging the
                product that you do not like, you will have to bear the to and fro shipping cost.We request you to
                please confirm with us before sending the parcel back. For domestic customers, we do have the facility
                ofgetting the reverse pickup done. Please note that the reverse pickup charge is Rs.250.After it is
                done, it takes minimum 72hrs for the issuance of the credit note or the cash refund. For international
                customers, the product will have to be sent to us from a registered courier company within 30days after
                receiving the parcel. Once we receive the parcel, it is sent to our Quality Check department for
                examination. Depending on the result, we issue Credit note or Cash refund accordingly.</p>
            <br>
            <p><b>Can I use Gift Vouchers on the exchanged product?</b></p>
            <p>No, you cannot use any gift vouchers for the differential amount of the exchanged product. Gift Vouchers
                can only be redeemed when you make a fresh and new purchase.</p>
            <br>
            <p><b>What if I get Fall/ Piccodone on my Saree, can I still exchange my Saree?</b></p>
            <p>Fall / picco on a Saree requires cutting the blouse piece of the Saree. Therefore, the Saree is
                considered to be not new from a consumer perspective. So, no, you will not be allowed to exchange the
                Saree once you have asked us to do Fall/Picco on your Saree.</p>
            <br>
            <p><b>What if I want to Cancel an order after placing an order and making the payment?</b></p>
            <p>After you have made the payment, you will have a time period of 24 to 48 hours (depending on the shipment
                status of the product) to Cancel the product. If however, for any reason the product has already been
                shipped within the said 24 to 48 hours, then you will not be able to cancel the product. If the product
                has not been shipped, then you will be able to cancel the Order by emailing us at <a href=""
                    class="animation-underline-link fw-500">info@domainname.com</a> or call our Helpline at <a
                    href="tel:+919033900526" class="animation-underline-link fw-500">+91 90339 00526</a>, <a
                    href="tel:+919313512128" class="animation-underline-link fw-500">+91 93135 12128</a>. If your Order
                is elgible for cancellation and is cancelled, you will receive the total amount paid by you less
                cancellation charges of 7%. The balance amount shall be refunded in the same mode as your mode of
                payment i.e. if you paid by a credit card, the money will be refunded to the same credit card. The
                refund shall take 7 to 10 working days to process depending on our payment gateway.</p>
            <br>
            <p><b>Do you have any disclaimers or any other terms and conditions that I should know, specially for
                    colours& Zari work?</b></p>
            <p>Yes, we have a few things that you should know that are a little technical but are important for you to
                be aware of before you make a purchase from us. The weight of the products displayed on our website is
                only an approximate figure and takes into account all packing materials etc. The description of the
                product stated on our website is as per how we understand the characteristics of the product. Most
                importantly, the description of the colours may slight vary – although we put in our best efforts to
                ensure that the variation is minimal but still the same may vary depending on the screen on which you
                view the product, the resolution, colour settings etc.</p>
            <p>Also, the colour in the picture of the saree and the actual colour may sometimes vary – depending on the
                colour – due to various standard factors such as lighting, photography etc. There is nothing much anyone
                can do about this but once can only ensure that the closest reproduction of the colours are displayed.
                It is, in fact, impossible for any person to ensure that the actual colour as seen by the naked eye is
                what is displayed across all computer screens. The moment a picture is taken, there is a colour
                variation and then the screen you use further varies the colour. That’s how it is and we assume that you
                are well aware of the same. We however, always will make our best efforts to ensure that the colours are
                not wholly misleading.</p>
            <p>Further, the characteristics and features of certain products are also points that need to be considered
                when making an online purchase. There are certain fabrics that have unique characteristics such as raw /
                khadi silk, brocade and other similar fabrics – which have a textured effect. You may not be able to
                clearly see the same in the picture. We would like to clarify that the same are not defects but are
                inherent characteristic of such fabric and we assume that you are aware of the same. Sometimes you may
                see that the threads are hanging from a Saree – please be aware that these are not defects but is the
                nature of the product because these Sarees are put in a loom where the warp and weft ( threads ) are
                entangled / crossed over to create the saree and the hanging threads are nothing but such threads which
                can remain or else cut off gently without pulling it. It is considered to be common knowledge for women
                wearing sarees.</p>
            <p>All handloom products meaning all work done by hand on a Saree will always vary from piece to piece for
                the obvious reason that the work has been done manually and will vary from person to person. Although,
                the difference will be minimal but there always will be a minor difference and variation in the design
                etc of the Saree and that’s what will make the Saree unique and that’s why people from across the world
                desire to own handloom products and especially handloom Sarees.</p>
            <br />
            <p><b>Can I exchange/return pre-stitched saree/customize blouse?</b></p>
            <p>No.Making a pre-stitched saree/stitching blouses requires the customer’s measurements. And measurements
                are not the same for every customer. So if you request for a pre-stitched saree/blouse stitching
                according your body measurements, we won’t be able to exchange/ return it.</p>
            <div class="w-clearfix"></div>
        </div>
    </div>

    @endsection
