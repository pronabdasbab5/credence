<?php

namespace App\Http\Controllers\Admin\Theme;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
use File;

class ThemeController extends Controller
{
    public function showThemeForm() 
    {
        return view('admin.theme.new_theme');
    }

    public function addTheme(Request $request) 
    {
        $this->validate($request, [
            'theme'  => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $file   = time().'.'.$banner->getClientOriginalExtension();
         
            $destinationPath = public_path('/assets/theme');
            $img = Image::make($banner->getRealPath());
            $img->resize(350, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$file);

            DB::table('theme')
	            ->insert([ 
	            	'theme' => $request->input('theme'), 
	            	'banner' => $file, 
	            ]);

            return redirect()->back()->with('msg', 'Theme has been added successfully');
        } else 
        	return redirect()->back()->with('msg', 'Please ! select a banner');
    }

    public function allTheme() 
    {
        $all_theme = DB::table('theme')->get();
        return view('admin.theme.all_theme', ['data' => $all_theme]);
    }

    public function showEditThemeForm($theme_id) 
    {
        try {
            $theme_id = decrypt($theme_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $theme_record = DB::table('theme')
            ->where('id', $theme_id)
            ->get();

        return view('admin.theme.edit_theme', ['data' => $theme_record]);
    }

    public function updateTheme(Request $request, $theme_id) 
    {
        $this->validate($request, [
            'theme' => 'required',
            'banner'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $theme_id = decrypt($theme_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $old_file_name = DB::table('theme')
            ->where('id', $theme_id)
            ->get();

        DB::table('theme')
            ->where('id', $theme_id)
            ->update([ 
                'theme' => $request->input('theme'),
            ]);

        if ($request->hasFile('banner')) {
            File::delete(public_path('assets/theme/'.$old_file_name[0]->banner));

            $banner = $request->file('banner');
            $file   = time().'.'.$banner->getClientOriginalExtension();
         
            $destinationPath = public_path('/assets/theme');
            $img = Image::make($banner->getRealPath());
            $img->resize(350, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$file);

            DB::table('theme')
                ->where('id', $theme_id)
                ->update([ 'banner' => $file ]);
        }

        return redirect()->back()->with('msg', 'Theme has been updated successfully');
    }
}
