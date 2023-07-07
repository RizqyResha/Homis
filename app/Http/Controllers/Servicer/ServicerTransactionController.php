<?php

namespace App\Http\Controllers\Servicer;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Auth;
use DB;
use Illuminate\Http\Request;

class ServicerTransactionController extends Controller
{
    public function index()
    {
        $data = DetailTransaction::select('tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction')
            ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
            ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->get();
        return view('servicer.transaction.index', ['data' => $data]);
    }

    public function UpdateStatusToProcess($id_transaction)
    {
        Transaction::where('id_transaction', $id_transaction)
            ->update(['status' => 'Process']);
        return redirect()->route('servicer.transaction')->with('Success', 'Status Transaksi Telah Di Ubah !');
    }
}