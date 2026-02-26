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
    function viewOrder($id)
    {
        $ordermaster =  DB::table('tbl_order_master')
            ->join('users', 'tbl_order_master.order_master_user_id', '=', 'users.id')
            ->select(
                'tbl_order_master.*',
                'users.name'
            )
            ->get();

        $orderChild = DB::table('tbl_order_child')
            ->join('tbl_product', 'tbl_order_child.order_child_product_id', '=', 'tbl_product.product_id')
            ->where('tbl_order_child.order_child_master_id', $id)
            ->select(
                'tbl_order_child.*',
                'tbl_product.*'
            )
            ->get();

        return view('admin.pages.order.view', compact('orderChild','ordermaster'));
    }


}
