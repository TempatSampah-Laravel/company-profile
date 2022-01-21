<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ConfigWeb;
use Illuminate\Http\Request;

class FrontCatalogController extends Controller
{
    public function index()
    {
        $title_page = 'Catalog';
        $config = ConfigWeb::all()->first();
        $catalog = Catalog::all();

        return view('frontend.catalog.index', compact('title_page', 'config', 'catalog'));
    }
}
