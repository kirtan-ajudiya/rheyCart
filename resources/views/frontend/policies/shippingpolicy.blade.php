@extends('frontend.policies.inc.sidenav')
    @section('sidenavleft')
    @php
        $banner = \App\Banner::where('published', 1)->where('position', 6)->first();
    @endphp
    <div class="section first-section"
        style="background: url({{asset($banner->photo)}}) no-repeat;background-size: cover;background-position: center;">
        <div class="row">
            <div class="col lg-12 page-title">
              <h1 class="text-white margin-bottom text-uppercase text-center">Shipping Policy</h1>
              <div class="text-small text-align-center"><a href="{{route('home')}}" class="on-dark">Home</a> / <span class="low-text-contrast text-white">Shipping Policy</span></div>
            </div>
          </div>
    </div>
        
    @endsection

    @section('sidenavright')
        
    <div class="col lg-9 md-12 no-margin-bottom padding-top-bottom-double bg-white">
        <div class="privacy-policy-text margin-bottom">
            <p>Rhey Cart takes utmost pride in its policy making since all its policy is designed to benefit its
                Customers. Every transaction by a Customer is not a sale for us but it is an investment for us. That’s
                how Rhey Cart is able to build a Brand that is known for its Trust, Quality & Value!</p>
            <p>Our Shipping Policy is extremely simple and we have endeavored to make it even more transparent. For your
                ease, we have made the Shipping Policy very ease for you to read and understand. Now, lets pretend to
                talk to each other :</p>
            <br>
            <p><b>Hi, I do not live in India, how will you send Sarees to me?</b></p>
            <p>We deliver Sarees and all other goods across the world. We have partnered with International Logistics
                Giant, DHL – you place the order at our Site and our backend team gets to work to ready your Saree. Once
                its <b>ready for shipment</b>, we handover the <b>packed</b> shipment to DHL. DHL will fly your parcel
                to wherever you are. They deliver to the remotest and tiniest corners of the world so, we are very sure,
                your Sarees will somehow find you.</p>
            <br>
            <p><b>Ok, Great!How long will it take for my Sarees to reach me?</b></p>
            <p>Each Saree is marked with the indicative days it would be ready for shipment. Therefore, if the product
                page shows 7 days, then the Saree will be ready from our end for dispatch. We thereafter, handover the
                parcels to DHL against a particular tracking number. Such tracking number will be sent to you, via SMS
                and email. You will then be able to yourself track your Shipment. Typically, it takes DHL 5 – 7 days to
                deliver under their standard shipping norms. Please note that DHL and other similar global logistics
                companies deliver during working hours and during weekdays, so we would advise you to make someone
                available to receive the shipment during such hours/day at the Shipping Address mentioned in your Order.
            </p>
            <br>
            <p><b>Sounds good. How much do I have to pay for Shipping?</b></p>
            <p>Your shipping cost is calculated on the weight and size of each package including the product, the
                packing material etc. The shipping cost also factors in the country of shipment. Once you choose a
                product and add it to ‘My Cart’ and proceed to Checkout, you will be able to see the exact cost of
                shipping.</p>
            <br>
            <p><b>But what if I order 2 sarees of the same type – will you charge me double for shipping? How do you
                    calculate?</b></p>
            <p>It does not matter how many sarees you ordered. The shipping cost is calculated only on the factors
                mentioned above i.e. size, weight and destination.</p>
            <br>
            <p><b>What if I don’t like the saree when I receive it and want to exchange it – who will pay for the
                    shipping?</b></p>
            <p>It is very simple. If you are returning a Saree because of a damaged product, the cost of shipping shall
                be entirely ours. In the event, you are returning a Saree because you do not like it anymore or if you
                would like to exchange it, then the cost shall be borne entirely by you. Its that simple! Please note
                however that any returns are subject to the product being in an absolute new condition and in the manner
                it was sent without the folds etc of the Saree being displaced. You can read more about it in our
                Exchange & Return Policy section.</p>
            <br>
            <p><b>Hi, I am from United States but I would like to send a gift to India – do I have to pay for
                    shipping?</b></p>
            <p>No. It does not matter where you are from. The only thing that matters is the destination of delivery. If
                it is India, it is free – if it’s not in India, you will have to pay for it!</p>
            <br>
            <p><b>Who bears the transit risk?</b></p>
            <p>Once we handover your parcel to DHL, we take no responsibility towards the same. We are more than
                confident that a global leader such as DHL will surely be able to deliver your parcel. And yes, till
                date, they have never failed us.</p>
            <br>
            <p><b>Are there any custom duties etc payable on the import of the Sarees?</b></p>
            <p>We would request you to check with the Government of your Country of residence in relation to the
                application import duty on sarees. Since, we ship across the world, it is not possible to keep a tab on
                the ever changing custom duty structures of each and every country. Hence, to keep matters simple and
                easy, we have ensured that the prices of our sarees do not take into account the custom duties, if any.
            </p>
            <br />
            <p><b>SHIPPING CHARGES</b></p>
            <p> Shipping charges on our products shall be mentioned at the time of check out. The said shipping charges
                are volumetric in nature and differ from product to product.</p>
            <br />
            <p><b>WHO HAS TO BEAR THE DUTY AND CUSTOM CHARGES</b></p>
            <p> A custom duty charge is decided by the Government of the destination country after arrival of the
                parcel. We hereby announce that the Custom Duty Charge has to be borne by the customer and is to be paid
                at the time of Delivery to our courier partner. These taxes will be chargeable over and above the
                product/order price you pay on the e-shop.</p>
            <br />
            <p><b>CALCULATION OF SHIPPING CHARGES</b></p>
            <p> The said shipping charges are volumetric in nature and differ from product to product.The shipping
                charges are calculated on the number of products as well as the weight of all the products in your
                order. You can view the shipping cost as you added product in cart. </p>
            <div class="w-clearfix"></div>
        </div>
    </div>
    @endsection
