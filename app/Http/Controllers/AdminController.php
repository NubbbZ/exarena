<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index ()
    {
        return view('pages.admin.dashboard', [
            
        ]);
    }

    public function users ()
    {
        return view('pages.admin.users', [
            
        ]);
    }

    public function product_series ()
    {
        return view('pages.admin.product_series', [
            
        ]);
    }

    public function products ()
    {
        return view('pages.admin.products', [
            
        ]);
    }
}
