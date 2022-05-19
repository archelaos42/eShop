<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();
        return Inertia::render('Dashboard', compact('categories'));
    }
}
