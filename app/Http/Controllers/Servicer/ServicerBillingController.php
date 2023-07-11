<?php

namespace App\Http\Controllers\Servicer;

use App\Http\Controllers\Controller;
use App\Models\Servicer;
use App\Models\TransactionHistory;
use App\Models\WithdrawalHistory;
use App\Models\WithdrawalMethod;
use Auth;
use Illuminate\Http\Request;
use Midtrans\Transaction;
use Midtrans\Config;

class ServicerBillingController extends Controller
{
    public function index()
    {
        $transaction_h = TransactionHistory::select('tbl_client.first_name', 'tbl_client.last_name', 'tbl_svc_category.svc_category_name', 'tbl_transaction_history.transaction_date AS td', 'tbl_transaction_history.transaction_amount', 'tbl_transaction_history.transaction_type')
            ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_transaction_history.id_transaction')
            ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
            ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
            ->join('tbl_client', 'tbl_client.id_client', 'tbl_transaction.id_client')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->orderBy('tbl_transaction_history.transaction_date', 'DESC')
            ->get();
        $withdrawal_h = WithdrawalHistory::select('tbl_withdrawal_history.beneficiary_name', 'tbl_withdrawal_method.name', 'tbl_withdrawal_history.account_number', 'tbl_withdrawal_history.withdrawal_amount', 'tbl_withdrawal_history.withdrawal_date')
            ->join('tbl_withdrawal_method', 'tbl_withdrawal_method.id_withdrawal_method', 'tbl_withdrawal_history.id_withdrawal_method')
            ->where('id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->orderBy('withdrawal_date', 'DESC')
            ->get();

        $withdrawal_m = WithdrawalMethod::all();
        // return dd($withdrawal_h);
        return view('servicer.billing.index', [
            'transaction_h' => $transaction_h,
            'withdrawal_h' => $withdrawal_h,
            'withdrawal_m' => $withdrawal_m
        ]);
    }

    public function verify(Request $request)
    {
        // Validasi login menggunakan Laravel
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            return response()->json(['success' => true]);
        } else {
            // Login gagal
            return response()->json(['success' => false]);
        }
    }

    public function withdraw(Request $request)
    {
        // $ser = Servicer::find(Auth::guard('servicer')->user()->id_servicer);
        // \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // Transaction::payout($request->toArray());
        if ($request->withdrawal_net <= Auth::guard('servicer')->user()->balance) {
            if ($request->withdrawal_net < 10000) {
                return redirect()->route('servicer.billing')->with('Failed', 'Minimum Withdrawal is Rp.10,000');
            } else {
                $request->validate([
                    'withdrawal_method' => 'Required',
                    'withdrawal_number' => 'Required',
                    'withdrawal_amount' => 'Required',
                    'beneficiary_name' => 'Required',
                ]);
                Servicer::where('id_servicer', Auth::guard('servicer')->user()->id_servicer)
                    ->update(['balance' => Auth::guard('servicer')->user()->balance - $request->withdrawal_amount]);

                WithdrawalHistory::create([
                    'id_withdrawal_method' => $request->withdrawal_method,
                    'id_servicer' => Auth::guard('servicer')->user()->id_servicer,
                    'account_number' => $request->withdrawal_number,
                    'beneficiary_name' => $request->beneficiary_name,
                    'withdrawal_amount' => $request->withdrawal_net,
                    'withdrawal_date' => now()
                ]);
                return redirect()->route('servicer.billing')->with('Success', 'Wait For The Withdrawal Process');
            }
        } else {
            return redirect()->route('servicer.billing')->with('Failed', 'Your balance is not enought');
        }

    }
}