<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class AddressController extends Controller
{
    public function addAddress(Request $request)
    {
    	$request->validate([
            'first_name'    => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin_code' => 'required',
            'mobile_no' => 'required',
        ]);

        DB::table('address')
        	->insert([
        		'user_id' => Auth()->user()->id,
        		'first_name'    => $request->input('first_name'),
	            'last_name' => $request->input('last_name'),
	            'address' => $request->input('address'),
	            'city' => $request->input('city'),
	            'state' => $request->input('state'),
	            'pin_code' => $request->input('pin_code'),
	            'email' => $request->input('email'),
	            'mobile_no' => $request->input('mobile_no'),
        	]);

        return redirect()->back();
    }
}
