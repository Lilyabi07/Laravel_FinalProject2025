<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

  public function index(Request $request)
{
    $query = \App\Models\Product::query();

    if ($search = $request->input('search')) {
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
    }

    $products = $query->get();

    return view('products.index', compact('products'));
}

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name'           => 'required',
            'category'       => 'required',
            'description'    => 'required',
            'price'          => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'image'          => 'nullable|image|max:2048',
        ]);

        if ($r->hasFile('image')) {
            $data['image'] = $r->file('image')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function show(Product $product)
{
 
    $galleryImages = [$product->image]; 

    return view('products.show', compact('product', 'galleryImages'));
}

    public function update(Request $r, Product $product)
    {
        $data = $r->validate([
            'name'           => 'required',
            'category'       => 'required',
            'description'    => 'required',
            'price'          => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'image'          => 'nullable|image|max:2048',
        ]);

        if ($r->hasFile('image')) {
            $data['image'] = $r->file('image')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
