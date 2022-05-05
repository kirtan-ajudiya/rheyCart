

@php

    $subtotal = 0;
    $tax = 0;
    $shipping = 0;
    $discount_boutique_price=0;
    $discount_boutique=0;
    if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'flat_rate') {
        $shipping = \App\BusinessSetting::where('type', 'flat_rate_shipping_cost')->first()->value;
    }
    $admin_products = array();
    $seller_products = array();
@endphp

@foreach (Session::get('cart') as $key => $cartItem)
@php
    $product = \App\Product::find($cartItem['id']);
    if($product->added_by == 'admin'){
        array_push($admin_products, $cartItem['id']);
    }
    else{
        $product_ids = array();
        if(array_key_exists($product->user_id, $seller_products)){
            $product_ids = $seller_products[$product->user_id];
        }
        array_push($product_ids, $cartItem['id']);
        $seller_products[$product->user_id] = $product_ids;
    }
    $subtotal += $cartItem['price']*$cartItem['quantity'];
    $tax += $cartItem['tax']*$cartItem['quantity'];
    if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping') {
        $shipping += $cartItem['shipping'];
    }
@endphp
@endforeach
@php
    $generalsetting = \App\GeneralSetting::first();
    if(($subtotal+$tax) > $generalsetting->Max_price_free_shipping){
        $shipping=0;
        $Shipping_flag=1;
    }else{
        $shipping=$generalsetting->shipping_cost_final;
        $Shipping_text=$shipping;
        $Shipping_flag=0;
    }
    if(Auth::check() && Auth::user()->pro_member == 1){
        $shipping=0;
        $Shipping_flag=1;
    }
    $total = $subtotal+$tax+$shipping;
    if(Session::has('coupon_discount')){
        $total -= Session::get('coupon_discount');
    }

@endphp
<!-- <table class="table">
    <tfoot class="cart-table">
      <tr>
          <th scope="col" colspan="3" style="text-align: center;">PRICE DETAILS</th>
      </tr>
        <tr>
            <th scope="row" scope="col" colspan="3">Subtotal:</th>
            <td class="text-align-right">{{ single_price($subtotal) }}</td>
        </tr>
        <tr>
            <th scope="row">Tax:</th>
            <td class="text-align-right">{{ single_price($tax) }}</td>
        </tr>
        @if($Shipping_flag == 0)
        <tr>
            <th scope="row">Shipping:</th>
            <td class="text-align-right">{{ single_price($shipping) }}</td>
        </tr>
        @else
        <tr class="d-flex">
            <th scope="row">Shipping:</th>
            <td class="text-align-right">Free Shipping</td>
        </tr>
        @endif
        <tr>
            <th scope="row">Discount:</th>
            <td class="text-align-right">{{ single_price(Session::get('coupon_discount')) }}</td>
        </tr>
        <tr>
            <th scope="row">Total:</th>
            <td class="fw-700 text-align-right">{{ single_price($total) }}</td>
        </tr>
    </tfoot>
</table> -->

<style media="screen">

  .carts-table  {
    padding: 15px 0;
  }
  .carts-table .price_table {
    padding: 10px 30px;
  }
  .carts-table .cart-hedding {
    display: block;
    text-transform: uppercase;
    padding: 0 0 15px 0px;
    border-bottom: 1px solid #f0f0f0;
    font-weight: 600;
  }
  .carts-table .price_table_1 {
      margin: 20px 0;
  }
  .carts-table .price_table_total.doted-line {
    margin: 0 0 0 0;
    border-top: 1px dotted #000;
    padding: 15px 0;
  }
  .carts-table .price_table_1 , .carts-table .price_table_total {
      display: flex;
      justify-content: space-between;
      align-items: center;
  }
  .carts-table .price_table_total .author_name  {
    color: #000;
    font-size: 20px;
    font-weight: 700;
  }
  .carts-table .price_table_total .author_price {
    font-weight: 700;
    color: #000;
    font-size: 20px;
  }
  .carts-table .price_table_1 .author_name  {
    color: #000;
    font-weight: 600;
  }
  .carts-table .price_table_1 .author_price {
    color: #000;
  }

</style>


<section class="Sidebar">
  <div class="carts-table">
    <div class="text-center cart-hedding">PRICE DETAILS</div>
    <div class="price_table">
        <div class="price_table_1">
            <div class="author_name">Subtotal:</div>
            <div class="author_price">{{ single_price($subtotal) }}</div>
        </div>
        <div class="price_table_1">
            <div class="author_name">Tax:</div>
            <div class="author_price">{{ single_price($tax) }}</div>
        </div>
        @if($Shipping_flag == 0)
        <div class="price_table_1">
            <div class="author_name">Shipping:</div>
            <div class="author_price">{{ single_price($shipping) }}</div>
        </div>
        @else
        <div class="price_table_1">
            <div class="author_name">Shipping:</div>
            <div class="author_price">Free Shipping</div>
        </div>
        @endif
        <div class="price_table_1">
            <div class="author_name">Discount:</div>
            <div class="author_price">{{ single_price(Session::get('coupon_discount')) }}</div>
        </div>
        <div class="price_table_total doted-line">
            <div class="author_name">Total:</div>
            <div class="author_price">{{ single_price($total) }}</div>
        </div>
    </div>
  </div>
</section>
