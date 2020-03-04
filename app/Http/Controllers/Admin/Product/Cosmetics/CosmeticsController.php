<?php

namespace App\Http\Controllers\Admin\Product\Cosmetics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
use File;
use Response;
use Str;

class CosmeticsController extends Controller
{
    public function showProductForm () 
    {
    	$all_sub_category = DB::table('sub_category')
            ->where('top_category_id', 2)
            ->get();
        $top_category = DB::table('top_category')
            ->where('id', 2)
            ->first();
        $all_brand = DB::table('brand')
            ->where('status', 1)
            ->get();
            
        return view('admin.product.cosmetics.new_product', ['top_category' => $top_category, 'data' => $all_sub_category, 'brand' => $all_brand]);
    }

    public function addProduct(Request $request) 
    {
        $request->validate([
        	'top_cate_name' => 'required',
            'sub_cate_name' => 'required',
            'third_level_sub_cate_name' => 'required',
            'product_name'  => 'required',
            'brand'  => 'required',
            'slug'  => 'required',
            'price'         => 'required',
            'stock'         => 'required',
            'discount'      => 'required',
            'desc'          => 'required',
            'banner'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $file   = time().'.'.$banner->getClientOriginalExtension();
         
            $destinationPath = public_path('/assets/product/banner');
            $img = Image::make($banner->getRealPath());
            $img->save($destinationPath.'/'.$file);

            DB::table('product')
	            ->insert([ 
                    'product_name' => $request->input('product_name'), 
                    'slug' => strtolower(Str::slug($request->input('slug'), '-')),
                    'top_category_id' => $request->input('top_cate_name'), 
                    'sub_category_id' => $request->input('sub_cate_name'),
                    'third_level_sub_category_id' => $request->input('third_level_sub_cate_name'), 
                    'brand_id' => $request->input('brand'), 
                    'discount' => $request->input('discount'), 
                    'desc' => $request->desc, 
                    'price' => $request->input('price'), 
                    'stock' => $request->input('stock'), 
	            	'banner' => $file, 
                ]);

            $product_id = DB::getPdo()->lastInsertId();
                
            if($request->hasFile('slider_images'))
            {
                for($i = 0; $i < count($request->file('slider_images')); $i++) 
                {
                    $original_file = $request->file('slider_images')[$i];
                    $file   = time().$i.'.'.$original_file->getClientOriginalExtension();
                
                    $destinationPath = public_path('/assets/product/images');
                    $img = Image::make($original_file->getRealPath());
                    $img->save($destinationPath.'/'.$file);

                    DB::table('product_additional_images')
                        ->insert([ 
                            'product_id' => $product_id,
                            'additional_image' => $file, 
                        ]);
                }
            }

            return redirect()->back()->with('msg', 'Product has been uploaded successfully');

        } else 
        	return redirect()->back()->with('msg', 'Please ! select a banner');
    }

    public function productList()
    {
        return view('admin.product.cosmetics.product_list.product_list');
    }

    public function productListData(Request $request)
    {
        $columns = array( 
                            0 => 'id', 
                            1 => 'product_name',
                            2 => 'slug',
                            3 => 'third_level_sub_category',
                            4 => 'sub_category',
                            5 => 'top_category',
                            6 => 'brand',
                            7 => 'price',
                            8 => 'discount',
                            9 => 'product_banner',
                            10=> 'product_images',
                            11=> 'action',
                        );

        $totalData = DB::table('product')->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))) {            
            
            $product_data = DB::table('product')
                            ->leftJoin('third_level_sub_category', 'product.third_level_sub_category_id', '=', 'third_level_sub_category.id')
                            ->leftJoin('sub_category', 'product.sub_category_id', '=', 'sub_category.id')
                            ->leftJoin('top_category', 'sub_category.top_category_id', '=', 'top_category.id')
                            ->leftJoin('brand', 'product.brand_id', '=', 'brand.id')
                            ->where('top_category.id', 2)
                            ->select('product.*', 'sub_category.sub_cate_name', 'top_category.top_cate_name', 'brand.brand_name', 'third_level_sub_category.third_level_sub_category_name')
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        }
        else {

            $search = $request->input('search.value'); 

            $product_data = DB::table('product')
                            ->leftJoin('third_level_sub_category', 'product.third_level_sub_category_id', '=', 'third_level_sub_category.id')
                            ->leftJoin('sub_category', 'product.sub_category_id', '=', 'sub_category.id')
                            ->leftJoin('top_category', 'sub_category.top_category_id', '=', 'top_category.id')
                            ->leftJoin('brand', 'product.brand_id', '=', 'brand.id')
                            ->where('top_category.id', 2)
                            ->select('product.*', 'sub_category.sub_cate_name', 'top_category.top_cate_name', 'brand.brand_name', 'third_level_sub_category.third_level_sub_category_name')
                            ->where('top_category.top_cate_name','LIKE',"%{$search}%")
                            ->orWhere('sub_category.sub_cate_name', 'LIKE',"%{$search}%")
                            ->orWhere('third_level_sub_category.third_level_sub_category_name', 'LIKE',"%{$search}%")
                            ->orWhere('brand.brand_name', 'LIKE',"%{$search}%")
                            ->orWhere('product.product_name', 'LIKE',"%{$search}%")
                            ->orWhere('product.discount', 'LIKE',"%{$search}%")
                            ->orWhere('product.price', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = DB::table('product')
                            ->leftJoin('third_level_sub_category', 'product.third_level_sub_category_id', '=', 'third_level_sub_category.id')
                            ->leftJoin('sub_category', 'product.sub_category_id', '=', 'sub_category.id')
                            ->leftJoin('top_category', 'sub_category.top_category_id', '=', 'top_category.id')
                            ->leftJoin('brand', 'product.brand_id', '=', 'brand.id')
                            ->where('top_category.id', 2)
                            ->select('product.*', 'sub_category.sub_cate_name', 'top_category.top_cate_name', 'brand.brand_name', 'third_level_sub_category.third_level_sub_category_name')
                            ->where('top_category.top_cate_name','LIKE',"%{$search}%")
                            ->orWhere('sub_category.sub_cate_name', 'LIKE',"%{$search}%")
                            ->orWhere('third_level_sub_category.third_level_sub_category_name', 'LIKE',"%{$search}%")
                            ->orWhere('brand.brand_name', 'LIKE',"%{$search}%")
                            ->orWhere('product.product_name', 'LIKE',"%{$search}%")
                            ->orWhere('product.discount', 'LIKE',"%{$search}%")
                            ->orWhere('product.price', 'LIKE',"%{$search}%")
                            ->count();
        }

        $data = array();

        if(!empty($product_data)) {

            $cnt = 1;

            foreach ($product_data as $single_data) {

                if($single_data->status == 1)
                    $val = "<a href=\"".route('admin.change_cosmetics_product_status', ['product_id' => encrypt($single_data->id), 'status' => encrypt(0)])."\" class=\"btn btn-primary\">In-Active</a>";
                else
                    $val = "<a href=\"".route('admin.change_cosmetics_product_status', ['product_id' => encrypt($single_data->id), 'status' => encrypt(1)])."\" class=\"btn btn-primary\">Active</a>";

                $nestedData['id']            = $cnt;
                $nestedData['product_name']  = $single_data->product_name;
                $nestedData['slug']          = $single_data->slug;
                $nestedData['third_level_sub_category']  = $single_data->third_level_sub_category_name;
                $nestedData['sub_category']  = $single_data->sub_cate_name;
                $nestedData['top_category']  = $single_data->top_cate_name;
                $nestedData['brand']         = $single_data->brand_name;
                $nestedData['price']         = $single_data->price;
                $nestedData['discount']      = $single_data->discount;

                $nestedData['product_banner']  = "&emsp;<a href=\"".route('admin.edit_cosmetics_product_banner', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-success\" target=\"_blank\">Change Banner</a>";

                $nestedData['product_images']  = "&emsp;<a href=\"".route('admin.additional_cosmetics_product_image_list', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-primary\" target=\"_blank\">Product Images List</a>";

                $nestedData['action']  = "&emsp;<a href=\"".route('admin.view_cosmetics_product', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-success\" target=\"_blank\">View</a>&emsp;<a href=\"".route('admin.edit_cosmetics_product', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-warning\" target=\"_blank\">Edit</a>&emsp;$val";

                $data[] = $nestedData;

                $cnt++;
            }
        }

        $json_data = array(
                        "draw"            => intval($request->input('draw')),  
                        "recordsTotal"    => intval($totalData),  
                        "recordsFiltered" => intval($totalFiltered), 
                        "data"            => $data   
                    );
            
        print json_encode($json_data); 
    }

    public function showEditProductBanner($product_id)
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $url = route('admin.banner_image', ['product_id' => encrypt($product_id)]);

        return view('admin.product.cosmetics.banner.edit_banner' , ['url' => $url, 'product_id' => $product_id]);
    }

    public function updateProductBanner(Request $request, $product_id)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_record = DB::table('product')
            ->where('id', $product_id)
            ->get();

        if ($request->hasFile('icon')) {
            $banner = $request->file('icon');
            $file   = time().'.'.$banner->getClientOriginalExtension();
         
            $destinationPath = public_path('/assets/product/banner');
            $img = Image::make($banner->getRealPath());
            $img->save($destinationPath.'/'.$file);

            File::delete(public_path('assets/product/banner/'.$product_record[0]->banner));
            DB::table('product')
                ->where('id', $product_id)
                ->update([ 
                    'banner' => $file, 
                ]);
        }

        return redirect()->back()->with('msg', 'Banner has been changed');
    }

    public function showProductImageList($product_id)
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $additional_image_record = DB::table('product_additional_images')
            ->where('product_id', $product_id)
            ->get();

        $product_record = DB::table('product')
            ->where('id', $product_id)
            ->get();

        return view('admin.product.cosmetics.additional_image.additional_image' , ['additional_image_record' => $additional_image_record, 'product_record' => $product_record]);
    }

    public function updateProductAdditionalImage(Request $request, $additional_image_id)
    {
        $request->validate([
            'additional_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        try {
            $additional_image_id = decrypt($additional_image_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $additional_image_record = DB::table('product_additional_images')
            ->where('id', $additional_image_id)
            ->get();

        if ($request->hasFile('additional_image')) {
            $additional_image = $request->file('additional_image');
            $file   = time().'.'.$additional_image->getClientOriginalExtension();
         
            $destinationPath = public_path('/assets/product/images');
            $img = Image::make($additional_image->getRealPath());
            $img->save($destinationPath.'/'.$file);

            File::delete(public_path('assets/product/images/'.$additional_image_record[0]->additional_image));
            DB::table('product_additional_images')
                ->where('id', $additional_image_id)
                ->update([ 
                    'additional_image' => $file, 
                ]);
        }

        return redirect()->back();
    }

    public function viewProduct($product_id)
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_record = DB::table('product')
            ->leftJoin('brand', 'product.brand_id', '=', 'brand.id')
            ->leftJoin('third_level_sub_category', 'product.third_level_sub_category_id', '=', 'third_level_sub_category.id')
            ->leftJoin('sub_category', 'product.sub_category_id', '=', 'sub_category.id')
            ->leftJoin('top_category', 'sub_category.top_category_id', '=', 'top_category.id')
            ->where('product.id', $product_id)
            ->select('product.*', 'brand.brand_name', 'third_level_sub_category.third_level_sub_category_name', 'sub_category.sub_cate_name', 'top_category.top_cate_name')
            ->get();


        return view('admin.product.cosmetics.action.view_product', ['product_record' => $product_record]);
    }

    public function showEditProduct ($product_id) 
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_record = DB::table('product')
            ->where('id', $product_id)
            ->get();
        $all_top_category = DB::table('top_category')->get();
        $all_brand = DB::table('brand')->get();
        $all_sub_category = DB::table('sub_category')
            ->where('top_category_id', $product_record[0]->top_category_id)
            ->get();

        $all_third_level_sub_category = DB::table('third_level_sub_category')
            ->where('sub_category', $product_record[0]->sub_category_id)
            ->where('top_category', $product_record[0]->top_category_id)
            ->get();

        return view('admin.product.cosmetics.action.edit_product', ['all_top_category' => $all_top_category, 'brand' => $all_brand, 'all_sub_category' => $all_sub_category, 'product_record' => $product_record, 'all_third_level_sub_category' => $all_third_level_sub_category]);
    }

    public function updateProduct(Request $request, $product_id) 
    {
        $request->validate([
            'top_cate_name' => 'required',
            'sub_cate_name'  => 'required',
            'third_level_sub_cate_name' => 'required',
            'brand'         => 'required',
            'product_name'  => 'required',
            'slug'      => 'required',
            'stock'      => 'required',
            'price'      => 'required',
            'discount'          => 'required',
            'desc'          => 'required',
        ]);

        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('product')
                ->where('id', $product_id)
                ->update([ 
                    'product_name' => $request->input('product_name'), 
                    'slug' => strtolower(Str::slug($request->input('slug'), '-')), 
                    'top_category_id' => $request->input('top_cate_name'), 
                    'sub_category_id' => $request->input('sub_cate_name'), 
                    'third_level_sub_category_id' => $request->input('third_level_sub_cate_name'), 
                    'brand_id' => $request->input('brand'), 
                    'stock' => $request->input('stock'), 
                    'discount' => $request->input('discount'), 
                    'desc' => $request->desc, 
                    'price' => $request->input('price'), 
                ]);
        
        return redirect()->back()->with('msg', 'Product has been updated');
    }

    public function changeProductStatus($product_id, $status) 
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $status = decrypt($status);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('product')
            ->where('id', $product_id)
            ->update([
                'status' => $status
            ]);

        return redirect()->back();
    }
}
