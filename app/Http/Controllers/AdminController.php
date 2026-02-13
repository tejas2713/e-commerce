<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashbord()
    {
        return view('admin.pages.index');
    }

  
}
