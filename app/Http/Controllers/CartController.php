<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function show()
    {
        $products = Product::all();
        $cartContent = \Cart::getContent();
        return Inertia::render('Cart', compact('products', 'cartContent'));
//        dd($cartContent);
    }

    public function removeItem($id)
    {
        \Cart::remove($id);

        if (\Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function clearCart()
    {
        \Cart::clear();

        return redirect('/');
    }

}
