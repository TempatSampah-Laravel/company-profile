<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\ConfigWeb;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $title_page = 'Banner';
        $config = ConfigWeb::all()->first();
        $banner = Banner::all()->first();

        return view('admin.banner.index', compact('title_page','config','banner'));
    }

    public function update (BannerRequest $request, Banner $banner)
    {
        $request->validated();

        if ($request->hasFile('image')) {

            $old_image = public_path('upload/banner/'.$banner->image); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old

            $img = $request->file('image');
            $banner['image'] = time().'-'. $img->getClientOriginalName();
            $filePath = public_path('/upload/banner');
            $img->move($filePath, $banner['image']);
            
        } else {
            $img = $banner->image;
        }

        $banner->update([
            'title_id' => $request->title_id,
            'title_en' => $request->title_en,
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'image' => $banner['image'],
        ]);

        return redirect()->route('banner.index')->with(['success' => 'Banner Update Successfully']);

        
    }
}
