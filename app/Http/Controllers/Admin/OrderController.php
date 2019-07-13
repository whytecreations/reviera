<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function index()
    {
        if (!Gate::allows('order_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (!Gate::allows('order_delete')) {
                return abort(401);
            }
            $orders = Order::onlyTrashed()->orderBy('created_at', 'desc')->get();
        } else {
            $orders = Order::orderBy('created_at', 'desc')->get();
        }

        return view('admin.orders.index', compact('orders'));
    }

    public function getOrder($id)
    {
        $order = Order::with('orderDetails', 'customer', 'billing_address', 'shipping_address')->where('id', $id)->get();
        return response()->json([
            'data' => $order,
        ]);
    }

}
