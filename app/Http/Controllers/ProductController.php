<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $cartCount = \Cart::getContent()->count();
        $product = Product::query()->where('id', $id)->get();
        $images = Image::query()->where('product_id', $id)->get();
        $attributes = Attribute::query()->where('product_id', $id)->get();
        return Inertia::render('Product', compact('product', 'attributes', 'images', 'cartCount'));
//        dd($attributes);
    }

    public function findProductById(int $id)
    {
        try {
            return Product::findOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    public function addToCart(Request $request)
    {
        $product = $this->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        \Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

}
