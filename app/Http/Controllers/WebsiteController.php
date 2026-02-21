<?php

namespace App\Http\Controllers;

use App\Models\tbl_cart;
use App\Models\tbl_category;
use App\Models\tbl_order_child;
use App\Models\tbl_order_master;
use App\Models\tbl_product;
use App\Models\tbl_subcategory;
use App\Models\tbl_wishlist;
use App\Models\User;
use DB;
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
        $cart = DB::table('tbl_cart')
            ->join('tbl_product', 'tbl_cart.cart_product_id', '=', 'tbl_product.product_id')
            ->where('tbl_cart.cart_user_id', Auth::user()->id)
            ->select(
                'tbl_cart.*',
                'tbl_product.*'
            )
            ->get();

        return view('website.pages.shoppingCard', compact('cart'));
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

    function addToChackout(Request $request)
    {
        $orderMaster = new tbl_order_master();
        $orderMaster->order_master_user_id = $request->userId;
        $orderMaster->order_master_total = $request->total;
        $orderMaster->save();
        // Get all cart items of user
        $cartItems = tbl_cart::where('cart_user_id', $request->userId)->get();

        // Insert multiple order_child entries
        foreach ($cartItems as $item) {

            $orderChild = new tbl_order_child(); // create inside loop

            $orderChild->order_child_user_id = $request->userId;
            $orderChild->order_child_master_id = $orderMaster->order_master_id; // correct master id
            $orderChild->order_child_product_id = $item->cart_product_id;
            $orderChild->order_child_cart_price = $item->cart_price;
            $orderChild->order_child_cart_quantity = $item->cart_quantity;
            $orderChild->order_child_cart_total = $item->cart_total;

            $orderChild->save();
        }
        $cart = tbl_cart::where('cart_user_id', $request->userId)->get();
        foreach ($cart as $item) {
            $item->delete();
        }
        return redirect('/chackout');
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
        $user = auth()->user();
        return view('website.pages.editProfile', compact('user'));
    }

    function updateProfile(Request $request)
    {
        $request->validate([
            'userName' => 'required|string|max:255',
            'userEmail' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);
        $user = auth()->user();
        $user->name = $request->userName;
        $user->email = $request->userEmail;
        $user->save();
        return redirect('/')->with('success', 'Profile updated successfully.');
    }

    function addToCart(Request $request)
    {
        $cart = new tbl_cart();
        $cart->cart_product_id = $request->productId;
        $cart->cart_user_id = $request->userId;
        $cart->cart_price = "0";
        $cart->cart_quantity = "1";
        $cart->cart_total = "0";
        $cart->save();
        return redirect('/shoppingCard');
    }

    function removeFromCart(Request $request)
    {
        $cart = tbl_cart::find($request->cartId);
        $cart->delete();
        return redirect('/shoppingCard');
    }

    function wishlist()
    {
        $wishlist = tbl_wishlist::where('wishlist_user_id', Auth::user()->id)->get();
        return view('website.pages.wishlist', compact('wishlist'));
    }

    function addToWishlist(Request $request)
    {
        $wishlist = new tbl_wishlist();
        $wishlist->wishlist_product_id = $request->productId;
        $wishlist->wishlist_user_id = $request->userId;
        $wishlist->save();
        return redirect('/wishlist');
    }

}
