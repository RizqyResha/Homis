<?php

namespace App\Http\Controllers\Servicer;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaction;
use App\Models\Servicer;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Route;

class ServicerTransactionController extends Controller
{
    public function index()
    {
        if (Route::is('servicer.transaction')) {
            $data = DetailTransaction::select('users.id as userid', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('users', 'tbl_transaction.id_client', 'users.user_id')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->where('users.user_type', 'client')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->paginate(5);
            // return dd($data);
        } elseif (Route::is('servicer.transaction.paid')) {
            $data = DetailTransaction::select('users.id as userid', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('users', 'tbl_transaction.id_client', 'users.user_id')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->where('users.user_type', 'client')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->where('tbl_transaction.status', 'Paid')
                ->paginate(5);
        } elseif (Route::is('servicer.transaction.pending')) {
            $data = DetailTransaction::select('users.id as userid', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('users', 'tbl_transaction.id_client', 'users.user_id')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->where('tbl_transaction.status', 'Pending')
                ->where('users.user_type', 'client')
                ->paginate(5);
        } elseif (Route::is('servicer.transaction.process')) {
            $data = DetailTransaction::select('users.id as userid', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('users', 'tbl_transaction.id_client', 'users.user_id')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->where('users.user_type', 'client')
                ->where('tbl_transaction.status', 'Process')
                ->paginate(5);
        } elseif (Route::is('servicer.transaction.reject')) {
            $data = DetailTransaction::select('users.id as userid', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('users', 'tbl_transaction.id_client', 'users.user_id')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->where('users.user_type', 'client')
                ->where('tbl_transaction.status', 'Reject')
                ->paginate(5);
        } elseif (Route::is('servicer.transaction.accepted')) {
            $data = DetailTransaction::select('users.id as userid', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('users', 'tbl_transaction.id_client', 'users.user_id')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->where('users.user_type', 'client')
                ->where('tbl_transaction.status', 'Accepted(Unpaid)')
                ->paginate(5);
        } elseif (Route::is('servicer.transaction.finished')) {
            $data = DetailTransaction::select('users.id as userid', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('users', 'tbl_transaction.id_client', 'users.user_id')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->where('users.user_type', 'client')
                ->where('tbl_transaction.status', 'Finished')
                ->paginate(5);

        } elseif (Route::is('servicer.transaction.rejected')) {
            $data = DetailTransaction::select('users.id as userid', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('users', 'tbl_transaction.id_client', 'users.user_id')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->where('users.user_type', 'client')
                ->where('tbl_transaction.status', 'Rejected')
                ->paginate(5);

        } elseif (Route::is('servicer.transaction.canceled')) {
            $data = DetailTransaction::select('users.id as userid', 'tbl_detail_transaction.*', 'tbl_transaction.transaction_date', 'tbl_transaction.period_type', 'tbl_transaction.status', 'tbl_transaction.id_transaction', 'tbl_svc_category.svc_category_name')
                ->join('tbl_transaction', 'tbl_transaction.id_transaction', 'tbl_detail_transaction.id_transaction')
                ->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_transaction.id_svc')
                ->join('users', 'tbl_transaction.id_client', 'users.user_id')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', 'tbl_svc_category.id_svc_category')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->where('users.user_type', 'client')
                ->where('tbl_transaction.status', 'Canceled')
                ->paginate(5);
        }

        // return dd($data);
        return view('servicer.transaction.index', ['data' => $data]);

    }


    public function UpdateStatusToAccept(Request $request, $id_transaction)
    {
        Transaction::where('id_transaction', $id_transaction)
            ->update(['status' => 'Accepted(Unpaid)']);
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Transaction Status already changed!']);
        }
    }


    public function UpdateStatusToReject(Request $request, $id_transaction)
    {
        Transaction::where('id_transaction', $id_transaction)
            ->update(['status' => 'Rejected']);
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Transaction Status already changed!']);
        }
    }

    public function UpdateStatusToFinish(Request $request, $id_transaction)
    {
        $transaction = Transaction::where('id_transaction', $id_transaction)->first();
        if ($transaction->confirm_client == 1) {
            Transaction::where('id_transaction', $id_transaction)
                ->update([
                    'status' => 'Finished',
                    'transaction_finish_date' => now()
                ]);
            $balance = Transaction::select('price_total')->where('id_transaction', $id_transaction)->pluck('price_total')->first();
            $id_servicer = Servicer::select('tbl_servicer.id_servicer', 'tbl_servicer.balance')
                ->join('tbl_svc', 'tbl_svc.id_servicer', 'tbl_servicer.id_servicer')
                ->join('tbl_transaction', 'tbl_transaction.id_svc', 'tbl_svc.id_svc')
                ->where('tbl_transaction.id_transaction', $id_transaction)->first();
            $half_balance = ($balance / 2) + $id_servicer->balance;
            Servicer::where('id_servicer', $id_servicer->id_servicer)->update(['tbl_servicer.balance' => $half_balance]);
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Transaction already Finished!']);
            }
        } else {
            Transaction::where('id_transaction', $id_transaction)
                ->update(['confirm_servicer' => 1]);
            if ($request->ajax()) {
                return response()->json(['info' => true, 'message' => 'Wait Finish Confirmation From Client']);
            }
        }
    }
}