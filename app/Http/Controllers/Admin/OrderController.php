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

    public function show($id)
    {
        if (!Gate::allows('order_view')) {
            return abort(401);
        }
        $order = Order::findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    public function updateOrderStatus(Order $order, Request $request)
    {
        $order->status = $request->status;
        $order->save();
        return back();
    }

    public function getOrder($id)
    {
        $order = Order::with('orderDetails', 'customer', 'billing_address', 'shipping_address')->where('id', $id)->get();
        return response()->json([
            'data' => $order,
        ]);
    }

}
