<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use DB;
use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
    public function index()
    {
        $topcategory = ServiceCategory::all()->take(6);
        $rawdata = DB::table('tbl_svc')
            ->select(
                'tbl_svc.id_svc',
                'tbl_svc.thumbnail_image',
                DB::raw("CONCAT(tbl_servicer.first_name,' ',tbl_servicer.last_name) AS servicer_name"),
                'tbl_svc_category.svc_category_name',
                DB::raw("(SELECT AVG(tbl_feedback.rate_point) FROM tbl_feedback WHERE tbl_feedback.id_svc = tbl_svc.id_svc) AS rate_point"),
                DB::raw("(SELECT COUNT(tbl_feedback.id_svc) FROM tbl_feedback WHERE tbl_feedback.id_svc = tbl_svc.id_svc) AS total_reviewers"),
                DB::raw("(SELECT tbl_svc_price.price_per_period FROM tbl_svc_price WHERE tbl_svc_price.id_svc = tbl_svc.id_svc AND tbl_svc_price.period_type = 'Hourly') AS hourly_price"),
                DB::raw("(SELECT tbl_svc_price.price_per_period FROM tbl_svc_price WHERE tbl_svc_price.id_svc = tbl_svc.id_svc AND tbl_svc_price.period_type = 'Daily') AS daily_price"),
                DB::raw("(SELECT tbl_svc_price.price_per_period FROM tbl_svc_price WHERE tbl_svc_price.id_svc = tbl_svc.id_svc AND tbl_svc_price.period_type = 'Weekly') AS weekly_price"),
                DB::raw("(SELECT tbl_svc_price.price_per_period FROM tbl_svc_price WHERE tbl_svc_price.id_svc = tbl_svc.id_svc AND tbl_svc_price.period_type = 'Monthly') AS monthly_price"),
                'tbl_svc.description'
            )
            ->join('tbl_servicer', 'tbl_svc.id_servicer', '=', 'tbl_servicer.id_servicer')
            ->join('tbl_svc_category', 'tbl_svc.id_svc_category', '=', 'tbl_svc_category.id_svc_category')
            ->orderBy('rate_point', 'DESC')->orderBy('total_reviewers', 'DESC')->take(3)->get();
        // return dd($rawdata);
        return view('client.home.index', [
            'topcategory' => $topcategory,
            'featured_servicer' => $rawdata
        ]);
    }
}