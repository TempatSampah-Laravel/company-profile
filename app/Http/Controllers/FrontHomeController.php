<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Service;
use App\Models\ConfigWeb;
use App\Models\Certificate;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index(){

        $title_page = 'Home';
        $config = ConfigWeb::all()->first();
        $about = About::all()->first();
        $banner = Banner::all()->first();
        $client = Client::all();
        $certificate = Certificate::all();     
        $service = Service::all();   


        return view('frontend.home.index', compact('title_page','config','about', 'banner', 'client', 'certificate', 'service'));
    }
}
