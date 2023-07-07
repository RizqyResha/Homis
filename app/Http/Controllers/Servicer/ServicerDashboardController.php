<?php

namespace App\Http\Controllers\Servicer;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Service;
use App\Models\Transaction;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicerDashboardController extends Controller
{
    public function index()
    {
        $get_ratings_p = Feedback::select('tbl_feedback.rate_point')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->avg('tbl_feedback.rate_point');
        $get_this_month_earning = Transaction::select('tbl_transaction.price_total')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_transaction.id_svc')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->whereMonth('tbl_transaction.transaction_date', '=', Carbon::now()->month)
            ->whereYear('tbl_transaction.transaction_date', '=', Carbon::now()->year)
            ->sum('tbl_transaction.price_total');
        $get_this_month_transaction = Transaction::select('tbl_transaction.price_total')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_transaction.id_svc')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->whereMonth('tbl_transaction.transaction_date', '=', Carbon::now()->month)
            ->whereYear('tbl_transaction.transaction_date', '=', Carbon::now()->year)
            ->count('tbl_transaction.price_total');
        $total_transaction = Transaction::select('tbl_transaction.price_total')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_transaction.id_svc')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->count('tbl_transaction.price_total');

        $get_last_month_earn = Transaction::select('tbl_transaction.price_total')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_transaction.id_svc')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->whereMonth('tbl_transaction.transaction_date', '=', Carbon::now()->month - 1)
            ->whereYear('tbl_transaction.transaction_date', '=', Carbon::now()->year)
            ->sum('tbl_transaction.price_total');
        $get_last_month_transaction = Transaction::select('tbl_transaction.price_total')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_transaction.id_svc')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->whereMonth('tbl_transaction.transaction_date', '=', Carbon::now()->month - 1)
            ->whereYear('tbl_transaction.transaction_date', '=', Carbon::now()->year)
            ->count('tbl_transaction.price_total');
        if ($get_last_month_earn == null && $get_this_month_earning == null) {
            $percentage_month_earn = 0;
        } else {
            $percentage_month_earn = (($get_this_month_earning - $get_last_month_earn) / (($get_this_month_earning + $get_last_month_earn) / 2)) * 100;
        }
        if ($get_last_month_transaction == 0 && $get_this_month_transaction == 0) {
            $percentage_month_transact = 0;
        } else {
            $percentage_month_transact = (($get_this_month_transaction - $get_last_month_transaction) / (($get_this_month_transaction + $get_last_month_transaction) / 2)) * 100;
        }

        $datachrt = array();
        for ($i = 1; $i <= 12; $i++) {
            ${'data' . $i} = Transaction::join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_transaction.id_svc')->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)->whereMonth('transaction_date', '=', $i)->whereYear('transaction_date', '=', Carbon::now()->year)->groupBy('transaction_date')->sum('price_total');
            if (${'data' . $i} == null) {
                ${'data' . $i} = "0";
            }
            array_push($datachrt, ${'data' . $i});
        }

        //Get-FeedBack
        $feedback = Feedback::select('tbl_feedback.description', 'tbl_feedback.rate_point', 'tbl_feedback.like_count', 'tbl_feedback.created_at', 'tbl_client.username', 'tbl_client.profile_image', 'tbl_svc_category.svc_category_name')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->join('tbl_client', 'tbl_client.id_client', '=', 'tbl_feedback.id_client')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->join('tbl_svc_category', 'tbl_svc.id_svc_category', '=', 'tbl_svc_category.id_svc_category')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->orderBy('tbl_feedback.created_at', 'DESC')
            ->paginate(5);
        // 

        // get Servicer

        $services = Service::select("tbl_svc_category.svc_category_name")
            ->join('tbl_svc_category', 'tbl_svc_category.id_svc_category', '=', 'tbl_svc.id_svc_category')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->where('tbl_svc.delete_status', 0)->get();


        // return dd($services);
        return view('servicer.dashboard.index', [
            'ratings' => $get_ratings_p,
            'this_month_earning' => $get_this_month_earning,
            'this_month_transaction' => $get_this_month_transaction,
            'total_transaction' => $total_transaction,
            'last_month_earning' => $get_last_month_earn,
            'month_earn_percentage' => $percentage_month_earn,
            'month_transaction_percentage' => $percentage_month_transact,
            'datachrt' => $datachrt,
            'services' => $services
        ], compact('feedback'));

    }

    public function getFeedback(Request $request)
    {
        // Retrieve the paginated feedback data using your desired logic
        //Get-FeedBack
        $feedback = Feedback::select('tbl_feedback.description', 'tbl_feedback.rate_point', 'tbl_feedback.like_count', 'tbl_feedback.created_at', 'tbl_client.username', 'tbl_client.profile_image', 'tbl_svc_category.svc_category_name')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->join('tbl_client', 'tbl_client.id_client', '=', 'tbl_feedback.id_client')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->join('tbl_svc_category', 'tbl_svc.id_svc_category', '=', 'tbl_svc_category.id_svc_category')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->orderBy('tbl_feedback.created_at', 'DESC')
            ->paginate(5);
        // 

        // Return the feedback data as a JSON response
        return response()->json($feedback);
    }
}