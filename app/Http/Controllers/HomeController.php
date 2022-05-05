<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Hash;
use App\Category;
use App\FlashDeal;
use App\Brand;
use App\SubCategory;
use App\SubSubCategory;
use App\Product;
use App\Fabric;
use App\Occasion;
use App\PickupPoint;
use App\CustomerPackage;
use App\CustomerProduct;
use App\User;
use App\Seller;
use App\Shop;
use App\Color;
use App\Order;
use App\BusinessSetting;
use App\Http\Controllers\SearchController;
use ImageOptimizer;
use Cookie;
use Mail;
use App\Mail\EmailManager;

class HomeController extends Controller
{
    public function login()
    {
      
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('frontend.user_login');
    }

    public function registration(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        if($request->has('referral_code')){
            Cookie::queue('referral_code', $request->referral_code, 43200);
        }
        return view('frontend.user_registration');
    }

    public function user_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
        if($user != null){
            if(Hash::check($request->password, $user->password)){
                if($request->has('remember')){
                    auth()->login($user, true);
                }
                else{
                    auth()->login($user, false);
                }
                return redirect()->route('dashboard');
            }
        }
        return back();
    }

    public function cart_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
        if($user != null){
            updateCartSetup();
            if(Hash::check($request->password, $user->password)){
                    auth()->login($user, true);
                    flash(__('Login successfully!'))->success();
            }else{
                flash(__('Password does not metch!'))->error();
            }
           
        }else{
             flash(__('Somthing Is Wrong!'))->error();
        }
        return back();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard()
    {
        return view('dashboard');
    }

    /**
     * Show the customer/seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::user()->user_type == 'customer'){
            $user = User::where('id', Auth::user()->id)->first();
            $orders = Order::where('user_id', Auth::user()->id)->get()->take(10);
            return view('frontend.customer.dashboard', compact('user', 'orders'));
        }
        else {
            abort(404);
        }
    }

    public function profile(Request $request)
    {
        if(Auth::user()->user_type == 'customer'){
            $user = User::where('id', Auth::user()->id)->first();
        
            return view('frontend.customer.profile', compact('user'));
        }
    }

    public function customer_update_profile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->display_name = $request->display_name;
        $user->phone = $request->phone;

        if($request->current_password){
            if(Hash::check($user->password, $request->current_password)){
                if($request->new_password != null && ($request->new_password == $request->confirm_password)){
                    $user->password = Hash::make($request->new_password);
                }
            }else{
                flash(__('Your currant passwword is wrong!'))->success();
                return back();
            }
        }

        if($user->save()){
            flash(__('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }


    public function seller_update_profile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password);
        }

        if($request->hasFile('photo')){
            $user->avatar_original = $request->photo->store('uploads');
        }

        $seller = $user->seller;
        $seller->cash_on_delivery_status = $request->cash_on_delivery_status;
        $seller->bank_payment_status = $request->bank_payment_status;
        $seller->bank_name = $request->bank_name;
        $seller->bank_acc_name = $request->bank_acc_name;
        $seller->bank_acc_no = $request->bank_acc_no;
        $seller->bank_routing_no = $request->bank_routing_no;

        if($user->save() && $seller->save()){
            flash(__('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function passwordreset()
    {
        return view('frontend.password-reset');
    }

    public function ForgotPassword_verify(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(isset($user) && $user != ""){
            $otp = rand(1000, 9999);
            $array['view'] = 'emails.passwordReset';
            $array['subject'] = 'Password reset';
            $array['from'] = env('MAIL_USERNAME');
            $array['content'] = "Your One time otp is".$otp;

            try {
                 Mail::to($request->email)->queue(new EmailManager($array));
                 $user->otp = $otp;
                 $user->save();
                    return response()->json(['otp'=>$otp, 'status'=>true]);
            } catch (\Throwable $th) {
                dd( $th);
            }
        }else{
            return response()->json(['status'=>false]);
        }
    }

    public function PasswordSubmit(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(isset($user) && $user != ""){
            if($user->otp == $request->otp){
                $user = User::where('email',  $request->email)->update(['password' => Hash::make($request->password)]);
                if($user == true){
                    return response()->json(['status'=>true]);
                }
            }else{
                return response()->json(['status'=>false, 'type'=>2]);
            }

        }else{
            return response()->json(['status'=>false]);
        }
    }

    public function document(Request $request)
    {
         return view('frontend.seller.document');
    }

    public function upload_doc(Request $request){
     

         $seller = Auth::user()->seller;
         if($request->hasFile('adharfront')){
          $seller->adhar_front = $request->adharfront->store('uploads/seller_docs');       
         }
         if($request->hasFile('adharback')){
          $seller->adhar_back = $request->adharback->store('uploads/seller_docs');
         }
         if($request->hasFile('panfront')){
          $seller->pan_front = $request->panfront->store('uploads/seller_docs');
         }
         if($request->hasFile('gstpdf')){
          $seller->gst_pdf = $request->gstpdf->store('uploads/seller_docs');
         }

        $seller->adhar_no = $request->adharno;
        $seller->pan_no = $request->panno;
        $seller->gst_no = $request->gstno;
        if($seller->save()){
            flash(__('Your Document has been updated successfully!'))->success();
            return back();
        }
        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }

    /**
     * Show the application frontend home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function flash_deal_details($slug)
    {
        $flash_deal = FlashDeal::where('slug', $slug)->first();
        if($flash_deal != null)
            return view('frontend.flash_deal_details', compact('flash_deal'));
        else {
            abort(404);
        }
    }

    public function load_featured_section(){
        return view('frontend.partials.featured_products_section');
    }

    public function load_best_selling_section(){
        return view('frontend.partials.best_selling_section');
    }

    public function load_home_categories_section(){
        return view('frontend.partials.home_categories_section');
    }

    public function load_best_sellers_section(){
        return view('frontend.partials.best_sellers_section');
    }

    public function trackOrder(Request $request)
    {
        if($request->has('order_code')){
            $order = Order::where('code', $request->order_code)->first();
            if($order != null){
                return view('frontend.track_order', compact('order'));
            }
        }
        return view('frontend.track_order');
    }

    public function product(Request $request, $slug)
    {
        $detailedProduct  = Product::where('slug', $slug)->first();
        $detailedProduct->most_view = $detailedProduct->most_view + 1;
        $detailedProduct->save();
        if($detailedProduct!=null && $detailedProduct->published){
            updateCartSetup();
            if($request->has('referral_code')){
                Cookie::queue('referral_code', $request->referral_code, 43200);
            }
            return view('frontend.product_details', compact('detailedProduct'));
        }
        abort(404);
    }

    public function shop($slug)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null){
            $seller = Seller::where('user_id', $shop->user_id)->first();
            if ($seller->verification_status != 0){
                return view('frontend.seller_shop', compact('shop'));
            }
            else{
                return view('frontend.seller_shop_without_verification', compact('shop', 'seller'));
            }
        }
        abort(404);
    }

    public function filter_shop($slug, $type)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null && $type != null){
            return view('frontend.seller_shop', compact('shop', 'type'));
        }
        abort(404);
    }

    public function listing(Request $request)
    {
        // $products = filter_products(Product::orderBy('created_at', 'desc'))->paginate(12);
        // return view('frontend.product_listing', compact('products'));
        return $this->search($request);
    }

    public function all_categories(Request $request)
    {
        $categories = Category::all();
        return view('frontend.all_category', compact('categories'));
    }
    public function all_brands(Request $request)
    {
        $categories = Category::all();
        return view('frontend.all_brand', compact('categories'));
    }

    public function show_product_upload_form(Request $request)
    {
        $categories = Category::all();
        return view('frontend.seller.product_upload', compact('categories'));
    }

    public function show_product_edit_form(Request $request, $id)
    {
        $categories = Category::all();
        $product = Product::find(decrypt($id));
        return view('frontend.seller.product_edit', compact('categories', 'product'));
    }

    public function seller_product_list(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.seller.products', compact('products'));
    }

    public function ajax_search(Request $request)
    {
        $keywords = array();
        $products = Product::where('published', 1)->where('tags', 'like', '%'.$request->search.'%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',',$product->tags) as $key => $tag) {
                if(stripos($tag, $request->search) !== false){
                    if(sizeof($keywords) > 5){
                        break;
                    }
                    else{
                        if(!in_array(strtolower($tag), $keywords)){
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::where('published', 1)->where('name', 'like', '%'.$request->search.'%'))->get()->take(3);

        $subsubcategories = SubSubCategory::where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        if(sizeof($keywords)>0 || sizeof($subsubcategories)>0 || sizeof($products)>0 || sizeof($shops) >0){
            return view('frontend.partials.search_content', compact('products', 'subsubcategories', 'keywords', 'shops'));
        }
        return '0';
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $query = $request->q;
        $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
        $sort_by = $request->sort_by;
        $category_id = (Category::where('slug', $request->category)->first() != null) ? Category::where('slug', $request->category)->first()->id : null;
        $occasion_id = (Occasion::where('slug', $request->occasion)->first() != null) ? Occasion::where('slug', $request->occasion)->first()->id : null;
        $fabric_id = (Fabric::where('slug', $request->fabric)->first() != null) ? Fabric::where('slug', $request->fabric)->first()->id : null;
        $subcategory_id = (SubCategory::where('slug', $request->subcategory)->first() != null) ? SubCategory::where('slug', $request->subcategory)->first()->id : null;
        $subsubcategory_id = (SubSubCategory::where('slug', $request->subsubcategory)->first() != null) ? SubSubCategory::where('slug', $request->subsubcategory)->first()->id : null;
        // if(isset( $request->prices)){
        //     $price = explode("-", $request->prices);
        //     $min_price = $price[0];
        //     $max_price = $price[1]; 
        // }else{
        //     $min_price = $request->min_price;
        //     $max_price = $request->max_price; 
        // }
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if($category_id != null){
            $conditions = array_merge($conditions, ['category_id' => $category_id]);
        }
        if($occasion_id != null){
            $conditions = array_merge($conditions, ['occasion_id' => $occasion_id]);
        }
        if($fabric_id != null){
            $conditions = array_merge($conditions, ['fabric_id' => $fabric_id]);
        }
        if($subcategory_id != null){
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory_id]);
        }
        if($subsubcategory_id != null){
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory_id]);
        }
        if($seller_id != null){
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $products = Product::where($conditions);
        $productfield = Product::where($conditions)->get();
        $productfield_count = Product::where($conditions);

        
      
        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%'.$query.'%')->orWhere('tags', 'like', '%'.$query.'%');
        }

        if($sort_by != null){
            switch ($sort_by) {
                case '1':
                    $products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $products->orderBy('unit_price', 'desc');
                    break;
                case '5':
                    $products->orderBy('most_view', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }


        $non_paginate_products = filter_products($products)->get();
        //Attribute Filter
        // dd($non_paginate_products);

        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if($product->attributes != null && is_array(json_decode($product->attributes))){
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if($attribute['id'] == $value){
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if(!$flag){
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if($choice_option->attribute_id == $value){
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    }
                    else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if($choice_option->attribute_id == $value){
                                foreach ($choice_option->values as $key => $value) {
                                    if(!in_array($value, $attributes[$pos]['values'])){
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $att = array();
        foreach ($non_paginate_products as $key => $product) {
            foreach (json_decode($product->choice_options) as $key => $choice_option) {
                foreach ($choice_option->values as $key => $value) {
                         $cos = array_push($att, $value);
                }
                
            }
        }
        $attr =   array_count_values($att);
     
        $selected_attributes = array();
        foreach ($attributes as $key => $attribute) {
            if($request->has('attribute_'.$attribute['id'])){
                foreach ($request['attribute_'.$attribute['id']] as $key => $value) {
                    $str = '"'.$value.'"';
                    $products = $products->where('choice_options', 'like', '%'.$str.'%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_'.$attribute['id']];
                array_push($selected_attributes, $item);
            }
        }

        $min_price = $request->min_price;
        $max_price = $request->max_price; 
        $test = $request->prices;
        if(isset($request->prices) && $request->prices != null){
            $price = null;
            foreach($request->prices as $key=>$item){
                $price = explode("-", $item);
                $min_price = $price[0];
                $max_price = $price[1]; 
                if($min_price != null && $max_price != null){
                    $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
                }
            }
        }


        $mins = array();
        foreach ($productfield as $key => $product) {
            if(isset($product->unit_price)){
                $min = $product->unit_price;
               array_push($mins, $min);
            }
        }
        $ranges = [];
        $i = 0;
        $counter = 0;
        $final = array();
        if(isset($min) && $min != '[]'){
            $before = floor(min($mins) / 100) * 100; 
            $after = ceil(max($mins) / 100) * 100;
            while( $before < $after){
                $counter = 0;
                $i++;
                if($i == 1){
                    $rangeStart = $before + 0;
                    $before = $before + 499;
                    $counter= Product::whereBetween('unit_price', [$rangeStart, $before])->count();
                    $ranges[] = [$rangeStart, $before,$counter];
                }else{
                    $rangeStart = $before + 1;
                    $before = $before + 500;
                    $counter= Product::whereBetween('unit_price', [$rangeStart, $before])->count();
                    $ranges[] = [$rangeStart, $before,$counter];
                }
            }

            foreach($ranges as $rangess){
                array_push($final, $rangess[0]."-".$rangess[1]."-".$rangess[2]);
            }
        }

        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if(!in_array($color, $all_colors)){
                        array_push($all_colors, $color);
                    }
                }
            }
        }
        
        if(isset($request->tag)){
            $products = $products->where('tags', 'like', '%'.$request->tag.'%');
        }


        $selected_color = null;

        if($request->has('color')){
            $str = '"'.$request->color.'"';
            $products = $products->where('colors', 'like', '%'.$str.'%');
            $selected_color = $request->color;
        }

        $products = filter_products($products)->paginate(12)->appends(request()->query());


        $tags = array();
        foreach($products as $product){
            if(isset($product->tags)){
                $tag = explode(",", $product->tags);
                $tags = array_merge($tags, $tag);
            }
            
        }
        $tags = array_unique($tags);
        
        return view('frontend.product_listing', compact('fabric_id','occasion_id','attr','test','final','tags','products', 'query', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price', 'attributes', 'selected_attributes', 'all_colors', 'selected_color'));
    }

    public function product_content(Request $request){
        $connector  = $request->connector;
        $selector   = $request->selector;
        $select     = $request->select;
        $type       = $request->type;
        productDescCache($connector,$selector,$select,$type);
    }

    public function home_settings(Request $request)
    {
        return view('home_settings.index');
    }

    public function top_10_settings(Request $request)
    {
        foreach (Category::all() as $key => $category) {
            if(in_array($category->id, $request->top_categories)){
                $category->top = 1;
                $category->save();
            }
            else{
                $category->top = 0;
                $category->save();
            }
        }

        foreach (Brand::all() as $key => $brand) {
            if(in_array($brand->id, $request->top_brands)){
                $brand->top = 1;
                $brand->save();
            }
            else{
                $brand->top = 0;
                $brand->save();
            }
        }

        flash(__('Top 10 categories and brands have been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }

    public function variant_price(Request $request)
    {
        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;

        if($request->has('color')){
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
            if($str != null){
                $str .= '-'.str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
            }
            else{
                $str .= str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
            }
        }

        if($str != null && $product->variant_product){
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;
        }
        else{
            $price = $product->unit_price;
            $quantity = $product->current_stock;
        }
        
        //discount calculation
        $flash_deals = \App\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $key => $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $price -= ($price*$flash_deal_product->discount)/100;
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
            if($product->discount_type == 'percent'){
                $price -= ($price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
                $price -= $product->discount;
            }

        if($product->tax_type == 'percent'){
            $price += ($price*$product->tax)/100;
        }
        elseif($product->tax_type == 'amount'){
            $price += $product->tax;
        }
        return array('price' => single_price($price), 'quantity' => $quantity , 'attprice'=>single_price($product_stock->price));
    }

    public function shippingpolicy(){
        return view("frontend.policies.shippingpolicy");
    }

    public function returnpolicy(){
        return view("frontend.policies.returnpolicy");
    }

    public function faq(){
        return view("frontend.policies.faq");
    }

    public function terms(){
        return view("frontend.policies.terms");
    }

    public function privacypolicy(){
        return view("frontend.policies.privacypolicy");
    }

    public function get_pick_ip_points(Request $request)
    {
        $pick_up_points = PickupPoint::all();
        return view('frontend.partials.pick_up_points', compact('pick_up_points'));
    }

    public function get_category_items(Request $request){
        $category = Category::findOrFail($request->id);
        return view('frontend.partials.category_elements', compact('category'));
    }

    public function premium_package_index()
    {
        $customer_packages = CustomerPackage::all();
        return view('frontend.partials.customer_packages_lists',compact('customer_packages'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function quickview(Request $request)
    {
        // dd($request->all());
        $product = Product::findorFail($request->id);
        return view('frontend.partials.quick-view',compact('product'));
    }

    public function CheckPincode(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $pincodearray = explode(',', $product->pincode);
            $sercharray = in_array($request->pincode, $pincodearray);
        if($sercharray == true){
            return response()->json(['status'=>true, 'pincodeval'=>$request->pincode]);
        }else{
            return response()->json(['status'=>false, 'pincodeval'=>$request->pincode]);
        }
    }
}
