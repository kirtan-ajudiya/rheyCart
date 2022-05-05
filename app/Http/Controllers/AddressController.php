<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billings = Address::where('user_id', Auth::user()->id)->where('type', 'billing')->get();
        $shippings = Address::where('user_id', Auth::user()->id)->where('type', 'shipping')->get();

        return view('frontend.customer.address.address', compact('shippings', 'billings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('frontend.customer.address.address-create');
        } catch (\Throwable $th) {
            //throw $th;
        }
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'postal_code' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        try {
            $address = new Address;
            $address->user_id = Auth::user()->id;
            $address->address = $request->address;
            $address->country = $request->country;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->postal_code = $request->postal_code;
            $address->phone = $request->phone;
            $address->email = $request->email;
            $address->first_name = $request->first_name;
            $address->last_name = $request->last_name;
            $address->company_name = $request->company_name;
            $address->type = $request->type;
            if($address->save()){
                flash(__('Address created successfully!'))->success();
                return redirect()->route('addresses.index');
            }else{
                flash(__('Sorry! Something went wrong.'))->error();
                return back();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $address = Address::findOrFail(decrypt($id));
            return view('frontend.customer.address.edit-addresses', compact('address'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'postal_code' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        try {
            $address = Address::findOrFail($id);
            $address->address = $request->address;
            $address->country = $request->country;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->postal_code = $request->postal_code;
            $address->phone = $request->phone;
            $address->email = $request->email;
            $address->first_name = $request->first_name;
            $address->last_name = $request->last_name;
            $address->company_name = $request->company_name;
            $address->type = $request->type;
            if($address->save()){
                flash(__('Address updated successfully!'))->success();
                return redirect()->route('addresses.index');
            }else{
                flash(__('Sorry! Something went wrong.'))->error();
                return back();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail(decrypt($id));
            $address->delete();
            flash(__('Address deleted successfully.'))->success();
            return back();
    }

    public function set_default($id){
        foreach (Auth::user()->addresses as $key => $address) {
            $address->set_default = 0;
            $address->save();
        }
        $address = Address::findOrFail($id);
        $address->set_default = 1;
        $address->save();

        return back();
    }
}
