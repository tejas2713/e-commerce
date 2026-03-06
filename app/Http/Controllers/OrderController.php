<?php

namespace App\Http\Controllers;

use App\Models\tbl_order_child;
use App\Models\tbl_order_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    function index()
    {
        $order = DB::table('tbl_order_master')
            ->join('users', 'tbl_order_master.order_master_user_id', '=', 'users.id')
            ->select(
                'tbl_order_master.*',
                'users.name'
            )
            ->get();

        return view('admin.pages.order.index', compact('order'));
    }

    function remove(Request $request)
    {

        $orderMaster = tbl_order_master::find($request->orderMasterId);
        $orderChild = tbl_order_child::where('order_child_master_id', $request->orderMasterId)->get();
        foreach ($orderChild as $data) {
            $data->delete();
        }
        $orderMaster->delete();
        return redirect('/admin/order')->with("Delete", "Order Remove Successfully");
    }
    public function edit(Request $request)
    {


        $order = tbl_order_master::find($request->orderMasterId);
        $order->order_master_user_id = $request->userId;
        $order->order_master_total = $request->total_amount;
        $order->order_master_paymentmethod = $request->payment_method;
        $order->order_master_paymentstatus = $request->payment_status;
        $order->order_master_orderstatus = $request->order_status;
        $order->save();

        return redirect('/admin/order')->with("success", "Order Updated Successfully");
    }

    function viewOrder($id)
    {
        $ordermaster = DB::table('tbl_order_master')
            ->join('users', 'tbl_order_master.order_master_user_id', '=', 'users.id')
            ->where('tbl_order_master.order_master_id', $id)
            ->select(
                'tbl_order_master.*',
                'users.*'
            )
            ->first();

        $orderChild = DB::table('tbl_order_child')
            ->join('tbl_product', 'tbl_order_child.order_child_product_id', '=', 'tbl_product.product_id')
            ->where('tbl_order_child.order_child_master_id', $id)
            ->select(
                'tbl_order_child.*',
                'tbl_product.*'
            )
            ->get();

        return view('admin.pages.order.view', compact('orderChild', 'ordermaster'));
    }

}
