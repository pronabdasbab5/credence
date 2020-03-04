<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function index()
    {
 		/** Feature Product **/
        $feature_record = DB::table('make_feature_product')
 			->leftJoin('product', 'make_feature_product.product_id', '=', 'product.id')
            ->where('product.status', 1)
 			->select('product.*')
            ->get();

        $feature_product_record = [];
        foreach ($feature_record as $key => $item){
            $star_sum = DB::table('review')
                ->select(DB::raw('SUM(star) AS star_sum'))
                ->where('product_id', $item->id)
                ->first();

            $total_review = DB::table('review')
                ->where('product_id', $item->id)
                ->count();

            if ($total_review > 0)
                $total_star = floor($star_sum->star_sum/$total_review);
            else
                $total_star = 0;

            $feature_product_record [] = [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'price' => $item->price,
                'discount' => $item->discount,
                'star' => $total_star
            ];
        }

        /** Most Popular Product **/
        $most_popular_record = DB::table('most_popular_product')
 			->leftJoin('product', 'most_popular_product.product_id', '=', 'product.id')
            ->where('product.status', 1)
 			->select('product.*')
            ->get();

        $most_popular_product_record = [];
        foreach ($most_popular_record as $key => $item){
            $star_sum = DB::table('review')
                ->select(DB::raw('SUM(star) AS star_sum'))
                ->where('product_id', $item->id)
                ->first();

            $total_review = DB::table('review')
                ->where('product_id', $item->id)
                ->count();

            if ($total_review > 0)
                $total_star = floor($star_sum->star_sum/$total_review);
            else
                $total_star = 0;

            $most_popular_product_record [] = [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'price' => $item->price,
                'discount' => $item->discount,
                'star' => $total_star
            ];
        }

        /** Best Selling Product **/
        $best_seller_record = DB::table('best_seller_product')
 			->leftJoin('product', 'best_seller_product.product_id', '=', 'product.id')
            ->where('product.status', 1)
 			->select('product.*')
            ->get();

        $best_seller_product_record = [];
        foreach ($best_seller_record as $key => $item){
            $star_sum = DB::table('review')
                ->select(DB::raw('SUM(star) AS star_sum'))
                ->where('product_id', $item->id)
                ->first();

            $total_review = DB::table('review')
                ->where('product_id', $item->id)
                ->count();

            if ($total_review > 0)
                $total_star = floor($star_sum->star_sum/$total_review);
            else
                $total_star = 0;

            $best_seller_product_record [] = [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'price' => $item->price,
                'discount' => $item->discount,
                'star' => $total_star
            ];
        }

        $new_record = DB::table('product')
            ->where('status', 1)
        	->orderBy('id', 'DESC')
        	->limit(5)
        	->get();

        $new_product_record = [];
        foreach ($new_record as $key => $item){
            $star_sum = DB::table('review')
                ->select(DB::raw('SUM(star) AS star_sum'))
                ->where('product_id', $item->id)
                ->first();

            $total_review = DB::table('review')
                ->where('product_id', $item->id)
                ->count();

            if ($total_review > 0)
                $total_star = floor($star_sum->star_sum/$total_review);
            else
                $total_star = 0;

            $new_product_record [] = [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'price' => $item->price,
                'discount' => $item->discount,
                'star' => $total_star
            ];
        }

        $all_brand= DB::table('brand')
            ->where('status', 1)
        	->orderBy('id', 'DESC')
        	->get();

 		return view('web.index', ['feature_product_record' => $feature_product_record, 'most_popular_product_record' => $most_popular_product_record, 'best_seller_product_record' => $best_seller_product_record, 'new_product_record' => $new_product_record, 'all_brand' => $all_brand]);
    }

    public function subCategoryProductList($sub_category_id, $top_category_id)
    {
        try {
            $sub_category_id = decrypt($sub_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        return redirect()->route('web.product_list_view', ['sub_category_id' => encrypt($sub_category_id), 'top_category_id' => encrypt($top_category_id), 'size_id' => encrypt(00), 'sorted_by' => encrypt(1)]);
    }

    public function subCategorySizeProductList($sub_category_id, $top_category_id, $size_id)
    {
        try {
            $sub_category_id = decrypt($sub_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $size_id = decrypt($size_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        return redirect()->route('web.product_list_view', ['sub_category_id' => encrypt($sub_category_id), 'top_category_id' => encrypt($top_category_id), 'size_id' => encrypt($size_id), 'sorted_by' => encrypt(1)]);
    }

    public function subCategorySizeSortedByProductList(Request $request, $sub_category_id, $top_category_id, $size_id)
    {
        try {
            $sub_category_id = decrypt($sub_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $size_id = decrypt($size_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        return redirect()->route('web.product_list_view', ['sub_category_id' => encrypt($sub_category_id), 'top_category_id' => encrypt($top_category_id), 'size_id' => encrypt($size_id), 'sorted_by' => encrypt($request->input('sorted_by'))]);
    }

    public function productListView(Request $request, $sub_category_id, $top_category_id, $size_id, $sorted_by)
    {
        
        try {
            $sub_category_id = decrypt($sub_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $top_category_id = decrypt($top_category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $size_id = decrypt($size_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $sorted_by = decrypt($sorted_by);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $all_sub_category = DB::table('sub_category')
            ->where('top_category_id', $top_category_id)
            ->get();

        $data = [];
        foreach ($all_sub_category as $key => $item) {
            $count = DB::table('product')
                ->where('sub_category_id', $item->id)
                ->count();

            $data[] = [
                'id' => $item->id,
                'sub_cate_name' => $item->sub_cate_name,
                'total_products' => $count
            ];
        }

        $all_size = DB::table('size_mapping')
            ->leftJoin('size', 'size_mapping.size_id', '=', 'size.id')
            ->where('size_mapping.sub_category_id', $sub_category_id)
            ->select('size.*')
            ->get();

        $size_data = [];
        foreach ($all_size as $key => $item) {

            $size_data[] = [
                'id' => $item->id,
                'size' => $item->size
            ];
        }

        $recent_product_record = DB::table('product')
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();

        $product_record = DB::table('product');

        if ($size_id != 00) {
            $product_record = $product_record
                ->leftJoin('product_size_mapping', 'product.id', '=', 'product_size_mapping.product_id')
                ->where('product_size_mapping.size_id', $size_id);
        }

        $product_record = $product_record
            ->where('product.sub_category_id', $sub_category_id)
            ->where('product.status', 1);

        if ($sorted_by == 1){
            $product_record = $product_record
                ->orderBy('product.id', 'DESC');
        }
        if ($sorted_by == 2){
            $product_record = $product_record
                ->orderBy('product.price', 'ASC');
        }
        if ($sorted_by == 3){
            $product_record = $product_record
                ->orderBy('product.price', 'DESC');
        }

        /** Product Retriving **/
        $product_records = $product_record
            ->select('product.*')
            ->paginate(1);

        $product_record = [];
        foreach ($product_records as $key => $item){
            $star_sum = DB::table('review')
                ->select(DB::raw('SUM(star) AS star_sum'))
                ->where('product_id', $item->id)
                ->first();

            $total_review = DB::table('review')
                ->where('product_id', $item->id)
                ->count();

            if ($total_review > 0)
                $total_star = floor($star_sum->star_sum/$total_review);
            else
                $total_star = 0;

            $product_record [] = [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'price' => $item->price,
                'discount' => $item->discount,
                'star' => $total_star
            ];
        }

        if ($request->ajax()) {
            $view = view('web.product.product_data', compact('product_record'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('web.product.sub_category_product_list', ['all_sub_category' => $data, 'all_size' => $size_data, 'sub_category_id' => $sub_category_id, 'top_category_id' => $top_category_id, 'recent_product_record' => $recent_product_record, 'product_record' => $product_record, 'size_id' => $size_id, 'sorted_by' => $sorted_by]);
    }

    public function productDetail($product_id) 
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        /** Product Details **/
        $product_detail = DB::table('product')
            ->leftJoin('product_stock', 'product.id', '=', 'product_stock.product_id')
            ->leftJoin('theme', 'product.theme_id', '=', 'theme.id')
            ->where('product_stock.stock', '>', 0)
            ->where('product.id', $product_id)
            ->orderBy('product_stock.id', 'ASC')
            ->select('product.*', 'product_stock.size_id', 'product_stock.color_id', 'product_stock.id as stock_id', 'theme.theme')
            ->first();
            
        /** Top-Category and Sub-Category Detail **/
        $top_sub_category_detail = DB::table('sub_category')
            ->leftJoin('top_category', 'sub_category.top_category_id', '=', 'top_category.id')
            ->where('sub_category.id', $product_detail->sub_category_id)
            ->select('sub_category.*', 'top_category.top_cate_name')
            ->get();

        /** Sub-Category according to Top-Category **/
        $sub_categories = DB::table('sub_category')
            ->where('sub_category.top_category_id', $top_sub_category_detail[0]->top_category_id)
            ->get();

        $data = [];
        foreach ($sub_categories as $key => $item) {
            $count = DB::table('product')
                ->where('sub_category_id', $item->id)
                ->count();

            $data[] = [
                'id' => $item->id,
                'top_category_id' => $item->top_category_id,
                'sub_cate_name' => $item->sub_cate_name,
                'total_products' => $count
            ];
        }

        /** Product Slider Images **/
        $product_slider_images = DB::table('product_additional_images')
            ->where('product_id', $product_id)
            ->get();

        /** Product Sizes **/
        $product_sizes = DB::table('product_size_mapping')
            ->leftJoin('size', 'product_size_mapping.size_id', '=', 'size.id')
            ->where('product_size_mapping.product_id', $product_id)
            ->select('size.*')
            ->get();

        /** Product Colors **/
        $product_colors = DB::table('product_color_mapping')
            ->leftJoin('color', 'product_color_mapping.color_id', '=', 'color.id')
            ->where('product_color_mapping.product_id', $product_id)
            ->select('color.*')
            ->get();

        /** Recent Product **/
        $recent_product_record = DB::table('product')
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();

        /** Related Product **/
        $related_product_record = DB::table('product')
            ->where('sub_category_id', $product_detail->sub_category_id)
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->get();

        $related_record = [];
        foreach ($related_product_record as $key => $item){
            $star_sum = DB::table('review')
                ->select(DB::raw('SUM(star) AS star_sum'))
                ->where('product_id', $item->id)
                ->first();

            $total_review = DB::table('review')
                ->where('product_id', $item->id)
                ->count();

            if ($total_review > 0)
                $total_star = floor($star_sum->star_sum/$total_review);
            else
                $total_star = 0;

            $related_record [] = [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'price' => $item->price,
                'discount' => $item->discount,
                'star' => $total_star
            ];
        }

        /** Reviews **/
        $reviews = DB::table('review')
            ->leftJoin('users', 'review.user_id', '=', 'users.id')
            ->where('product_id', $product_id)
            ->where('status', 1)
            ->select('review.product_id', 'review.star', 'review.comment', 'users.name', 'review.created_at')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('web.product.product_detail', ['product_detail' => $product_detail, 'top_sub_category_detail' => $top_sub_category_detail, 'product_slider_images' => $product_slider_images, 'product_sizes' => $product_sizes, 'product_colors' => $product_colors, 'sub_categories' => $data, 'recent_product_record' => $recent_product_record, 'related_record' => $related_record, 'reviews' => $reviews]);
    }

    public function checkingProductStock(Request $request)
    {
        $stock = DB::table('product_stock')
            ->where('product_id', $request->input('product_id'))
            ->where('size_id', $request->input('product_sizes_id'))
            ->where('color_id', $request->input('product_colors_id'))
            ->first();

        $stock_id = encrypt($stock->id);

        if ($stock->stock == 0)
            print "Out of Stock,,$stock_id";
        else
            print "In Stock,<button type=\"submit\"><i class=\"fa fa-shopping-cart\"></i> add to cart</button>,$stock_id";
    }

    public function whatsNewProductSortList(Request $request)
    {
        $request->validate([
            'sort_by' => 'required'
        ]);
        $sort_by = $request->input('sort_by');

        return redirect()->route('web.whats_new', ['sort_by' => encrypt($sort_by)]);
    }

    public function whatsNewProductList(Request $request, $sort_by)
    {
        try {
            $sort_by = decrypt($sort_by);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        /** Product Retriving **/
        $product_records = DB::table('product');

        if ($sort_by == 1) {
            $product_records = $product_records
                ->orderBy('price', 'ASC');
        }

        if ($sort_by == 2) {
            $product_records = $product_records
                ->orderBy('price', 'DESC');
        }

        $product_records = $product_records
            ->orderBy('id', 'DESC')
            ->paginate(4);

        $product_record = [];
        foreach ($product_records as $key => $item){
            $star_sum = DB::table('review')
                ->select(DB::raw('SUM(star) AS star_sum'))
                ->where('product_id', $item->id)
                ->first();

            $total_review = DB::table('review')
                ->where('product_id', $item->id)
                ->count();

            if ($total_review > 0)
                $total_star = floor($star_sum->star_sum/$total_review);
            else
                $total_star = 0;

            $product_record [] = [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'price' => $item->price,
                'discount' => $item->discount,
                'star' => $total_star
            ];
        }

        if ($request->ajax()) {
            $view = view('web.whats_new.product_data', compact('product_record'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('web.whats_new.product_list', ['product_record' => $product_record, 'sort_by' => $sort_by]);
    }

    public function themeList()
    {
        $theme = DB::table('theme')
            ->where('status', 1)
            ->get();
        return view('web.theme.theme', ['theme' => $theme]);
    }

    public function themeProductList(Request $request, $theme_id, $sort_by)
    {
        try {
            $sort_by = decrypt($sort_by);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $theme_id = decrypt($theme_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        /** Theme **/
        $theme = DB::table('theme')
            ->where('id', $theme_id)
            ->first();

        /** Product Retriving **/
        $product_records = DB::table('product')
            ->where('theme_id', $theme_id);

        if ($sort_by == 1) {
            $product_records = $product_records
                ->orderBy('price', 'ASC');
        }

        if ($sort_by == 2) {
            $product_records = $product_records
                ->orderBy('price', 'DESC');
        }

        $product_records = $product_records
            ->orderBy('id', 'DESC')
            ->paginate(1);

        $product_record = [];
        foreach ($product_records as $key => $item){
            $star_sum = DB::table('review')
                ->select(DB::raw('SUM(star) AS star_sum'))
                ->where('product_id', $item->id)
                ->first();

            $total_review = DB::table('review')
                ->where('product_id', $item->id)
                ->count();

            if ($total_review > 0)
                $total_star = floor($star_sum->star_sum/$total_review);
            else
                $total_star = 0;

            $product_record [] = [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'price' => $item->price,
                'discount' => $item->discount,
                'star' => $total_star
            ];
        }

        if ($request->ajax()) {
            $view = view('web.theme.product_data', compact('product_record'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('web.theme.product_list', ['product_record' => $product_record, 'sort_by' => $sort_by, 'theme' => $theme]);
    }

    public function themeProductSortList(Request $request, $theme_id)
    {
        $request->validate([
            'sort_by' => 'required'
        ]);

        try {
            $theme_id = decrypt($theme_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $sort_by = $request->input('sort_by');

        return redirect()->route('web.theme_product', ['theme' => encrypt($theme_id), 'sort_by' => encrypt($sort_by)]);
    }

    public function brandProductList(Request $request, $brand_id, $sort_by)
    {
        try {
            $sort_by = decrypt($sort_by);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $brand_id = decrypt($brand_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        /** Brand **/
        $brand = DB::table('brand')
            ->where('id', $brand_id)
            ->first();

        /** Product Retriving **/
        $product_records = DB::table('product')
            ->where('brand_id', $brand_id);

        if ($sort_by == 1) {
            $product_records = $product_records
                ->orderBy('price', 'ASC');
        }

        if ($sort_by == 2) {
            $product_records = $product_records
                ->orderBy('price', 'DESC');
        }

        $product_records = $product_records
            ->orderBy('id', 'DESC')
            ->paginate(1);

        $product_record = [];
        foreach ($product_records as $key => $item){
            $star_sum = DB::table('review')
                ->select(DB::raw('SUM(star) AS star_sum'))
                ->where('product_id', $item->id)
                ->first();

            $total_review = DB::table('review')
                ->where('product_id', $item->id)
                ->count();

            if ($total_review > 0)
                $total_star = floor($star_sum->star_sum/$total_review);
            else
                $total_star = 0;

            $product_record [] = [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'price' => $item->price,
                'discount' => $item->discount,
                'star' => $total_star
            ];
        }

        if ($request->ajax()) {
            $view = view('web.brand.product_data', compact('product_record'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('web.brand.product_list', ['product_record' => $product_record, 'sort_by' => $sort_by, 'brand' => $brand]);
    }

    public function brandProductSortList(Request $request, $brand_id)
    {
        $request->validate([
            'sort_by' => 'required'
        ]);

        try {
            $brand_id = decrypt($brand_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $sort_by = $request->input('sort_by');

        return redirect()->route('web.brand_product', ['theme' => encrypt($theme_id), 'sort_by' => encrypt($sort_by)]);
    }
}
