<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\ConfigWeb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $title_page = 'Message';
        $config = ConfigWeb::all()->first();
        $message = Message::latest()->get();

        return view('admin.message.index', compact('title_page', 'config', 'message'));
    }

    public function show($slug)
    {
        $title_page = 'Detail Message';
        $config = ConfigWeb::all()->first();
        $message = Message::where('slug', $slug)->firstOrFail();

        return view('admin.message.detail', compact('title_page', 'config', 'message'));
    }
}
