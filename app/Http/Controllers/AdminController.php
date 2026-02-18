<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function dashbord()
    {

        if (Auth::user() || Auth::user()->user_type == "1") {

            return view('admin.pages.index');
        } else {
            return redirect("/");
        }
    }


}
