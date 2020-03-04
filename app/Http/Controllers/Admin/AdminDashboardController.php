<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminDashboardController extends Controller
{
    public function index(){

    	$total_user = DB::table('users')
    		->count();

    	$total_brand = DB::table('brand')
    		->count();

    	$total_order = DB::table('order')
    		->count();

    	$latest_ten_user = DB::table('users')
    		->orderBy('id', 'DESC')
    		->limit(6)
    		->get();

    	$latest_ten_order = DB::table('order')
                            ->leftJoin('users', 'order.user_id', '=', 'users.id')
                            ->select('order.*', 'users.name')
                            ->where('order.order_status', 1)
                            ->limit(6)
                            ->orderBy('order.id', 'DESC')
                            ->get();

    	return view('admin.dashboard', ['total_user' => $total_user, 'total_brand' => $total_brand, 'total_order' => $total_order, 'latest_ten_user' => $latest_ten_user, 'latest_ten_order' => $latest_ten_order]);
    }
}
