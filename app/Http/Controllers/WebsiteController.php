<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\tbl_product;
use App\Models\tbl_subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    function index()
    {
        if (Auth::user() && Auth::user()->user_type == "1") {

            return view('admin.pages.index');
        } else {
            $product = tbl_product::all();
            return view('website.pages.index', compact('product'));
        }
    }
    function shop()
    {
        $product = tbl_product::all();
        $category = tbl_category::all();
        $subCategory = tbl_subcategory::all();
        return view('website.pages.shop', compact('product', 'category', 'subCategory'));
    }
    function shopingCard()
    {
        return view('website.pages.shoppingCard');
    }
    function shopDetails()
    {
        $product = tbl_product::all();
        return view('website.pages.shopDetails', compact('product'));
    }
    function chackout()
    {
        return view('website.pages.chackout');
    }
    function about()
    {
        return view('website.pages.about');
    }
    function contact()
    {
        return view('website.pages.contact');
    }
    function blog()
    {
        return view('website.pages.blog');
    }
    function blogDetails()
    {
        return view('website.pages.blogDetails');
    }

    function editProfile(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->userName;
        $user->email = $request->userEmail;
        $user->save();
        return redirect('/');
    }


}
