<?php

namespace App\Http\Controllers\Admin\Color;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ColorController extends Controller
{
    public function showColorForm() 
    {
        return view('admin.color.new_color');
    }

    public function addColor(Request $request) 
    {
        $request->validate([
            'color' => 'required',
        ]);

        DB::table('color')
	        ->insert([ 
	          	'color' => $request->input('color'), 
	        ]);

        return redirect()->back()->with('msg', 'Color has been added successfully');
    }

    public function allColor () 
    {
        $all_color = DB::table('color')->get();
        return view('admin.color.all_color', ['data' => $all_color]);
    }

    public function showEditColorForm($colorId) 
    {
        try {
            $colorId = decrypt($colorId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $color_record = DB::table('color')
            ->where('id', $colorId)
            ->get();

        return view('admin.color.edit_color', ['data' => $color_record]);
    }

    public function updateColor(Request $request, $colorId) 
    {
        $request->validate([
            'color' => 'required',
        ]);

        try {
            $colorId = decrypt($colorId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('color')
            ->where('id', $colorId)
            ->update([ 
                'color' => $request->input('color')
            ]);

        return redirect()->route('admin.edit_color', ['colorId' => encrypt($colorId)])->with('msg', 'Color has been updated successfully');
    }

    public function showMappingColorForm() 
    {
        $all_top_category = DB::table('top_category')->get();

        $all_color = DB::table('color')->get();

        $all_mapping_color = DB::table('color_mapping')
        	->leftJoin('color', 'color_mapping.color_id', '=', 'color.id')
            ->leftJoin('top_category', 'color_mapping.top_category_id', '=', 'top_category.id')
        	->leftJoin('sub_category', 'color_mapping.sub_category_id', '=', 'sub_category.id')
        	->select('color_mapping.*', 'color.color', 'sub_category.sub_cate_name', 'top_category.top_cate_name')
        	->get();

        return view('admin.color.new_mapping_color', ['all_top_category' => $all_top_category, 'all_color' => $all_color, 'all_mapping_color' => $all_mapping_color]);
    }

    public function addMappingColor(Request $request) 
    {
        $request->validate([
            'top_cate_id' => 'required',
            'sub_cate_id' => 'required',
            'color' => 'required'
        ]);

        $cnt = DB::table('color_mapping')
            ->where('top_category_id', $request->input('top_cate_id'))
	        ->where('sub_category_id', $request->input('sub_cate_id'))
	        ->where('color_id', $request->input('color'))
	        ->count();

	    if ($cnt > 0)
        	return redirect()->back()->with('msg', 'Color already added');
        else {
        	DB::table('color_mapping')
	            ->insert([ 
                    'top_category_id' => $request->input('top_cate_id'), 
	            	'sub_category_id' => $request->input('sub_cate_id'), 
	            	'color_id' => $request->input('color'), 
	            ]);

        	return redirect()->back()->with('msg', 'Color has been added successfully');
        }
    }

    public function showEditMappingColorForm($color_mapping_id) 
    {
        try {
            $color_mapping_id = decrypt($color_mapping_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $mapping_color_record = DB::table('color_mapping')
            ->where('id', $color_mapping_id)
            ->get();
        $sub_category_record = DB::table('sub_category')
            ->where('id', $mapping_color_record[0]->sub_category_id)
            ->get();
        $top_category_record = DB::table('top_category')
            ->where('id', $mapping_color_record[0]->top_category_id)
            ->get();
        $all_color = DB::table('color')->get();

        return view('admin.color.edit_mapping_color', ['top_category_record' => $top_category_record, 'sub_category_record' => $sub_category_record, 'all_color' => $all_color, 'mapping_color_record' => $mapping_color_record]);
    }

    public function updateMappingColor(Request $request, $color_mapping_id)
    {
        try {
            $color_mapping_id = decrypt($color_mapping_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $color_mapping_record = DB::table('color_mapping')
            ->where('id', $color_mapping_id)
            ->get();

        $cnt = DB::table('color_mapping')
            ->where('top_category_id', $color_mapping_record[0]->top_category_id)
            ->where('sub_category_id', $color_mapping_record[0]->sub_category_id)
            ->where('color_id', $request->input('color'))
            ->count();

        if ($cnt > 0)
            return redirect()->back()->with('msg', 'Mapping has been already done');
        else {
            DB::table('color_mapping')
            ->where('id', $color_mapping_id)
            ->update([
                'color_id' => $request->input('color')
            ]);

            return redirect()->back()->with('msg', 'Mapping has been updated');
        }
    }
}
