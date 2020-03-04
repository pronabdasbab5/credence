<?php

namespace App\Http\Controllers\Admin\Brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
use File;

class BrandController extends Controller
{
    public function showBrandForm() 
    {
        return view('admin.brand.new_brand');
    }

    public function addBrand(Request $request) 
    {
        $this->validate($request, [
            'brand_name'    => 'required',
        ]);

        $count = DB::table('brand')
            ->where('brand_name', ucwords(strtolower($request->input('brand_name'))))
            ->count();

        if ($count > 0)
            $msg = "Brand already added";
        else {
            DB::table('brand')
            ->insert([ 
                'brand_name' => ucwords(strtolower($request->input('brand_name')))
            ]);

            $msg = "Brand has been added successfully";
        }

        return redirect()->back()->with('msg', $msg);
    }

    public function allBrand() 
    {
        $all_brand = DB::table('brand')->get();
        return view('admin.brand.all_brand', ['data' => $all_brand]);
    }

    public function showEditBrandForm($brand_id) 
    {
        try {
            $brand_id = decrypt($brand_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $brand_record = DB::table('brand')
            ->where('id', $brand_id)
            ->get();

        return view('admin.brand.edit_brand', ['data' => $brand_record]);
    }

    public function updateBrand(Request $request, $brand_id) 
    {
        $this->validate($request, [
            'brand_name'    => 'required',
        ]);

        try {
            $brand_id = decrypt($brand_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $count = DB::table('brand')
            ->where('brand_name', ucwords(strtolower($request->input('brand_name'))))
            ->count();

        if ($count > 0)
            $msg = "Brand has been updated";
        else {
            DB::table('brand')
                ->where('id', $brand_id)
                ->update([ 
                    'brand_name' => ucwords(strtolower($request->input('brand_name')))
                ]);

            $msg = "Brand has been updated successfully";
        }

        return redirect()->back()->with('msg', $msg);
    }
}
