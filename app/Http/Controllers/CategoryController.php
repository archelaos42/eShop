<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Displays all products from the chosen category.
     */
    public function show($id)
    {
        $products = Product::query()->where('category_id', $id)->get();
        $category = Category::query()->where('id', $id)->FirstOrFail();
        $subcategories = Subcategory::query()->where('category_id', $id)->get();
        return Inertia::render('Products', compact('products', 'category', 'subcategories',));
//        dd($products);
    }
}
