<?php

namespace App\Http\Controllers\Admin;

use App\Models\ConfigWeb;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CertificateRequestCreate;
use App\Http\Requests\CertificateRequestUpdate;

class CertificateController extends Controller
{
    public function index()
    {
        $title_page = 'Certificate';
        $config = ConfigWeb::all()->first();
        $certificate = Certificate::all();

        return view('admin.certificate.index', compact('title_page','config','certificate'));
    }

    public function create()
    {
        $title_page = 'Create Certificate';
        $config = ConfigWeb::all()->first();

        return view('admin.certificate.create', compact('title_page','config'));
    }

    public function store(CertificateRequestCreate $request)
    {
        $request->validated();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $certificate['image'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/certificate');
            $img->move($filePath, $certificate['image']);
        }

        Certificate::Create([
            'name' => $request->name,
            'image' => $certificate['image'],
        ]);

        return redirect()->route('certificate.index')->with(['success' => 'certificate Created Successfully']);
    }

    public function edit(Certificate $certificate)
    {
        $title_page = 'Edit Certificate';
        $config = ConfigWeb::all()->first();

        return view('admin.certificate.edit', compact('title_page', 'config', 'certificate'));
    }

    public function update(CertificateRequestUpdate $request, Certificate $certificate)
    {
        $request->validated();

        if ($request->hasFile('image')) {
            $old_image = public_path('upload/certificate/'.$certificate->image); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old

            $img = $request->file('image');
            $certificate['image'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/certificate');
            $img->move($filePath, $certificate['image']);
        } else {
            $img = $certificate->image;
        }

        $certificate->update([
            'name' => $request->name,
            'image' => $certificate['image']
        ]);

        return redirect()->back()->with(['success' => 'Certificate Update Successfully']);
    }

    public function destroy(Certificate $certificate)
    {
        $old_image = public_path('upload/certificate/'.$certificate->image); 
        if(File::exists($old_image)) {
            File::delete($old_image);
        } //Delete image old
        $certificate->delete();

        return redirect()->back()->with(['success' => 'Certificate Delete Successfully']);
    }
}
