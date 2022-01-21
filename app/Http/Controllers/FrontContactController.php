<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\ConfigWeb;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class FrontContactController extends Controller
{
    public function index(){
        $title_page = 'Contact Us';   
        $config = ConfigWeb::all()->first();

        return view('frontend.contact.index', compact('title_page', 'config'));
    }

    public function sendMessage (ContactRequest $request)
    {
        $request->validated();

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'slug' =>Str::slug($request->subject),
        ]);

        return redirect()->back()->with(['success' => 'Send Message Successfully']);
    }
}
