<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TransactionSuccess;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        // set config midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // instance midtrans notification
        $notification = new Notification();

        // pecah order id
        $order = explode('-', $notification->order_id);

        // assign ke variable untuk memudahkan
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $order[1];

        // cari transaksi berdasarkan id 
        $transcation  = Transaction::findOrFail($order_id);

        // handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transcation->transaction_status = 'CHALLENGE';
                } else {
                    $transcation->transaction_status = 'SUCCESS';
                }
            }
        } else if ($status === 'settlement') {
            $transcation->transaction_status = 'SUCCESS';
        } else if ($status === 'pending') {
            $transcation->transaction_status = 'PENDING';
        } else if ($status === 'deny') {
            $transcation->transaction_status = 'FAILED';
        } else if ($status === 'expire') {
            $transcation->transaction_status = 'EXPIRED';
        } else if ($status === 'cancel') {
            $transcation->transaction_status = 'FAILED';
        }

        // Simpan transaksi
        $transcation->save();

        // Kirimkan email
        if ($transcation) {
            if ($status == 'capture' && $fraud == 'accept') {

                Mail::to($transcation->user)->send(
                    new TransactionSuccess($transcation)
                );
            } else if ($status == 'settlement') {

                Mail::to($transcation->user)->send(
                    new TransactionSuccess($transcation)
                );
            } else if ($status == 'success') {

                Mail::to($transcation->user)->send(
                    new TransactionSuccess($transcation)
                );
            } else if ($status == 'capture' && $fraud == 'challenge') {

                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans notification success'
                ]
            ]);
        }
    }

    public function finishRedirect(Request $request)
    {
        return view('pages.success');
    }

    public function unFinishRedirect(Request $request)
    {
        return view('pages.unfinish');
    }

    public function errorRedirect(Request $request)
    {
        return view('pages.failed');
    }
}
