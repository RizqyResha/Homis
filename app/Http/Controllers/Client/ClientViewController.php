<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Servicer;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class ClientViewController extends Controller
{
    public function index($id_svc)
    {
        $rawdata = DB::table('tbl_svc')
            ->select(
                'tbl_svc.id_svc',
                'tbl_svc.svc_name',
                'tbl_svc.thumbnail_image',
                DB::raw("CONCAT(tbl_servicer.first_name,' ',tbl_servicer.last_name) AS servicer_name"),
                'tbl_svc_category.svc_category_name',
                DB::raw("(SELECT AVG(tbl_feedback.rate_point) FROM tbl_feedback WHERE tbl_feedback.id_svc = tbl_svc.id_svc) AS rate_point"),
                DB::raw("(SELECT COUNT(tbl_feedback.id_svc) FROM tbl_feedback WHERE tbl_feedback.id_svc = tbl_svc.id_svc) AS total_reviewers"),
                DB::raw("(SELECT tbl_svc_price.price_per_period FROM tbl_svc_price WHERE tbl_svc_price.id_svc = tbl_svc.id_svc AND tbl_svc_price.period_type = 'Hourly') AS hourly_price"),
                DB::raw("(SELECT tbl_svc_price.price_per_period FROM tbl_svc_price WHERE tbl_svc_price.id_svc = tbl_svc.id_svc AND tbl_svc_price.period_type = 'Daily') AS daily_price"),
                DB::raw("(SELECT tbl_svc_price.price_per_period FROM tbl_svc_price WHERE tbl_svc_price.id_svc = tbl_svc.id_svc AND tbl_svc_price.period_type = 'Weekly') AS weekly_price"),
                DB::raw("(SELECT tbl_svc_price.price_per_period FROM tbl_svc_price WHERE tbl_svc_price.id_svc = tbl_svc.id_svc AND tbl_svc_price.period_type = 'Monthly') AS monthly_price"),
                DB::raw("(SELECT COUNT(tbl_transaction.id_svc) FROM tbl_transaction WHERE tbl_svc.id_svc = tbl_transaction.id_svc AND tbl_transaction.status = 'Paid') AS total_transaction"),
                'tbl_svc.description'
            )
            ->join('tbl_servicer', 'tbl_svc.id_servicer', '=', 'tbl_servicer.id_servicer')
            ->join('tbl_svc_category', 'tbl_svc.id_svc_category', '=', 'tbl_svc_category.id_svc_category')
            ->where('tbl_svc.id_svc', '=', $id_svc)->first();

        //Get-FeedBack
        $feedback = Feedback::select('tbl_feedback.description', 'tbl_feedback.rate_point', 'tbl_feedback.like_count', 'tbl_feedback.created_at', 'tbl_client.username', 'tbl_client.profile_image', 'tbl_svc_category.svc_category_name')
            ->join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->join('tbl_client', 'tbl_client.id_client', '=', 'tbl_feedback.id_client')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', '=', 'tbl_svc.id_servicer')
            ->join('tbl_svc_category', 'tbl_svc.id_svc_category', '=', 'tbl_svc_category.id_svc_category')
            ->where('tbl_svc.id_svc', $id_svc)
            ->orderBy('tbl_feedback.created_at', 'DESC')
            ->paginate(5);
        //
        $totalrating = Feedback::join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->where('tbl_svc.id_svc', $id_svc)
            ->avg('tbl_feedback.rate_point');
        $five = Feedback::join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->where('tbl_svc.id_svc', $id_svc)
            ->where('tbl_feedback.rate_point', 5)
            ->count('tbl_feedback.rate_point');
        $four = Feedback::join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->where('tbl_svc.id_svc', $id_svc)
            ->where('tbl_feedback.rate_point', 4)
            ->count('tbl_feedback.rate_point');
        $three = Feedback::join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->where('tbl_svc.id_svc', $id_svc)
            ->where('tbl_feedback.rate_point', 3)
            ->count('tbl_feedback.rate_point');
        $two = Feedback::join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->where('tbl_svc.id_svc', $id_svc)
            ->where('tbl_feedback.rate_point', 2)
            ->count('tbl_feedback.rate_point');
        $one = Feedback::join('tbl_svc', 'tbl_svc.id_svc', '=', 'tbl_feedback.id_svc')
            ->where('tbl_svc.id_svc', $id_svc)
            ->where('tbl_feedback.rate_point', 1)
            ->count('tbl_feedback.rate_point');
        $getusid = User::select('id')
            ->join('tbl_servicer', 'tbl_servicer.id_servicer', 'users.user_id')
            ->join('tbl_svc', 'tbl_svc.id_servicer', 'tbl_servicer.id_servicer')
            ->where('users.user_type', 'servicer')
            ->where('tbl_svc.id_svc', $id_svc)
            ->pluck('users.id')->first();
        // return dd($servicer_id);
        return view(
            'client.view.index',
            [
                'data' => $rawdata,
                'feedback' => $feedback,
                'total_rating' => $totalrating,
                'five' => $five,
                'four' => $four,
                'three' => $three,
                'two' => $two,
                'one' => $one,
                'id' => $getusid
            ]
        );
    }
}