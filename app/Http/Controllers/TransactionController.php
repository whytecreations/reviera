<?php

namespace App\Http\Controllers;

use App\Mail\OrderFailed;
use App\Mail\OrderPlaced;
use App\Order;
use App\Transaction;
use Cart;
use Illuminate\Http\Request;
use Mail;
use stdClass;

class TransactionController extends Controller
{
    public function onPaymentResponse(Request $request)
    {
        $response = $request->all();
        $orderId = $response['vpc_MerchTxnRef'];
        $order = Order::find($orderId);
        if ($response['vpc_TxnResponseCode'] == "0") {
            $txn = Transaction::create(
                [
                    'order_id' => $orderId,
                    'transaction_request' => json_encode([]),
                    'transaction_response' => json_encode($response),
                    'status' => 'Success',
                ]);

            $data = new stdClass();
            $data->title = 'Payment Successful';
            $data->type = 'success';
            $data->message = $response['vpc_Message'];
            $data->description = 'Transaction Reference Number is ' . $txn->created_at->format("Ymd") . $txn->id;
            Cart::clear();
            $this->sendOrderConfirmationMail($order);
            return view('frontend.statusMessage', compact('data'));
        } else if (in_array($response['vpc_TxnResponseCode'], ['1', '2', '3', '4', '5'])) {
            $txn = Transaction::create(
                [
                    'order_id' => $orderId,
                    'transaction_request' => json_encode([]),
                    'transaction_response' => json_encode($response),
                    'status' => 'Declined',
                ]);

            $data = new stdClass();
            $data->title = 'Payment Declined!';
            $data->type = 'danger';
            $data->message = $response['vpc_Message'];
            $data->description = 'Transaction Reference Number is ' . $txn->created_at->format("Ymd") . $txn->id;
            $this->sendOrderFailedMail($order);
            return view('frontend.statusMessage', compact('data'));
        } else {
            $txn = Transaction::create(
                [
                    'order_id' => $orderId,
                    'transaction_request' => json_encode([]),
                    'transaction_response' => json_encode($response),
                    'status' => 'Failed',
                ]);

            $data = new stdClass();
            $data->title = 'Payment Failed!';
            $data->type = 'danger';
            $data->message = $response['vpc_Message'];
            $data->description = 'Transaction Reference Number is ' . $txn->created_at->format("Ymd") . $txn->id;
            $this->sendOrderFailedMail($order);
            return view('frontend.statusMessage', compact('data'));
        }
    }

    public function sendOrderConfirmationMail(Order $order)
    {
        Mail::to($order->customer->email)
            ->to(OrderPlaced::getAdminEmail())
            ->send(new OrderPlaced($order));

        if (count(Mail::failures()) > 0) {
            return response()->json(["status" => "failed"]);

        } else {
            return response()->json(["status" => "success"]);
        }
    }

    public function sendOrderFailedMail(Order $order)
    {
        Mail::to($order->customer->email)
            ->to(OrderFailed::getAdminEmail())
            ->send(new OrderFailed($order));

        if (count(Mail::failures()) > 0) {
            return response()->json(["status" => "failed"]);

        } else {
            return response()->json(["status" => "success"]);
        }
    }

}
