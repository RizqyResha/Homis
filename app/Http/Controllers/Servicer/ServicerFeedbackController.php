<?php

namespace App\Http\Controllers\Servicer;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Auth;
use Illuminate\Http\Request;

class ServicerFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::select('tbl_feedback.description', 'tbl_feedback.rate_point', 'tbl_feedback.like_count', 'tbl_feedback.created_at', 'tbl_client.username', 'tbl_client.profile_image', 'tbl_svc_category.svc_category_name')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->join('tbl_client', 'tbl_client.id_client', '=', 'tbl_feedback.id_client')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->join('tbl_svc_category', 'tbl_svc.id_svc_category', '=', 'tbl_svc_category.id_svc_category')
            ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
            ->orderBy('tbl_feedback.created_at', 'DESC')
            ->paginate(5);

        return view('servicer.dashboard.feedbacks', compact('feedbacks'));
    }
    public function paginate(Request $request)
    {
        if ($request->ajax()) {
            $feedbacks = Feedback::select('tbl_feedback.description', 'tbl_feedback.rate_point', 'tbl_feedback.like_count', 'tbl_feedback.created_at', 'tbl_client.username', 'tbl_client.profile_image', 'tbl_svc_category.svc_category_name')
                ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
                ->join('tbl_client', 'tbl_client.id_client', '=', 'tbl_feedback.id_client')
                ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
                ->join('tbl_svc_category', 'tbl_svc.id_svc_category', '=', 'tbl_svc_category.id_svc_category')
                ->where('tbl_svc.id_servicer', Auth::guard('servicer')->user()->id_servicer)
                ->orderBy('tbl_feedback.created_at', 'DESC')
                ->paginate(5);

            return view('servicer.dashboard.paginate', compact('feedbacks'))->render();
        }
    }
}