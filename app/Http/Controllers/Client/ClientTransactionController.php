<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\DetailTransaction;
use App\Models\Servicer;
use App\Models\TransactionHistory;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Midtrans\Transaction;
use Route;

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
            'status' => 'Pending',
            'price_total' => $request->sub_total,
        ]);

        \App\Models\DetailTransaction::create([
            'id_transaction' => $transaction_id,
            'period_' => $request->id_client,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'period_qty' => 1,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('client.transaction.pending')->with('Success', 'Your Contract Request already Sent Pls Wait con');
        // $cus = Client::select('first_name', 'last_name', 'phone_no')
        //     ->where('id_client', $request->id_client)->first();
        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => $transaction_id,
        //         'gross_amount' => round($request->sub_total),
        //     ),

        //     'customer_details' => array(
        //         'name' => $cus->first_name . ' ' . $cus->last_name,
        //         'phone' => $cus->phone_no
        //     )
        // );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);
        // // return dd($snapToken);
        // return view('client.transaction.payment', [
        //     'data' => $request,
        //     'sub_total' => $request->sub_total,
        //     'admin_fee' => $request->admin_fee
        // ], compact('snapToken'));
    }

    public function payFromlist($row)
    {
        $transaction = \App\Models\Transaction::select(
            'tbl_transaction.id_client',
            'tbl_transaction.id_transaction',
            'tbl_transaction.price_total AS period_price',
            DB::raw("CONCAT(tbl_servicer.first_name,' ',tbl_servicer.last_name) AS servicer_name"),
            DB::raw("(SELECT tbl_svc_category.svc_category_name FROM tbl_svc_category WHERE tbl_svc_category.id_svc_category = tbl_svc.id_svc_category) AS svc_category_name"),
        )
            ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
            ->where('id_transaction', $row)
            ->first();
        // return dd($transaction);
        $cus = Client::select('first_name', 'last_name', 'phone_no')
            ->where('tbl_client.id_client', '=', $transaction->id_client)->first();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $admin_fee = 2;
        $total = $transaction->period_price;
        $sub_total = $total + ($total * ($admin_fee / 100));
        // return dd($sub_total);
        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->id_transaction,
                'gross_amount' => round($sub_total),
            ),

            'customer_details' => array(
                'name' => $cus->first_name . ' ' . $cus->last_name,
                'phone' => $cus->phone_no
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // return dd($snapToken);
        return view('client.transaction.payment', [
            'data' => $transaction,
            'sub_total' => $sub_total,
            'admin_fee' => $admin_fee
        ], compact('snapToken'));
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

    public function afterpay()
    {
        return redirect()->route('client.transaction.paid')->with('Success', 'You Already Paid, Please wait The Servicer come to You');
    }

    public function transactionlist()
    {
        if (Route::is('client.transaction')) {
            $data = DetailTransaction::select('users.id AS userid', 'tbl_servicer.first_name', 'tbl_servicer.last_name', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
                ->join('users', 'users.user_id', 'tbl_servicer.id_servicer')
                ->where('users.user_type', 'servicer')
                ->where('tbl_transaction.id_client', Auth::guard('client')->user()->id_client)
                ->orderBy('tbl_transaction.id_transaction','DESC')
                ->paginate(5);
            return view('client.account.transaction.index', ['data' => $data]);

        } elseif (Route::is('client.transaction.paid')) {
            $data = DetailTransaction::select('users.id AS userid', 'tbl_servicer.first_name', 'tbl_servicer.last_name', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
                ->join('users', 'users.user_id', 'tbl_servicer.id_servicer')
                ->where('users.user_type', 'servicer')
                ->where('tbl_transaction.id_client', Auth::guard('client')->user()->id_client)
                ->where('tbl_transaction.status', 'Paid')
                ->orderBy('tbl_transaction.id_transaction','DESC')
                ->paginate(5);
            return view('client.account.transaction.index', ['data' => $data]);

        } elseif (Route::is('client.transaction.pending')) {
            $data = DetailTransaction::select('users.id AS userid', 'tbl_servicer.first_name', 'tbl_servicer.last_name', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
                ->join('users', 'users.user_id', 'tbl_servicer.id_servicer')
                ->where('users.user_type', 'servicer')
                ->where('tbl_transaction.id_client', Auth::guard('client')->user()->id_client)
                ->where('tbl_transaction.status', 'Pending')
                ->orderBy('tbl_transaction.id_transaction','DESC')
                ->paginate(5);
            return view('client.account.transaction.index', ['data' => $data]);

        } elseif (Route::is('client.transaction.process')) {
            $data = DetailTransaction::select('users.id AS userid', 'tbl_servicer.first_name', 'tbl_servicer.last_name', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
                ->join('users', 'users.user_id', 'tbl_servicer.id_servicer')
                ->where('users.user_type', 'servicer')
                ->where('tbl_transaction.id_client', Auth::guard('client')->user()->id_client)
                ->where('tbl_transaction.status', 'Process')
                ->orderBy('tbl_transaction.id_transaction','DESC')
                ->paginate(5);
            return view('client.account.transaction.index', ['data' => $data]);

        } elseif (Route::is('client.transaction.process')) {
            $data = DetailTransaction::select('user.id AS userid', 'tbl_servicer.first_name', 'tbl_servicer.last_name', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
                ->join('users', 'users.user_id', 'tbl_servicer.id_servicer')
                ->where('users.user_type', 'servicer')
                ->where('tbl_transaction.id_client', Auth::guard('client')->user()->id_client)
                ->where('tbl_transaction.status', 'Reject')
                ->orderBy('tbl_transaction.id_transaction','DESC')
                ->paginate(5);
            return view('client.account.transaction.index', ['data' => $data]);

        } elseif (Route::is('client.transaction.accepted')) {
            $data = DetailTransaction::select('users.id AS userid', 'tbl_servicer.first_name', 'tbl_servicer.last_name', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
                ->join('users', 'users.user_id', 'tbl_servicer.id_servicer')
                ->where('users.user_type', 'servicer')
                ->where('tbl_transaction.id_client', Auth::guard('client')->user()->id_client)
                ->where('tbl_transaction.status', 'Accepted(Unpaid)')
                ->orderBy('tbl_transaction.id_transaction','DESC')
                ->paginate(5);
            return view('client.account.transaction.index', ['data' => $data]);

        } elseif (Route::is('client.transaction.finished')) {
            $data = DetailTransaction::select('users.id AS userid', 'tbl_servicer.first_name', 'tbl_servicer.last_name', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
                ->join('users', 'users.user_id', 'tbl_servicer.id_servicer')
                ->where('users.user_type', 'servicer')
                ->where('tbl_transaction.id_client', Auth::guard('client')->user()->id_client)
                ->where('tbl_transaction.status', 'Finished')
                ->orderBy('tbl_transaction.id_transaction','DESC')
                ->paginate(5);
            return view('client.account.transaction.index', ['data' => $data]);

        } elseif (Route::is('client.transaction.rejected')) {
            $data = DetailTransaction::select('users.id AS userid', 'tbl_servicer.first_name', 'tbl_servicer.last_name', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
                ->join('users', 'users.user_id', 'tbl_servicer.id_servicer')
                ->where('users.user_type', 'servicer')
                ->where('tbl_transaction.id_client', Auth::guard('client')->user()->id_client)
                ->where('tbl_transaction.status', 'Rejected')
                ->orderBy('tbl_transaction.id_transaction','DESC')
                ->paginate(5);
            return view('client.account.transaction.index', ['data' => $data]);
        } elseif (Route::is('client.transaction.canceled')) {
            $data = DetailTransaction::select('users.id AS userid', 'tbl_servicer.first_name', 'tbl_servicer.last_name', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'tbl_svc.id_servicer')
                ->join('users', 'users.user_id', 'tbl_servicer.id_servicer')
                ->where('users.user_type', 'servicer')
                ->where('tbl_transaction.id_client', Auth::guard('client')->user()->id_client)
                ->where('tbl_transaction.status', 'Canceled')
                ->orderBy('tbl_transaction.id_transaction','DESC')
                ->paginate(5);
            return view('client.account.transaction.index', ['data' => $data]);
        }
    }

    public function UpdateStatusToCancel(Request $request, $id_transaction)
    {
        \App\Models\Transaction::where('id_transaction', $id_transaction)
            ->update(['status' => 'Canceled']);
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Transaction Status already changed!']);
        }
    }


    public function UpdateStatusToProcess(Request $request, $id_transaction)
    {

        $pricetotal = \App\Models\Transaction::select('price_total')->where('id_transaction', $id_transaction)->pluck('price_total')->first();

        $id_servicer = Servicer::select('tbl_servicer.id_servicer', 'tbl_servicer.balance')
            ->join('tbl_svc', 'tbl_svc.id_servicer', 'tbl_servicer.id_servicer')
            ->join('tbl_transaction', 'tbl_transaction.id_svc', 'tbl_svc.id_svc')
            ->where('tbl_transaction.id_transaction', $id_transaction)->first();
        $half_balance = ($pricetotal / 2);

        TransactionHistory::create([
            'id_transaction' => $id_transaction,
            'transaction_amount' => $half_balance,
            'transaction_date' => now(),
            'transaction_type' => 'DP'
        ]);
        \App\Models\Transaction::where('id_transaction', $id_transaction)
            ->update(['status' => 'Process']);

        Servicer::where('id_servicer', $id_servicer->id_servicer)->update(['tbl_servicer.balance' => $half_balance]);
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Transaction Status already changed!']);
        }
    }

    public function UpdateStatusToFinish(Request $request, $id_transaction)
    {
        $transaction = \App\Models\Transaction::where('id_transaction', $id_transaction)->first();
        if ($transaction->confirm_servicer == 1) {
            $balance = \App\Models\Transaction::select('price_total')->where('id_transaction', $id_transaction)->pluck('price_total')->first();

            $id_servicer = Servicer::select('tbl_servicer.id_servicer', 'tbl_servicer.balance')
                ->join('tbl_svc', 'tbl_svc.id_servicer', 'tbl_servicer.id_servicer')
                ->join('tbl_transaction', 'tbl_transaction.id_svc', 'tbl_svc.id_svc')
                ->where('tbl_transaction.id_transaction', $id_transaction)->first();
            $half_balance = ($balance / 2) + $id_servicer->balance;
            TransactionHistory::create([
                'id_transaction' => $id_transaction,
                'transaction_amount' => $half_balance,
                'transaction_date' => now(),
                'transaction_type' => 'Full'
            ]);
            Servicer::where('id_servicer', $id_servicer->id_servicer)->update(['tbl_servicer.balance' => $half_balance]);
            \App\Models\Transaction::where('id_transaction', $id_transaction)
                ->update([
                    'status' => 'Finished',
                    'transaction_finish_date' => now()
                ]);
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Transaction already Finished!']);
            }
        } else {
            \App\Models\Transaction::where('id_transaction', $id_transaction)
                ->update(['confirm_client' => 1]);
            if ($request->ajax()) {
                return response()->json(['info' => true, 'message' => 'Wait Finish Confirmation From Servicer']);
            }
        }
    }

}