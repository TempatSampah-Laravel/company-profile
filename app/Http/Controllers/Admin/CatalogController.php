<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalog;
use App\Models\ConfigWeb;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\CatalogRequestCreate;
use App\Http\Requests\CatalogRequestUpdate;

class CatalogController extends Controller
{
    public function index()
    {
        $title_page = 'Catalog';
        $config = ConfigWeb::all()->first();
        $catalog = Catalog::all();

        return view('admin.catalog.index', compact('title_page','config','catalog'));
    }

    public function create()
    {
        $title_page = 'Create Catalog';
        $config = ConfigWeb::all()->first();

        return view('admin.catalog.create', compact('title_page','config'));
    }

    public function store(CatalogRequestCreate $request)
    {
        $request->validated();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $catalog['image'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/catalog');
            $img->move($filePath, $catalog['image']);
        }

        if ($request->hasFile('pdf')) {
            $img = $request->file('pdf');
            $catalog['pdf'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/catalog');
            $img->move($filePath, $catalog['pdf']);
        }

        Catalog::Create([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'image' => $catalog['image'],
            'pdf' => $catalog['pdf']
        ]);

        return redirect()->route('catalog.index')->with(['success' => 'Catalog Created Successfully']);
    }

    public function edit(Catalog $catalog)
    {
        $title_page = 'Edit Catalog';
        $config = ConfigWeb::all()->first();

        return view('admin.catalog.edit', compact('title_page', 'config', 'catalog'));
    }

    public function update(CatalogRequestUpdate $request, Catalog $catalog)
    {
        $request->validated();

        if ($request->hasFile('image')) {

            $old_image = public_path('upload/catalog/'.$catalog->image); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old

            $img = $request->file('image');
            $catalog['image'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/catalog');
            $img->move($filePath, $catalog['image']);
            
        } else {
            $img = $catalog->image;
        }

        if ($request->hasFile('pdf')) {

            $old_pdf = public_path('upload/catalog/'.$catalog->pdf); 
            if(File::exists($old_pdf)) {
                File::delete($old_pdf);
            } //Delete pdf old

            $img = $request->file('pdf');
            $catalog['pdf'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/catalog');
            $img->move($filePath, $catalog['pdf']);
            
        } else {
            $img = $catalog->pdf;
        }

        $catalog->update([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'image' => $catalog['image'],
            'pdf' => $catalog['pdf']
        ]);

        return redirect()->back()->with(['success' => 'Catalog Update Successfully']);
    }

    public function destroy(Catalog $catalog)
    {
        $old_image = public_path('upload/catalog/'.$catalog->image); 
        if(File::exists($old_image)) {
            File::delete($old_image);
        } //Delete image old

        $old_pdf = public_path('upload/catalog/'.$catalog->pdf); 
        if(File::exists($old_pdf)) {
            File::delete($old_pdf);
        } //Delete pdf old

        $catalog->delete();

        return redirect()->back()->with(['success' => 'Catalog Delete Successfully']);
    }
}
