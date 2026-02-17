<?php

namespace App\Http\Controllers;

use App\Models\tbl_product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function index()
    {
        $product = tbl_product::all();
        return view('website.pages.index', compact('product'));
    }
    function shop()
    {
        return view('website.pages.shop');
    }
    function shopingCard()
    {
        return view('website.pages.shoppingCard');
    }
    function shopDetails()
    {
        return view('website.pages.shopDetails');
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

}
