<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    /**
     * Unfinished
     */
    public function getCheckout()
    {
//        $products = Product::all();
//        $cartContent = \Cart::getContent();
        return Inertia::render('Checkout');
    }
    /**
     * Unfinished.
     */
    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
//        $order = $this->orderRepository->storeOrderDetails($request->all());

//        dd($order);
    }
}
