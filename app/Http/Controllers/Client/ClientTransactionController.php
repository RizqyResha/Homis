<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Midtrans\Transaction;

class ClientTransactionController extends Controller
{
    public function index(Request $request)
    {
        $admin_fee = 2;
        $total = $request->total_price;
        $sub_total = $total + ($total * ($admin_fee / 100));
        // check if authentication first
        if (!Auth::guard('client')->check()) {
            return view('client.login.index');
        }
        //
        return view('client.transaction.index', ['data' => $request, 'sub_total' => $sub_total, 'admin_fee' => $admin_fee]);
        // return dd($request);
    }

    public function pay(Request $request)
    {
        $transaction_id = \App\Models\Transaction::insertGetId([
            'id_svc' => $request->id_svc,
            'id_client' => $request->id_client,
            'period_type' => $request->period_type,
            'transaction_date' => Carbon::now(),
            'status' => 'Unpaid',
            'price_total' => $request->sub_total,
        ]);

        \App\Models\Transaction::create([
            'id_svc' => $request->id_svc,
            'id_client' => $request->id_client,
            'period_type' => $request->period_type,
            'period_qty' => $request->contract_qyt,
            'transaction_date' => Carbon::now(),
            'status' => 'Unpaid',
            'price_total' => $request->sub_total,
        ]);

        $cus = Client::select('first_name', 'last_name', 'phone_no')
            ->where('id_client', $request->id_client)->first();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction_id,
                'gross_amount' => round($request->sub_total),
            ),

            'customer_details' => array(
                'name' => $cus->first_name . ' ' . $cus->last_name,
                'phone' => $cus->phone_no
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // return dd($snapToken);
        return view('client.transaction.payment', ['data' => $request], compact('snapToken'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $transaction = \App\Models\Transaction::where('tbl_transaction.id_transaction', $request->order_id);
                $transaction->update(['status' => 'Paid']);
            }
        }
    }
}