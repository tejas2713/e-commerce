<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\tbl_product;
use App\Models\tbl_subcategory;
use App\Models\tbl_tax;
use App\Models\tbl_unit;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index()
    {
        $product = tbl_product::all();
        $product = DB::table('tbl_product')
            ->join('tbl_category', 'tbl_product.product_category_id', '=', 'tbl_category.category_id')
            ->join('tbl_subcategory', 'tbl_product.product_sub_category_id', '=', 'tbl_subcategory.sub_category_id')
            ->join('tbl_tax', 'tbl_product.product_tax', '=', 'tbl_tax.tax_id')
            ->join('tbl_unit', 'tbl_product.product_unit', '=', 'tbl_unit.unit_id')
            ->select(
                'tbl_product.*',
                'tbl_category.category_name',
                'tbl_subcategory.sub_category_name',
                'tbl_tax.tax_name',
                'tbl_unit.unit_name'
            )
            ->get();
        $category = tbl_category::all();
        $subcategory = tbl_subcategory::all();
        $tax = tbl_tax::all();
        $unit = tbl_unit::all();

        return view('admin.pages.product.index', compact("product", "category", "subcategory", "tax", "unit"));
    }
    function store(Request $request)
    {
        $product = new tbl_product();
        $path = public_path('uplode/product');
        $productimage = $request->file('productImage');
        $productImageName = "";
        if ($productimage) {
            $productImageName = time() . "_" . $productimage->getClientOriginalName();
            $productimage->move($path, $productImageName);
        }
        $product->product_name = $request->productName;
        $product->product_hsn = $request->hsn;
        $product->product_weight = $request->productWeight;
        $product->product_category_id = $request->categoryId;
        $product->product_sub_category_id = $request->subCategoryId;
        $product->product_tax = $request->tax;
        $product->product_unit = $request->unitId;
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
        $product->product_image = $productImageName;
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
