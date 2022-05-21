<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $attributes = Attribute::all();
        return Inertia::render('Products', compact('products', 'categories', 'subcategories', 'attributes'));
//        dd($products);
    }

    public function show($id)
    {
        $product = Product::query()->where('id', $id)->firstOrFail();
        $images = Image::query()->where('product_id', $id)->get();
        $attributes = Attribute::query()->where('product_id', $id)->get();
        return Inertia::render('Product', compact('product', 'attributes', 'images'));
//        dd($attributes);
    }

}
