<?php

namespace App\Http\Controllers\Admin;

use App\Models\ConfigWeb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ConfigWebRequest;

class ConfigWebController extends Controller
{
    public function index()
    {
        $title_page = 'Website Setting';
        $config = ConfigWeb::all()->first();

        return view('admin.config.index', compact('title_page', 'config'));
    }

    public function update(ConfigWebRequest $request, ConfigWeb $config)
    {
        $request->validated();

        if ($request->hasFile('logo')) {
            $old_image = public_path('upload/config/'.$config->logo); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old

            $img = $request->file('logo');
            $config['logo'] = time().'-logo-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/config');
            $img->move($filePath, $config['logo']);
        } else {
            $img = $config->logo;
        }

        if ($request->hasFile('icon')) {
            $old_image = public_path('upload/config/'.$config->icon); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old

            $img = $request->file('icon');
            $config['icon'] = time().'-icon-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/config');
            $img->move($filePath, $config['icon']);
        } else {
            $img = $config->icon;
        }

        // if ($request->hasFile('hero')) {
        //     $old_image = public_path('upload/config/'.$config->hero); 
        //     if(File::exists($old_image)) {
        //         File::delete($old_image);
        //     } //Delete image old

        //     $img = $request->file('hero');
        //     $config['hero'] = time().'-hero-'. $img->getClientOriginalName();

        //     $filePath = public_path('/upload/config');
        //     $img->move($filePath, $config['hero']);
        // } else {
        //     $img = $config->hero;
        // }

        $config->update([
            'nameweb' => $request->nameweb,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'google_maps' => $request->google_maps,
            'logo' => $config['logo'],
            'icon' => $config['icon'],
            // 'hero' => $config['hero']
        ]);

        return redirect()->back()->with(['success' => 'Configuration Update Successfully']);
    }
}
