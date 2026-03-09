<?php

namespace App\Http\Controllers;

use App\Models\tbl_cart;
use App\Models\tbl_category;
use App\Models\tbl_order_child;
use App\Models\tbl_order_master;
use App\Models\tbl_product;
use App\Models\tbl_shipping;
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
            $wishlistIds = tbl_wishlist::where('wishlist_user_id', Auth::id())
                ->pluck('wishlist_product_id')
                ->toArray();
            return view('website.pages.index', compact('product', 'wishlistIds'));
        }
    }
    function shop(Request $request)
    {

        $category = tbl_category::all();
        $subCategory = tbl_subcategory::all();
        $query = tbl_product::query();

        // Category filter
        if ($request->category_id) {
            $query->where('product_category_id', $request->category_id);
        }

        // SubCategory filter
        if ($request->subcategory_id) {
            $query->where('product_sub_category_id', $request->subcategory_id);
        }
        // Price filter
        if ($request->price) {

            if ($request->price == "0-55") {
                $query->whereBetween('product_sale', [0, 55]);
            }

            if ($request->price == "55-100") {
                $query->whereBetween('product_sale', [55, 100]);
            }

        }
        $product = $query->get();
        $wishlistIds = tbl_wishlist::where('wishlist_user_id', Auth::id())
            ->pluck('wishlist_product_id')
            ->toArray();
        return view('website.pages.shop', compact('product', 'category', 'subCategory', 'wishlistIds'));
    }
    function shopingCard()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
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
    function shopDetails($id)
    {

        $product = tbl_product::where('product_id', $id)->get();
        return view('website.pages.shopDetails', compact('product'));
    }
    function chackout()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $cart = DB::table('tbl_cart')
            ->join('tbl_product', 'tbl_cart.cart_product_id', '=', 'tbl_product.product_id')
            ->where('tbl_cart.cart_user_id', Auth::user()->id)
            ->select(
                'tbl_cart.*',
                'tbl_product.*'
            )
            ->get();
        return view('website.pages.chackout', compact('cart'));
    }

    function addToChackout(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return redirect('/chackout');
    }
    function placeOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        if ($request->streetAddress == "") {
            return redirect("/chackout")->with("error", "Street Address id required!");
        }
        if ($request->pinCode == "") {
            return redirect("/chackout")->with("error", "Pin Code is required!");
        }

        $orderMaster = new tbl_order_master();
        $orderMaster->order_master_user_id = $request->userId;
        $orderMaster->order_master_total = $request->totalAmount;
        $orderMaster->order_master_paymentstatus = "Pending";
        $orderMaster->order_master_paymentmethod = "cash on delivery ";
        $orderMaster->order_master_orderstatus = "Processing";
        $orderMaster->order_master_shipping_address = $request->streetAddress;
        $orderMaster->order_master_shipping_pincode = $request->pinCode;
        $orderMaster->order_master_receiver_name = $request->receiverName;
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
            $orderChild->order_child_cart_total = $item->cart_price * $item->cart_quantity;

            $orderChild->save();
        }

        $shipping = new tbl_shipping();
        $shipping->shipping_user_id = $request->userId;
        $shipping->shipping_address = $request->streetAddress;
        $shipping->shipping_pin_code = $request->pinCode;
        $shipping->shipping_receiver_name = $request->receiverName;
        $shipping->save();
        $cart = tbl_cart::where('cart_user_id', $request->userId)->get();
        foreach ($cart as $item) {
            $item->delete();
        }
        return redirect('/order ');
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
        if (!Auth::check()) {
            return redirect('/login');
        }
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
        if (!Auth::check()) {
            return redirect('/login');
        }
        $product = tbl_product::find($request->productId);
        $cart = new tbl_cart();
        $cart->cart_product_id = $request->productId;
        $cart->cart_user_id = $request->userId;
        $cart->cart_price = $product->product_sale;
        $cart->cart_quantity = $request->quantity;
        $cart->cart_total = $product->product_sale * $request->quantity;
        $cart->save();
        return redirect('/shoppingCard');
    }

    function updateToCart(Request $request)
    {
        $product = tbl_product::find($request->productId);
        $cart = tbl_cart::find($request->cartId);
        $cart->cart_product_id = $request->productId;
        $cart->cart_user_id = $request->userId;
        $cart->cart_price = $product->product_sale;
        $cart->cart_quantity = $request->quantity;
        $cart->cart_total = $product->product_sale * $request->quantity;
        $cart->save();
        return redirect('/shoppingCard');
    }

    function removeFromCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $cart = tbl_cart::find($request->cartId);
        $cart->delete();
        return redirect('/shoppingCard');
    }

    function wishlist()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $wishlist = DB::table('tbl_wishlist')
            ->join('tbl_product', 'tbl_wishlist.wishlist_product_id', '=', 'tbl_product.product_id')
            ->where('tbl_wishlist.wishlist_user_id', Auth::id())
            ->select(
                'tbl_wishlist.*',
                'tbl_product.*'
            )
            ->get();

        return view('website.pages.wishlist', compact('wishlist'));
    }

    function addToWishlist(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $userId = Auth::id();
        $productId = $request->productId;

        $exists = tbl_wishlist::where('wishlist_user_id', $userId)
            ->where('wishlist_product_id', $productId)
            ->exists();

        if ($exists) {
            return redirect('/wishlist')->with('error', 'Product already in wishlist');
        }
        if (!$exists) {
            tbl_wishlist::create([
                'wishlist_user_id' => $userId,
                'wishlist_product_id' => $productId,
            ]);
        }

        return redirect('/wishlist');
    }

    function removeFromWishlist(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $wishlist = tbl_wishlist::find($request->wishlistId);
        $wishlist->delete();
        return redirect('/wishlist');
    }

    function order()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $order = DB::table('tbl_order_master')->where('order_master_user_id', Auth::id())->get();

        return view('website.pages.order', compact('order'));
    }

    function viewOrder($id)
    {

        $orderDetails = DB::table('tbl_order_child')
            ->join('tbl_product', 'tbl_order_child.order_child_product_id', '=', 'tbl_product.product_id')
            ->where('tbl_order_child.order_child_master_id', $id)
            ->where('tbl_order_child.order_child_user_id', Auth::id())
            ->select(
                'tbl_order_child.*',
                'tbl_product.*'
            )
            ->get();

        return view('website.pages.orderDetails', compact('orderDetails'));
        return $id;
    }

}
