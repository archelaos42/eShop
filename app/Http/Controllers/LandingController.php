<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        /**
         * Displays the landing page with featured categories.
         */
        $categories = \App\Models\Category::all();
        return Inertia::render('Dashboard', compact('categories'));
    }
}
