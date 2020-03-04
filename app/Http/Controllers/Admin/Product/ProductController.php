<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
use File;
use Response;

class ProductController extends Controller
{
    public function retriveSubCategory(Request $request)
    {
    	$all_sub_category = DB::table('sub_category')
    		->where('top_category_id', $request->input('category_id'))
    		->get();

    	$data = "<option value=\"\" disabled selected>Choose Sub-Category</option>";
    	foreach ($all_sub_category as $key => $value)
    		$data = $data."<option value=\"".$value->id."\">".$value->sub_cate_name."</option>";

    	print $data;
    }

     public function retriveGrocerySubCategory(Request $request){
       
        $all_sub_category = DB::table('grocery_sub_category')
            ->where('top_category_id', $request->input('category_id'))
            ->get();

        $data = "<option value=\"\" disabled selected>Choose Sub-Category</option>";
        foreach ($all_sub_category as $key => $value)
            $data = $data."<option value=\"".$value->id."\">".$value->sub_cate_name."</option>";

        print $data;
    }

    public function retriveGrocerySize(Request $request){

        
        $all_size = DB::table('grocery_size_mapping')
            ->leftJoin('grocery_weight_unit', 'grocery_size_mapping.size_id', '=', 'grocery_weight_unit.id')
            ->where('grocery_size_mapping.sub_category_id', $request->input('sub_category_id'))
            ->where('grocery_size_mapping.top_category_id', $request->input('top_category_id'))
            ->get();
            $data = "";
            foreach($all_size as $key => $value)
            $data = $data."<input type=\"checkbox\" name=\"size_id[]\" value=\"".$value->id."\"> ".$value->size." ";
            
            print $data;

    }

    



    public function retriveThirdLevelSubCategory(Request $request)
    {
        $all_sub_category = DB::table('third_level_sub_category')
            ->where('sub_category', $request->input('sub_category_id'))
            ->where('top_category', $request->input('top_category_id'))
            ->get();

        $data = "<option value=\"\" disabled selected>Choose Sub-Category</option>";
        foreach ($all_sub_category as $key => $value)
            $data = $data."<option value=\"".$value->id."\">".$value->third_level_sub_category_name."</option>";

        print $data;
    }

    public function retriveSizeColor(Request $request)
    {
        $all_size = DB::table('size_mapping')
            ->leftJoin('size', 'size_mapping.size_id', '=', 'size.id')
            ->where('size_mapping.sub_category_id', $request->input('sub_category_id'))
            ->where('size_mapping.top_category_id', $request->input('top_category_id'))
            ->get();

        $all_color = DB::table('color_mapping')
            ->leftJoin('color', 'color_mapping.color_id', '=', 'color.id')
            ->where('color_mapping.sub_category_id', $request->input('sub_category_id'))
            ->where('color_mapping.top_category_id', $request->input('top_category_id'))
            ->get();

        $data = "";
        foreach ($all_size as $key => $value)
            $data = $data."<input type=\"checkbox\" name=\"size_id[]\" value=\"".$value->id."\"> ".$value->size." ";

        $data_1 = "";
        foreach ($all_color as $key => $value)
            $data_1 = $data_1."<input type=\"checkbox\" name=\"color_id[]\" value=\"".$value->id."\"> ".$value->color." ";

        print $data.",".$data_1;
    }

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

     public function groceryBannerImage ($product_id) 
    {

        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_record = DB::table('grocery_product')
            ->where('id', $product_id)
            ->get();

        $path = public_path('assets/grocery/product/banner/'.$product_record[0]->banner);

        if (!File::exists($path)) 
            $response = 404;

        $file     = File::get($path);
        $type     = File::extension($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
    public function groceryAdditionalImage ($additional_image_id) 
    {

        try {
            $additional_image_id = decrypt($additional_image_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $additional_image_record = DB::table('grocery_product_aditional_images')
            ->where('id', $additional_image_id)
            ->get();

        $path = public_path('assets/grocery/product/images/'.$additional_image_record[0]->additional_image);

        if (!File::exists($path)) 
            $response = 404;

        $file     = File::get($path);
        $type     = File::extension($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function additionalImage ($additional_image_id) 
    {

        try {
            $additional_image_id = decrypt($additional_image_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $additional_image_record = DB::table('product_additional_images')
            ->where('id', $additional_image_id)
            ->get();

        $path = public_path('assets/product/images/'.$additional_image_record[0]->additional_image);

        if (!File::exists($path)) 
            $response = 404;

        $file     = File::get($path);
        $type     = File::extension($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
