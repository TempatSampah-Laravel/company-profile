<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Models\ConfigWeb;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {
        $title_page = 'About';
        $config = ConfigWeb::all()->first();
        $about = About::all()->first();

        return view('admin.about.index', compact('title_page','config','about'));
    }

    public function update (AboutRequest $request, About $about)
    {
        $request->validated();

        if ($request->hasFile('image')) {

            $old_image = public_path('upload/about/'.$about->image); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old

            $img = $request->file('image');
            $about['image'] = time().'-'. $img->getClientOriginalName();
            $filePath = public_path('/upload/about');
            $img->move($filePath, $about['image']);
            
        } else {
            $img = $about->image;
        }

        $about->update([
            'title_id' => $request->title_id,
            'title_en' => $request->title_en,
            'content_id' => $request->content_id,
            'content_en' => $request->content_en,
            'vision_en' => $request->vision_en,
            'vision_id' => $request->vision_id,
            'mission_en' => $request->mission_en,
            'mission_id' => $request->mission_id,
            'image' => $about['image'],
        ]);

        return redirect()->route('about.index')->with(['success' => 'About Update Successfully']);

        
    }
}
