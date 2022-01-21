<?php

namespace App\Http\Controllers\Admin;

use App\Models\ConfigWeb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $title_page = 'Dashboard';
        $config = ConfigWeb::all()->first();
        
        return view('admin.dashboard.index', compact('title_page', 'config'));
    }
}
