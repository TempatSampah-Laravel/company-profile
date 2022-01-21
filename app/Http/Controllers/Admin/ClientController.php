<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\ConfigWeb;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ClientRequestCreate;
use App\Http\Requests\ClientRequestUpdate;

class ClientController extends Controller
{
    public function index()
    {
        $title_page = 'Client';
        $config = ConfigWeb::all()->first();
        $client = Client::latest()->get();

        return view('admin.client.index', compact('title_page', 'config', 'client'));
    }

    public function create()
    {
        $title_page = 'Create Client';
        $config = ConfigWeb::all()->first();

        return view('admin.client.create', compact('title_page', 'config'));
    }

    public function store(ClientRequestCreate $request)
    {
        $request->validated();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $client['image'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/client');
            $img->move($filePath, $client['image']);
        }

        Client::Create([
            'name' => $request->name,
            'image' => $client['image'],
        ]);

        return redirect()->route('client.index')->with(['success' => 'Client Created Successfully']);
    }

    public function edit(Client $client)
    {
        $title_page = 'Edit Client';
        $config = ConfigWeb::all()->first();

        return view('admin.client.edit', compact('title_page', 'config', 'client'));
    }

    public function update(ClientRequestUpdate $request, Client $client)
    {
        $request->validated();

        if ($request->hasFile('image')) {
            $old_image = public_path('upload/client/'.$client->image); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old

            $img = $request->file('image');
            $client['image'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/client');
            $img->move($filePath, $client['image']);
        } else {
            $img = $client->image;
        }

        $client->update([
            'name' => $request->name,
            'image' => $client['image']
        ]);

        return redirect()->back()->with(['success' => 'Client Update Successfully']);

    }

    public function destroy(Client $client)
    {
        $old_image = public_path('upload/client/'.$client->image); 
        if(File::exists($old_image)) {
            File::delete($old_image);
        } //Delete image old
        $client->delete();

        return redirect()->back()->with(['success' => 'Client Delete Successfully']);
    }
}
