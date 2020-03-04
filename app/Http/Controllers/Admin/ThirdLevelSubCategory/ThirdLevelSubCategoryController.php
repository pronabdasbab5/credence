<?php

namespace App\Http\Controllers\Admin\ThirdLevelSubCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Str;

class ThirdLevelSubCategoryController extends Controller
{
    public function showThirdLevelSubCategoryForm () 
    {
    	$all_top_category = DB::table('sub_category')
    		->leftJoin('top_category', 'sub_category.top_category_id', '=', 'top_category.id')
    		->select('top_category.*')
    		->distinct()
    		->get();

        return view('admin.third_level_sub_category.new_sub_category', ['data' => $all_top_category]);
    }

    public function addThirdLevelSubCategory(Request $request) 
    {
        $this->validate($request, [
            'top_cate_name' => 'required',
            'sub_cate_name' => 'required',
            'third_level_sub_cate_name' => 'required',
            'slug' => 'required',
        ]);

        $count  = DB::table('third_level_sub_category')
            ->where('sub_category', $request->input('sub_cate_name'))
            ->where('top_category', $request->input('top_cate_name'))
            ->where('third_level_sub_category_name', ucwords(strtolower($request->input('third_level_sub_cate_name'))))
            ->count();

        if ($count > 0) 
            $msg = 'Sub-Category already added';
        else {
            DB::table('third_level_sub_category')
                ->insert([ 
                    'top_category' => $request->input('top_cate_name'), 
                    'sub_category' => $request->input('sub_cate_name'), 
                    'third_level_sub_category_name' => $request->input('third_level_sub_cate_name'), 
                    'slug' => strtolower(Str::slug($request->input('slug'), '-')),  
                ]);

            $msg = 'Sub-Category has been added successfully';
        }

        return redirect()->back()->with('msg', $msg);
    }

    public function allThirdLevelSubCategory () 
    {
        $all_sub_category = DB::table('third_level_sub_category')
            ->leftJoin('sub_category', 'third_level_sub_category.sub_category', '=', 'sub_category.id')
            ->leftJoin('top_category', 'third_level_sub_category.top_category', '=', 'top_category.id')
            ->select('third_level_sub_category.*', 'top_category.top_cate_name', 'sub_category.sub_cate_name')
            ->distinct()
            ->get();

        return view('admin.third_level_sub_category.all_sub_category', ['data' => $all_sub_category]);
    }

    public function showEditThirdLevelSubCategoryForm($subCategoryId) 
    {
        try {
            $subCategoryId = decrypt($subCategoryId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $third_level_sub_category_record = DB::table('third_level_sub_category')
            ->where('id', $subCategoryId)
            ->first();

        $sub_category_record = DB::table('sub_category')
        	->where('top_category_id', $third_level_sub_category_record->top_category)
        	->get();

        $all_top_category = DB::table('sub_category')
    		->leftJoin('top_category', 'sub_category.top_category_id', '=', 'top_category.id')
    		->select('top_category.*')
    		->distinct()
    		->get();

        return view('admin.third_level_sub_category.edit_sub_category', ['sub_categories' => $sub_category_record, 'top_categories' => $all_top_category, 'third_level_sub_category' => $third_level_sub_category_record]);
    }

    public function updateThirdLevelSubCategory(Request $request, $subCategoryId) 
    {
        $this->validate($request, [
            'top_cate_name' => 'required',
            'sub_cate_name' => 'required',
            'third_level_sub_cate_name' => 'required',
            'slug' => 'required',
        ]);

        try {
            $subCategoryId = decrypt($subCategoryId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $count  = DB::table('third_level_sub_category')
            ->where('sub_category', $request->input('sub_cate_name'))
            ->where('top_category', $request->input('top_cate_name'))
            ->where('third_level_sub_category_name', ucwords(strtolower($request->input('third_level_sub_cate_name'))))
            ->count();

        if ($count > 0) 
            $msg = 'Sub-Category has been updated successfully';
        else {
            DB::table('third_level_sub_category')
            	->where('id', $subCategoryId)
                ->update([ 
                    'top_category' => $request->input('top_cate_name'), 
                    'sub_category' => $request->input('sub_cate_name'), 
                    'third_level_sub_category_name' => $request->input('third_level_sub_cate_name'), 
                    'slug' => strtolower(Str::slug($request->input('slug'), '-')), 
                ]);

            $msg = 'Sub-Category has been updated successfully';
        }

        return redirect()->back()->with('msg', $msg);
    }
}
