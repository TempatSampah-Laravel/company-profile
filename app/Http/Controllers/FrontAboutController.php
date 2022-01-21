<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ConfigWeb;
use Illuminate\Http\Request;

class FrontAboutController extends Controller
{
     public function index(){        
        $title_page = 'About Us';        
        $config = ConfigWeb::all()->first();
        $about = About::all()->first();

        return view('frontend.about.index', compact('title_page','config','about'));
        
    }
}
