@extends('frontend.layouts.app')

@section('content') 

<div class="section first-section"
    style="background: url('images/banner-product-listing.jpg') no-repeat;background-size: cover;background-position: center;">
    <div class="row">
        <div class="col lg-12 page-title">
            <h1 class="text-white margin-bottom text-uppercase text-center">Order successful</h1>
            <div class="text-small text-align-center"><a href="index.html" class="on-dark">Home</a> / <span
                    class="low-text-contrast text-white">Order Successful</span></div>
        </div>
    </div>
</div>

<section class="padding-top-bottom-double">
    <div class="container">
        <div class="row aiz-steps arrow-divider">
            <div class="col-lg-8 mx-auto">
                <div class="row aiz-steps arrow-divider">
                    <div class="col active" style="margin-bottom: 0px;">
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">1. SHOPPING BAG</p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">2. SHIPPING & BILLING INFO</p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center active-step">
                            <p class="fs-14 fw-600">3. CHECKOUT checkout</p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 0px;">
                        <div class="text-center">
                            <p class="trash-btn fs-14 fw-600">4. PAYMENT</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="">
        <div class="container">
            <div class="col lg-9 md-12 no-margin-bottom padding-top-bottom-double">
                <table class="table blodrdetai" style="border: 1px solid #ddd;">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Product Detail</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ddd !important;"" scope=" row"> <a
                                    href="product-detail-page.html" class="inline-link sm-hidden"><img
                                        src="images/product/big-product3.jpg" alt=""></a></td>
                            <td style="border-top: 1px solid #ddd !important;"" scope=" row"> <a
                                    href="product-detail-page.html" class="inline-link">Women's Banarasi Pure Chiffon
                                    Saree With Blouse Piece</a></td>
                            <td style="border-top: 1px solid #ddd !important;""><div class=" num-block skin-3">1</td>
                            <td style="border-top: 1px solid #ddd !important;"" class=" text-align-right">10,080.00</td>
                            <td style="border-top: 1px solid #ddd !important;"" class=" text-align-center">4,032.00</td>
                            <td style="border-top: 1px solid #ddd !important;"" class=" text-align-center">6,048.00</td>
                        </tr>
                        <tr>
                            <td style="padding: 0 8px;border-top: 1px solid #ddd !important;" colspan="6"
                                class="text-align-right">Subtotal: Rs. 6,048.00</td>
                        </tr>
                        <tr>
                            <td style="padding: 0 8px;border-top: 0px solid !important;" colspan="6"
                                class="text-align-right">(+)Shipping Charges: Free</td>
                        </tr>
                        <tr>
                            <td style="padding: 0 8px;border-top: 0px solid !important;" colspan="6"
                                class="text-align-right">You Pay: Rs. 6,048.00</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table blodrdetai" style="border: 1px solid #ddd;">
                    <thead>
                        <tr>
                            <th style="padding-left: 30px;font-size: 15px;font-weight: 500;" scope="col" colspan="6">
                                Enter Promo / Coupon Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 30px;" colspan="6" class="text-align-left">
                                <input type="text" id="text" placeholder="">
                                <a href="" class="input-group-btn auto-width">Apply</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table blodrdetai" style="border: 1px solid #ddd;">
                    <thead>
                        <tr>
                            <th style="padding-left: 30px;font-size: 15px;font-weight: 500;" scope="col" colspan="6">Add
                                Comments About Your Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 10px 30px;" colspan="6" class="text-align-left">
                                <textarea id="message" placeholder=""
                                    style="margin: 0px;width: 100%;height: 141px;"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table blodrdetai" style="border: 1px solid #ddd;">
                    <thead>
                        <tr>
                            <th style="padding-left: 30px;font-size: 15px;font-weight: 500;" scope="col" colspan="6">
                                Payment Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 10px 30px;" colspan="6" class="text-align-left"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col lg-3 md-12 no-margin-bottom padding-top-bottom-double">
                <div class="custom-sidebar">
                    <table class="tabel">
                        <tbody>
                            <tr>
                                <th style="padding: 10px 22px;justify-content: left;">Shipping Address</th>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td class="text-align-left">adsasd &nbsp; dsds <br> asdsa, &nbsp; dasd <br> dsad, &nbsp;
                                    395007 <br> Gujarat, &nbsp; India <br> Phone: &nbsp; 12345690 </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td class="text-align-left">
                                    <div class="Change_btn">
                                        <a href="order-complete.html" class="Change_Address_btn">Change Address</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-defeal">
                    <table class="tabel">
                        <tbody>
                            <tr>
                                <th style="padding: 10px 22px;justify-content: left;">Billing Address</th>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td class="text-align-left">adsasd &nbsp; dsds <br> asdsa, &nbsp; dasd <br> dsad, &nbsp;
                                    395007 <br> Gujarat, &nbsp; India <br> Phone: &nbsp; 12345690 </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td class="text-align-left">
                                    <div class="Change_btn">
                                        <a href="order-complete.html" class="Change_Address_btn">Change Address</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-defeal">
                    <table class="tabel">
                        <tbody>
                            <tr>
                                <th style="padding: 10px 22px">PURCHASE WITH CONFIDENCE</th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="panel-body">
                        <p> <i class="fas fa-exchange-alt"></i> HASSLE FREE RETURNS </p>
                        <p> <i class="fa fa-thumbs-up"></i> 100% ORIGINAL PRODUCTS </p>
                        <p> <i class="fas fa-user-lock"></i> HASSLE FREE RETURNS</p>
                    </div>
                    <div class="cardsblock">
                        <i class="fab fa-paypal"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-discover"></i>
                        <i class="fab fa-cc-visa"></i>
                    </div>
                </div>
                <div class="panel panel-defeal">
                    <table class="tabel">
                        <tbody>
                            <tr>
                                <th>Have a question <br>
                                    We are at your service.</th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="panel-body text-center">
                        <p>
                            <a href="tel:+91 90339 00526"><span><i class="fa margin-right icon"
                                        style="font-size: 25px;"></i></span> +91 90339 00526 </a>
                        </p>
                        <p>or</p>
                        <p>
                            <a style="color: #333;font-size: 13px;" href="mailto:info@rheycart.com"><span><i
                                        class="fa margin-right icon" style="font-size: 15px;"></i></span> EMAIL </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection