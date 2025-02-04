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
}
