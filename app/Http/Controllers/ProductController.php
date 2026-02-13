<?php

namespace App\Http\Controllers;

use App\Models\tbl_product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index()
    {
        $product = tbl_product::all();
        return view('admin.pages.product.index',compact("product"));
    }
    function store(Request $request)
    {
        $product = new tbl_product();
        $product->product_name = $request->productName;
        $product->product_hsn = $request->hsn;
        $product->product_weight = $request->productWeight;
        $product->product_category_id = $request->category;
        $product->product_sub_category_id = $request->subCategory;
        $product->product_tax = $request->tax;
        $product->product_unit = $request->unit;
        $product->product_bar_code = $request->barcode;
        $product->product_qr_code = $request->qrcode;
        $product->product_unieqe_code = $request->unique_code;
        $product->product_mrp = $request->mrp;
        $product->product_sale = $request->sale_price;
        $product->product_purchase = $request->purchase_price;
        $product->product_wholsale = $request->wholesale_price;
        $product->product_distributer = $request->distributor_price;
        $product->product_op_qty = $request->opening_qty;
        $product->product_op_value = $request->opening_value;
        $product->save();
        return redirect("/admin/product");
    }

       public function remove(Request $request)
    {

        $product = tbl_product::find($request->product_id);
        $product->delete();
        return redirect('/admin/product');
    }
}
