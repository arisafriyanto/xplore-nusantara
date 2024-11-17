<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

        $usernames = $item->details->pluck('username')->toArray();
        $users = User::whereIn('username', $usernames)->get();

        $item->details = $item->details->transform(function ($detail) use ($users) {
            $detail->user = $users->firstWhere('username', $detail->username);
            return $detail;
        });

        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_package_id' => $id,
            'user_id' => Auth::user()->id,
            'pajak' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->username,
        ]);

        return redirect()->route('checkout.index', $transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'travel_package'])
            ->findOrFail($item->transaction_id);

        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout.index', $item->transaction_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => ['required', 'string', 'exists:users,username'],
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        $transaction->transaction_total += $transaction->travel_package->price;
        $transaction->save();

        return redirect()->route('checkout.index', $id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details', 'travel_package.galleries', 'user'])
            ->findOrFail($id);
        $transaction->transaction_status = "PENDING";
        $transaction->save();

        // Send E-Ticket to email
        // return $transaction;

        // Mail::to($transaction->user)
        //     ->send(new TransactionSuccess($transaction));
        // return view('pages.success');

        // set config midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // buat array untuk dikirim ke midtrans

        $midtrans_params = array(
            'transaction_details' => array(
                'order_id' => 'TEST-' . $transaction->id . '-' . rand(),
                'gross_amount' => (int) $transaction->transaction_total,
            ),
            'customer_details' => array(
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ),
            'enabled_payments' => ['gopay'],
            'vtweb' => []
        );

        // dd($midtrans_params);

        try {
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            // Redirect to Snap Payment Page
            // header('Location: ' . $paymentUrl);
            return redirect()->away($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
            // return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
