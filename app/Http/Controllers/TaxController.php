<?php

namespace App\Http\Controllers;

use App\Models\tbl_tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    //
    function index()
    {
        $tax = tbl_tax::all();
        return view('admin.pages.tax.index', compact("tax"));
    }
    function store(Request $request)
    {
        $tax = new tbl_tax();
        $tax->tax_name = $request->taxName;
        $tax->tax_per = $request->taxPer;
        $tax->save();
        return redirect("/admin/tax");
    }
    public function remove(Request $request)
    {

        $tax = tbl_tax::find($request->tax_id);
        $tax->delete();
        return redirect('/admin/tax');
    }
    public function edit(Request $request)
    {

        $tax = tbl_tax::find($request->tax_id);
        $tax->tax_name = $request->taxName;
        $tax->tax_per = $request->taxPer;

        $tax->save();
        return redirect('/admin/tax');
    }

}
