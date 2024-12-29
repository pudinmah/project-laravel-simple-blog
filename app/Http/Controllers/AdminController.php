<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create_artikel()
    {
        return view('admin.artikel.create_artikel');
    }


}
