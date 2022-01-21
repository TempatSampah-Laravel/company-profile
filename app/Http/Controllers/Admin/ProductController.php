<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ConfigWeb;
use Illuminate\Support\Str;
use App\Models\CategoryProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $title_page = 'Product';
        $config = ConfigWeb::all()->first();
        $product = Product::latest()->get();

        return view('admin.product.index', compact('title_page', 'config', 'product'));
    }

    public function create()
    {
        $title_page = 'Create Product';
        $config = ConfigWeb::all()->first();
        $product = Product::all();
        $category = CategoryProduct::All();

        return view('admin.product.create', compact('title_page', 'config', 'product', 'category'));
    }

    public function store(CreateProductRequest $request)
    {
        $request->validated();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $product['image'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/product');
            $img->move($filePath, $product['image']);
        }

        Product::Create([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'slug' =>Str::slug($request->name_en),
            'category_id' => $request->category_id,
            'image' => $product['image'],
        ]);

        return redirect()->route('product.index')->with(['success' => 'Product Created Successfully']);
    }

    public function edit(Product $product)
    {
        $title_page = 'Edit Product';
        $config = ConfigWeb::all()->first();
        $category = CategoryProduct::All();

        return view('admin.product.edit', compact('title_page', 'config', 'product', 'category'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {   
        $request->validated();

        if ($request->hasFile('image')) {

            $old_image = public_path('upload/product/'.$product->image); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old

            $img = $request->file('image');
            $product['image'] = time().'-'. $img->getClientOriginalName();

            $filePath = public_path('/upload/product');
            $img->move($filePath, $product['image']);
            
        } else {
            $img = $product->image;
        }

        $product->update([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'slug' =>Str::slug($request->name_en),
            'category_id' => $request->category_id,
            'image' => $product['image']
        ]);

        // dd($product);

        return redirect()->back()->with(['success' => 'Product Update Successfully']);
    }

    public function destroy(Product $product)
    {
        $old_image = public_path('upload/product/'.$product->image); 
            if(File::exists($old_image)) {
                File::delete($old_image);
            } //Delete image old
        $product->delete();

        return redirect()->back()->with(['success' => 'Product Delete Successfully']);
    }
}
