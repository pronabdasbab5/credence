<?php

namespace App\Http\Controllers\Admin\Size;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SizeController extends Controller
{
    public function showSizeForm() 
    {
        return view('admin.size.new_size');
    }

    public function addSize(Request $request) 
    {
        $request->validate([
            'size' => 'required',
        ]);

        DB::table('size')
	        ->insert([ 
	          	'size' => $request->input('size'), 
	        ]);

        return redirect()->back()->with('msg', 'Size has been added successfully');
    }

    public function allSize () 
    {
        $all_size = DB::table('size')->get();
        return view('admin.size.all_size', ['data' => $all_size]);
    }

    public function showEditSizeForm($sizeId) 
    {
        try {
            $sizeId = decrypt($sizeId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $size_record = DB::table('size')
            ->where('id', $sizeId)
            ->get();

        return view('admin.size.edit_size', ['data' => $size_record]);
    }

    public function updateSize(Request $request, $sizeId) 
    {
        $request->validate([
            'size' => 'required',
        ]);

        try {
            $sizeId = decrypt($sizeId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('size')
            ->where('id', $sizeId)
            ->update([ 
                'size' => $request->input('size')
            ]);

        return redirect()->route('admin.edit_size', ['sizeId' => encrypt($sizeId)])->with('msg', 'Size has been updated successfully');
    }

    public function showMappingSizeForm() 
    {
        $all_top_category = DB::table('top_category')->get();

        $all_size = DB::table('size')->get();

        $all_mapping_size = DB::table('size_mapping')
        	->leftJoin('size', 'size_mapping.size_id', '=', 'size.id')
            ->leftJoin('top_category', 'size_mapping.top_category_id', '=', 'top_category.id')
        	->leftJoin('sub_category', 'size_mapping.sub_category_id', '=', 'sub_category.id')
        	->select('size_mapping.*', 'size.size', 'sub_category.sub_cate_name', 'top_category.top_cate_name')
            ->distinct()
        	->get();

        return view('admin.size.new_mapping_size', ['all_top_category' => $all_top_category, 'all_size' => $all_size, 'all_mapping_size' => $all_mapping_size]);
    }

    public function addMappingSize(Request $request) 
    {
        $request->validate([
            'top_cate_id' => 'required',
            'sub_cate_id' => 'required',
            'size' => 'required'
        ]);

        $cnt = DB::table('size_mapping')
            ->where('top_category_id', $request->input('top_cate_id'))
	        ->where('sub_category_id', $request->input('sub_cate_id'))
	        ->where('size_id', $request->input('size'))
	        ->count();

	    if ($cnt > 0)
        	return redirect()->back()->with('msg', 'Size already added');
        else {
        	DB::table('size_mapping')
	            ->insert([ 
                    'top_category_id' => $request->input('top_cate_id'), 
	            	'sub_category_id' => $request->input('sub_cate_id'), 
	            	'size_id' => $request->input('size'), 
	            ]);

        	return redirect()->back()->with('msg', 'Size Mapping has been added successfully');
        }
    }

    public function showEditMappingSizeForm($size_mapping_id) 
    {
        try {
            $size_mapping_id = decrypt($size_mapping_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $mapping_size_record = DB::table('size_mapping')
            ->where('id', $size_mapping_id)
            ->get();
        $sub_category_record = DB::table('sub_category')
            ->where('id', $mapping_size_record[0]->sub_category_id)
            ->get();
        $top_category_record = DB::table('top_category')
            ->where('id', $mapping_size_record[0]->top_category_id)
            ->get();
        $all_size = DB::table('size')->get();

        return view('admin.size.edit_mapping_size', ['top_category_record' => $top_category_record, 'sub_category_record' => $sub_category_record, 'all_size' => $all_size, 'mapping_size_record' => $mapping_size_record]);
    }

    public function updateMappingSize(Request $request, $size_mapping_id)
    {
        try {
            $size_mapping_id = decrypt($size_mapping_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $size_mapping_record = DB::table('size_mapping')
            ->where('id', $size_mapping_id)
            ->get();

        $cnt = DB::table('size_mapping')
            ->where('top_category_id', $size_mapping_record[0]->top_category_id)
            ->where('sub_category_id', $size_mapping_record[0]->sub_category_id)
            ->where('size_id', $request->input('size'))
            ->count();

        if ($cnt > 0)
            return redirect()->back()->with('msg', 'Mapping has been already done');
        else {
            DB::table('size_mapping')
            ->where('id', $size_mapping_id)
            ->update([
                'size_id' => $request->input('size')
            ]);

            return redirect()->back()->with('msg', 'Mapping has been updated');
        }
    }
}
