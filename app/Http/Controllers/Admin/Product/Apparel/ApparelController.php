<?php

namespace App\Http\Controllers\Admin\Product\Apparel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
use File;
use Response;
use Str;

class ApparelController extends Controller
{
    public function showProductForm () 
    {
    	$all_sub_category = DB::table('sub_category')
            ->where('top_category_id', 1)
            ->get();
        $top_category = DB::table('top_category')
            ->where('id', 1)
            ->first();
        $all_brand = DB::table('brand')
            ->where('status', 1)
            ->get();
            
        return view('admin.product.apparel.new_product', ['top_category' => $top_category, 'data' => $all_sub_category, 'brand' => $all_brand]);
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
            'discount'      => 'required',
            'desc'          => 'required',
            'banner'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'size_id'       => 'required',
            'color_id'      => 'required',
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

            for($i = 0; $i < count($request->input('size_id')); $i++) 
            {
                DB::table('product_size_mapping')
                    ->insert([ 
                        'product_id' => $product_id,
                        'size_id' => $request->input('size_id')[$i], 
                    ]);
            }

            for($i = 0; $i < count($request->input('color_id')); $i++) 
            {
                DB::table('product_color_mapping')
                    ->insert([ 
                        'product_id' => $product_id,
                        'color_id' => $request->input('color_id')[$i], 
                    ]);
            }

            return redirect()->route('admin.product_stock_entry', ['product_id' => encrypt($product_id)]);

        } else 
        	return redirect()->back()->with('msg', 'Please ! select a banner');
    }

    public function productStockEntry($product_id)
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_color = DB::table('product_color_mapping')
            ->leftJoin('color', 'product_color_mapping.color_id', '=', 'color.id')
            ->where('product_color_mapping.product_id', $product_id)
            ->select('color.*')
            ->get();

        $product_size = DB::table('product_size_mapping')
            ->leftJoin('size', 'product_size_mapping.size_id', '=', 'size.id')
            ->where('product_size_mapping.product_id', $product_id)
            ->select('size.*')
            ->get();

        return view('admin.product.apparel.product_stock_entry', ['product_id' => $product_id, 'product_color' => $product_color, 'product_size' => $product_size]);
    }

    public function addStockEntry(Request $request, $product_id)
    {
        $request->validate([
            'stock' => 'required'
        ]);

        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        for ($i=0; $i < count($request->input('color_id')); $i++) { 
            DB::table('product_stock')
                ->insert([
                    'product_id' => $product_id,
                    'size_id' => $request->input('size_id')[$i],
                    'color_id' => $request->input('color_id')[$i],
                    'stock' => $request->input('stock')[$i],
                ]);
        }

        return redirect()->route('admin.new_apparel_product')->with('msg', 'Product has been added sucessfully');
    }

    public function productList()
    {
        return view('admin.product.apparel.product_list.product_list');
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
                            ->where('top_category.id', 1)
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
                            ->where('top_category.id', 1)
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
                            ->where('top_category.id', 1)
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
                    $val = "<a href=\"".route('admin.change_apparel_product_status', ['product_id' => encrypt($single_data->id), 'status' => encrypt(0)])."\" class=\"btn btn-primary\">In-Active</a>";
                else
                    $val = "<a href=\"".route('admin.change_apparel_product_status', ['product_id' => encrypt($single_data->id), 'status' => encrypt(1)])."\" class=\"btn btn-primary\">Active</a>";

                $nestedData['id']            = $cnt;
                $nestedData['product_name']  = $single_data->product_name;
                $nestedData['slug']          = $single_data->slug;
                $nestedData['third_level_sub_category']  = $single_data->third_level_sub_category_name;
                $nestedData['sub_category']  = $single_data->sub_cate_name;
                $nestedData['top_category']  = $single_data->top_cate_name;
                $nestedData['brand']         = $single_data->brand_name;
                $nestedData['price']         = $single_data->price;
                $nestedData['discount']      = $single_data->discount;

                $nestedData['product_banner']  = "&emsp;<a href=\"".route('admin.edit_apparel_product_banner', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-success\" target=\"_blank\">Change Banner</a>";

                $nestedData['product_images']  = "&emsp;<a href=\"".route('admin.additional_apparel_product_image_list', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-primary\" target=\"_blank\">Product Images List</a>";

                $nestedData['action']  = "&emsp;<a href=\"".route('admin.view_apparel_product', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-success\" target=\"_blank\">View</a>&emsp;<a href=\"".route('admin.edit_apparel_product', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-warning\" target=\"_blank\">Edit</a>&emsp;<a href=\"".route('admin.edit_apparel_product_size', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-primary\" target=\"_blank\">Size</a>&emsp;<a href=\"".route('admin.edit_apparel_product_color', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-info\" target=\"_blank\">Color</a>&emsp;<a href=\"".route('admin.edit_apparel_product_stock', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-danger\" target=\"_blank\">Stock</a>&emsp;$val";

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

        return view('admin.product.apparel.banner.edit_banner' , ['url' => $url, 'product_id' => $product_id]);
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

        return view('admin.product.apparel.additional_image.additional_image' , ['additional_image_record' => $additional_image_record, 'product_record' => $product_record]);
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

        $colors = DB::table('product_color_mapping')
            ->leftJoin('color', 'product_color_mapping.color_id', '=', 'color.id')
            ->where('product_color_mapping.product_id', $product_id)
            ->select('color.color')
            ->get();

        $extract_colors = "";
        foreach ($colors as $key => $value)
            $extract_colors = $value->color.", ".$extract_colors;

        $sizes = DB::table('product_size_mapping')
            ->leftJoin('size', 'product_size_mapping.size_id', '=', 'size.id')
            ->where('product_size_mapping.product_id', $product_id)
            ->select('size.size')
            ->get();

        $extract_sizes = "";
        foreach ($sizes as $key => $value)
            $extract_sizes = $value->size.", ".$extract_sizes;

        $product_stock = DB::table('product_stock')
            ->leftJoin('color', 'product_stock.color_id', '=', 'color.id')
            ->leftJoin('size', 'product_stock.size_id', '=', 'size.id')
            ->where('product_stock.product_id', $product_id)
            ->select('product_stock.stock', 'color.color', 'size.size')
            ->get();

        return view('admin.product.apparel.action.view_product', ['product_record' => $product_record, 'extract_colors' => $extract_colors, 'extract_sizes' => $extract_sizes, 'product_stock' => $product_stock]);
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

        return view('admin.product.apparel.action.edit_product', ['all_top_category' => $all_top_category, 'brand' => $all_brand, 'all_sub_category' => $all_sub_category, 'product_record' => $product_record, 'all_third_level_sub_category' => $all_third_level_sub_category]);
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
                    'discount' => $request->input('discount'), 
                    'desc' => $request->desc, 
                    'price' => $request->input('price'), 
                ]);
        
        return redirect()->back()->with('msg', 'Product has been updated');
    }

    public function showEditProductSize ($product_id) 
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_sizes = DB::table('product_size_mapping')
            ->leftJoin('size', 'product_size_mapping.size_id', '=', 'size.id')
            ->where('product_size_mapping.product_id', $product_id)
            ->select('product_size_mapping.*', 'size.size')
            ->get();

        $product_record = DB::table('product')
            ->where('product.id', $product_id)
            ->get();
        
        $all_size = DB::table('size_mapping')
            ->leftJoin('size', 'size_mapping.size_id', '=', 'size.id')
            ->where('size_mapping.sub_category_id', $product_record[0]->sub_category_id)
            ->get();

        return view('admin.product.apparel.action.edit_product_sizes', ['product_sizes' => $product_sizes, 'all_size' => $all_size, 'product_record' => $product_record]);
    }

    public function updateProductSize(Request $request, $product_id) 
    {
        $request->validate([
            'size' => 'required',
        ]);

        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $count = DB::table('product_size_mapping')
            ->where('product_id', $product_id)
            ->where('size_id', $request->input('size'))
            ->count();

        if ($count > 0)
            return redirect()->back()->with('msg', 'Product Size already in the list');
        else {

            DB::table('product_size_mapping')
                    ->insert([ 
                        'product_id' => $product_id,
                        'size_id' => $request->input('size'), 
                    ]);

            return redirect()->back()->with('msg', 'Product Size has been updated');
        }
    }

    public function changeProductSizeStatus($product_mapping_id, $status) 
    {
        try {
            $product_mapping_id = decrypt($product_mapping_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $status = decrypt($status);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('product_size_mapping')
            ->where('id', $product_mapping_id)
            ->update([
                'status' => $status
            ]);

        return redirect()->back();
    }

    public function showEditProductColor ($product_id) 
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_colors = DB::table('product_color_mapping')
            ->leftJoin('color', 'product_color_mapping.color_id', '=', 'color.id')
            ->where('product_color_mapping.product_id', $product_id)
            ->select('product_color_mapping.*', 'color.color')
            ->get();

        $product_record = DB::table('product')
            ->where('product.id', $product_id)
            ->get();
        
        $all_color = DB::table('color_mapping')
            ->leftJoin('color', 'color_mapping.color_id', '=', 'color.id')
            ->where('color_mapping.sub_category_id', $product_record[0]->sub_category_id)
            ->get();

        return view('admin.product.apparel.action.edit_product_colors', ['product_colors' => $product_colors, 'all_color' => $all_color, 'product_record' => $product_record]);
    }

    public function updateProductColor(Request $request, $product_id) 
    {
        $request->validate([
            'color' => 'required',
        ]);

        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $count = DB::table('product_color_mapping')
            ->where('product_id', $product_id)
            ->where('color_id', $request->input('color'))
            ->count();

        if ($count > 0)
            return redirect()->back()->with('msg', 'Product Color already in the list');
        else {

            DB::table('product_color_mapping')
                    ->insert([ 
                        'product_id' => $product_id,
                        'color_id' => $request->input('color'), 
                    ]);

            return redirect()->back()->with('msg', 'Product Color has been updated');
        }
    }

    public function changeProductColorStatus($product_mapping_id, $status) 
    {
        try {
            $product_mapping_id = decrypt($product_mapping_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $status = decrypt($status);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('product_color_mapping')
            ->where('id', $product_mapping_id)
            ->update([
                'status' => $status
            ]);

        return redirect()->back();
    }

    public function showEditProductStock($product_id) 
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product_stock = DB::table('product_stock')
            ->leftJoin('color', 'product_stock.color_id', '=', 'color.id')
            ->leftJoin('size', 'product_stock.size_id', '=', 'size.id')
            ->where('product_stock.product_id', $product_id)
            ->select('product_stock.*', 'color.color', 'size.size')
            ->get();

        $product_color = DB::table('product_color_mapping')
            ->leftJoin('color', 'product_color_mapping.color_id', '=', 'color.id')
            ->where('product_color_mapping.product_id', $product_id)
            ->select('color.*')
            ->get();

        $product_size = DB::table('product_size_mapping')
            ->leftJoin('size', 'product_size_mapping.size_id', '=', 'size.id')
            ->where('product_size_mapping.product_id', $product_id)
            ->select('size.*')
            ->get();

        return view('admin.product.apparel.action.edit_product_stock', ['product_id' => $product_id, 'product_color' => $product_color, 'product_size' => $product_size, 'product_stock' => $product_stock]);
    }

    public function updateProductStock(Request $request, $product_id) 
    {
        $request->validate([
            'stock' => 'required',
        ]);

        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        for ($i=0; $i < count($request->input('color_id')); $i++) { 
            $count = DB::table('product_stock')
                ->where('product_stock.product_id', $product_id)
                ->where('product_stock.size_id', $request->input('size_id')[$i])
                ->where('product_stock.color_id', $request->input('color_id')[$i])
                ->count();

            if ($count > 0) {
                DB::table('product_stock')
                    ->where('product_stock.product_id', $product_id)
                    ->where('product_stock.size_id', $request->input('size_id')[$i])
                    ->where('product_stock.color_id', $request->input('color_id')[$i])
                    ->update([
                        'stock' => $request->input('stock')[$i]
                    ]);
            } 
            else
            {
                DB::table('product_stock')
                    ->insert([
                        'product_id' => $product_id,
                        'size_id' => $request->input('size_id')[$i],
                        'color_id' => $request->input('color_id')[$i],
                        'stock' => $request->input('stock')[$i],
                    ]);
            }
        }

        return redirect()->back()->with('msg', 'Stock has added updated');
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

    public function activeProductList()
    {
        return view('admin.product.apparel.product_list.active_product_list');
    }

    public function inactiveProductList()
    {
        return view('admin.product.apparel.product_list.in_active_product_list');
    }

    public function activeInactiveProductListData(Request $request)
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

        $totalData = DB::table('product')
            ->where('status', $request->input('status'))
            ->count();

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
                            ->where('top_category.id', 1)
                            ->select('product.*', 'sub_category.sub_cate_name', 'top_category.top_cate_name', 'brand.brand_name', 'third_level_sub_category.third_level_sub_category_name')
                            ->where('product.status', $request->input('status'))
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
                            ->where('top_category.id', 1)
                            ->select('product.*', 'sub_category.sub_cate_name', 'top_category.top_cate_name', 'brand.brand_name', 'third_level_sub_category.third_level_sub_category_name')
                            ->where('product.status', $request->input('status'))
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
                            ->where('top_category.id', 1)
                            ->select('product.*', 'sub_category.sub_cate_name', 'top_category.top_cate_name', 'brand.brand_name', 'third_level_sub_category.third_level_sub_category_name')
                            ->where('product.status', $request->input('status'))
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
                    $val = "<a href=\"".route('admin.change_apparel_product_status', ['product_id' => encrypt($single_data->id), 'status' => encrypt(0)])."\" class=\"btn btn-primary\">In-Active</a>";
                else
                    $val = "<a href=\"".route('admin.change_apparel_product_status', ['product_id' => encrypt($single_data->id), 'status' => encrypt(1)])."\" class=\"btn btn-primary\">Active</a>";

                $nestedData['id']            = $cnt;
                $nestedData['product_name']  = $single_data->product_name;
                $nestedData['slug']          = $single_data->slug;
                $nestedData['third_level_sub_category']  = $single_data->third_level_sub_category_name;
                $nestedData['sub_category']  = $single_data->sub_cate_name;
                $nestedData['top_category']  = $single_data->top_cate_name;
                $nestedData['brand']         = $single_data->brand_name;
                $nestedData['price']         = $single_data->price;
                $nestedData['discount']      = $single_data->discount;

                $nestedData['product_banner']  = "&emsp;<a href=\"".route('admin.edit_apparel_product_banner', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-success\" target=\"_blank\">Change Banner</a>";

                $nestedData['product_images']  = "&emsp;<a href=\"".route('admin.additional_apparel_product_image_list', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-primary\" target=\"_blank\">Product Images List</a>";

                $nestedData['action']  = "&emsp;<a href=\"".route('admin.view_apparel_product', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-success\" target=\"_blank\">View</a>&emsp;<a href=\"".route('admin.edit_apparel_product', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-warning\" target=\"_blank\">Edit</a>&emsp;<a href=\"".route('admin.edit_apparel_product_size', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-primary\" target=\"_blank\">Size</a>&emsp;<a href=\"".route('admin.edit_apparel_product_color', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-info\" target=\"_blank\">Color</a>&emsp;<a href=\"".route('admin.edit_apparel_product_stock', ['product_id' => encrypt($single_data->id)])."\" class=\"btn btn-danger\" target=\"_blank\">Stock</a>&emsp;$val";

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
}
