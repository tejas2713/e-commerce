<?php

namespace App\Http\Controllers;

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
            'users.name as user_name'
        )
        ->get();

    return view('admin.pages.order.index', compact('order'));
}

}
