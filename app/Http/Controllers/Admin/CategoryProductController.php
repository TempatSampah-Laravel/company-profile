<?php

namespace App\Http\Controllers\Admin;

use App\Models\ConfigWeb;
use App\Models\CategoryProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryProductController extends Controller
{
    public function index()
    {
        $title_page = 'Category Product';
        $config = ConfigWeb::all()->first();
        $categoryProduct = CategoryProduct::latest()->get();

        return view('admin.category.index', compact('title_page', 'config', 'categoryProduct'));
    }

    public function create()
    {
        $title_page = 'Create Category Product';
        $config = ConfigWeb::all()->first();

        return view('admin.category.create', compact('title_page', 'config'));
    }

    public function store(CategoryRequest $request)
    {
        $request->validated();

        CategoryProduct::create([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
        ]);

        return redirect()->route('category-product.index')->with(['success' => 'Category Product Create Successfully']);
    }

    public function edit(CategoryProduct $categoryProduct)
    {
        $title_page = 'Edit Category Product';
        $config = ConfigWeb::all()->first();

        // dd($categoryProduct);

        return view('admin.category.edit', compact('title_page', 'config', 'categoryProduct'));
    }

    public function update (CategoryRequest $request, CategoryProduct $categoryProduct)
    {
        $request->validated();

        $categoryProduct->update([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
        ]);

        return redirect()->route('category-product.index')->with(['success' => 'Category Product Update Successfully']);
    }

    public function destroy(CategoryProduct $categoryProduct)
    {
        $categoryProduct->delete();

        return redirect()->back()->with(['success' => 'Category Product Delete Successfully']);
    }
}
