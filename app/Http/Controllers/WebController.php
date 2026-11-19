<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index() {
        $categories = Category::with('events')
            ->get();

        return view('index', [
            'categories' => $categories
        ]);
    }

    public function pageNotFound() {
        return view('404');
    }

    public function pageForbidden() {
        return view('403');
    }
}
