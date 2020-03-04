<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;
use DB;
use Carbon\Carbon;

class UsersLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:users')->except('logout');
    }

    public function showUserLoginForm(){
        return view('web.user.login', ['url' => 'users']);
    }

    public function userLogin(Request $request){

        $this->validate($request, [
            'username'   => 'required|numeric',
            'password' => 'required'
        ]);
        if (Auth::guard('users')->attempt(['contact_no' => $request->username, 'password' => $request->password])) {

            /** If Cart is Present **/
            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $cart = Session::get('cart');
                if (count($cart) > 0) {
                    foreach ($cart as $stock_id => $item) {
                        $check_cart_product = DB::table('cart')
                            ->where('user_id', Auth::guard('users')->user()->id)
                            ->where('stock_id', $stock_id)
                            ->count();

                        if ($check_cart_product < 1 ) {
                            DB::table('cart')
                                ->insert([
                                    'user_id' => Auth::guard('users')->user()->id,
                                    'stock_id' =>  $stock_id,
                                    'quantity' => (int)$item,
                                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                                ]);
                        }
                    }
                }
                Session::forget('cart');
                Session::save();
            }
            
            return redirect()->intended('/');
        }
        return back()->withInput($request->only('username'))->with('login_error','Username or password incorrect');
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect()->route('web.login');
    }
}
