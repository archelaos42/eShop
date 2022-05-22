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
//    /**
//     * Test page.
//     */
//    public function index()
//    {
//        $products = Product::all();
//        $categories = Category::all();
//        $subcategories = Subcategory::all();
//        $attributes = Attribute::all();
//        return Inertia::render('Products', compact('products', 'categories', 'subcategories', 'attributes'));
////        dd($products);
//    }

    /**
     * Displays a single product page.
     */
    public function show($id)
    {
        $cartCount = \Cart::getContent()->count();
        $product = Product::query()->where('id', $id)->get();
        $images = Image::query()->where('product_id', $id)->get();
        $attributes = Attribute::query()->where('product_id', $id)->get();
        return Inertia::render('Product', compact('product', 'attributes', 'images', 'cartCount'));
//        dd($attributes);
    }

    /**
     * Via a post request, adds the provided product to the cart.
     * (Should be moved to the cart controller. Validation on the vendor package does not work properly and has been disabled.
     * Also requires a tweak that would check if the product is already in the cart when adding another instance.)
     */
    public function addToCart(Request $request)
    {
        $product = $this->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        \Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
//
        return redirect()->back()->with('message', 'Item added to cart successfully.');



//        $extantId = $request->input('productId');
//        $product = $this->findProductById($request->input('productId'));
//        if(\Cart == []) {
//
//            $options = $request->except('_token', 'productId', 'price', 'qty');
//
//            \Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
//
//            return redirect()->back()->with('message', 'Item added to cart successfully.');
//        }
//        else {
//            foreach (\Cart as $product_item) {
//                if ($product->id == $extantId) {
//                    $product_item["quantity"] += 1;
//                }
//            }
//        }

    }

    /**
     * Finds a single product based on the provided ID. Used by the add to cart function.
     */
    public function findProductById(int $id)
    {
        try {
            return Product::findOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }


}
