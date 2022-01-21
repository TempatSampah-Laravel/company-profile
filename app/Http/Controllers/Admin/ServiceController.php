<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\ConfigWeb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $title_page = 'Service';
        $config = ConfigWeb::all()->first();
        $service = Service::latest()->get();

        return view('admin.service.index', compact('title_page', 'config', 'service'));
    }

    public function create()
    {
        $title_page = 'Service Create';
        $config = ConfigWeb::all()->first();

        return view('admin.service.create', compact('title_page', 'config'));
    }

    public function store(ServiceRequest $request)
    {
        $request->validated();

        Service::create([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'icon' => $request->icon,
        ]);

        return redirect()->route('service.index')->with(['success' => 'Service Created Successfully']);
    }

    public function edit(Service $service)
    {
        $title_page = 'Service Edit';
        $config = ConfigWeb::all()->first();

        return view('admin.service.edit', compact('title_page', 'config', 'service'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $request->validated();

        $service->update([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'icon' => $request->icon,
        ]);

        return redirect()->back()->with(['success' => 'Service Update Successfully']);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->back()->with(['success' => 'Service Delete Successfully']);
    }

}
