<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
use File;
use Response;

class ProductController extends Controller
{
    public function bannerImage ($product_id) 
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_record = DB::table('product')
            ->where('id', $product_id)
            ->get();

        $path = public_path('assets/product/banner/'.$product_record[0]->banner);

        if (!File::exists($path)) 
            $response = 404;

        $file     = File::get($path);
        $type     = File::extension($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function productAdditionalImage ($product_additional_img_id) 
    {
        try {
            $product_additional_img_id = decrypt($product_additional_img_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_additional_record = DB::table('product_additional_images')
            ->where('id', $product_additional_img_id)
            ->get();

        $path = public_path('assets/product/images/'.$product_additional_record[0]->additional_image);

        if (!File::exists($path)) 
            $response = 404;

        $file     = File::get($path);
        $type     = File::extension($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }


    public function brandBanner ($brand_id) 
    {
        try {
            $brand_id = decrypt($brand_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $brand_record = DB::table('brand')
            ->where('id', $brand_id)
            ->get();

        $path = public_path('assets/brand/'.$brand_record[0]->banner);

        if (!File::exists($path)) 
            $response = 404;

        $file     = File::get($path);
        $type     = File::extension($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function themeBanner ($theme_id) 
    {
        try {
            $theme_id = decrypt($theme_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $theme_record = DB::table('theme')
            ->where('id', $theme_id)
            ->first();

        $path = public_path('assets/theme/'.$theme_record->banner);

        if (!File::exists($path)) 
            $response = 404;

        $file     = File::get($path);
        $type     = File::extension($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
