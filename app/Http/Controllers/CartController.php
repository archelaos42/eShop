<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    /**
     * Shows the cart's content.
     */
    public function show()
    {
        $cartContent = \Cart::getContent();
        return Inertia::render('Cart', compact('cartContent'));
//        dd($cartContent);
    }
    /**
     * Remove an item from the cart.
     */
    public function removeItem($id)
    {
        \Cart::remove($id);

        if (\Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }
    /**
     * Removes all item from the cart.
     */
    public function clearCart()
    {
        \Cart::clear();

        return redirect('/');
    }

}
