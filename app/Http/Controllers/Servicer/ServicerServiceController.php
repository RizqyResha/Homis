<?php

namespace App\Http\Controllers\Servicer;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServicePrice;
use Auth;
use DB;
use Illuminate\Http\Request;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class ServicerServiceController extends Controller
{
    public function index()
    {
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
            ->where('tbl_svc.id_servicer', '=', Auth::guard('servicer')->user()->id_servicer)
            ->where('tbl_svc.delete_status', '=', 0)
            ->orderBy('rate_point', 'DESC')->orderBy('total_reviewers', 'DESC')->get();
        return view('servicer.services.index', ['service' => $rawdata]);
    }

    public function getCreate()
    {
        $category_list = DB::table('tbl_svc_category')->select('svc_category_name')->pluck('svc_category_name');
        return view('servicer.services.create', ['category_list' => $category_list]);
    }

    public function create(Request $request)
    {

        $request->validate([
            'svc_category_name' => 'required|exists:tbl_svc_category|',
            'svc_name' => 'required|min:3|max:100',
            'description' => 'required',
        ]);
        $get_svc_cat_id = ServiceCategory::select('id_svc_category')->where('svc_category_name', $request->svc_category_name)->pluck('id_svc_category');

        //lokasi file foto di simpan
        $file_loc = public_path('/assets/img/services');

        if (!empty($request->file_upload)) {
            //Resize foto kasir
            $img_file = $request->file('file_upload');
            //rewrite nama kasir
            $svc_name = preg_replace('/\s+/', '', $request->svc_name);
            //end rewrite nama kasir
            $img_svc_name = $svc_name . time() . '.' . $img_file->getClientOriginalExtension();
            $resize_foto_kasir = Image::make($img_file->getRealPath());
            $resize_foto_kasir->resize(320, 220)->save($file_loc . '/' . $img_svc_name);
            //End resize foto kasir
            $idsvc = Auth::guard('servicer')->user()->id_servicer;

            $service_id = Service::insertGetId([
                'id_servicer' => $idsvc,
                'svc_name' => $request->svc_name,
                'id_svc_category' => $get_svc_cat_id,
                'thumbnail_image' => $img_svc_name,
                'description' => $request->description,
                'delete_status' => 0
            ]);

            ServicePrice::create([
                'period_type' => 'Hourly',
                'price_per_period' => $request->hourly,
                'id_svc' => $service_id
            ]);

            ServicePrice::create([
                'period_type' => 'Daily',
                'price_per_period' => $request->daily,
                'id_svc' => $service_id
            ]);

            ServicePrice::create([
                'period_type' => 'Weekly',
                'price_per_period' => $request->weekly,
                'id_svc' => $service_id
            ]);
            ServicePrice::create([
                'period_type' => 'Monthly',
                'price_per_period' => $request->monthly,
                'id_svc' => $service_id
            ]);
        } else {
            $service_id = Service::insertGetId([
                'svc_name' => $request->svc_name,
                'id_svc_category' => $get_svc_cat_id,
                'thumbnail_image' => 'noimage',
                'description' => $request->description
            ]);
            ServicePrice::create([
                'period_type' => 'Hourly',
                'price_per_period' => $request->Hourly,
                'id_svc' => $service_id
            ]);

            ServicePrice::create([
                'period_type' => 'Daily',
                'price_per_period' => $request->Daily,
                'id_svc' => $service_id
            ]);

            ServicePrice::create([
                'period_type' => 'Weekly',
                'price_per_period' => $request->Weekly,
                'id_svc' => $service_id
            ]);
            ServicePrice::create([
                'period_type' => 'Monthly',
                'price_per_period' => $request->Monthly,
                'id_svc' => $service_id
            ]);
        }
        ;
        // Alert::success('Success', 'Your Service Already on List !');
        return redirect()->route('servicer.service')->with('Success', 'Your Service already Listed!');
    }

    public function getUpdate(Request $request)
    {
        $data = Service::select('tbl_svc.thumbnail_image', 'tbl_svc.svc_name', 'tbl_svc_category.svc_category_name', 'tbl_svc.description')
            ->join('tbl_svc_category', 'tbl_svc_category.id_svc_category', 'tbl_svc.id_svc_category')
            ->where('tbl_svc.id_svc', $request->id_svc)
            ->first();
        $hourly = ServicePrice::select('tbl_svc_price.price_per_period')->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_svc_price.id_svc')
            ->where('tbl_svc.id_svc', $request->id_svc)
            ->where('tbl_svc_price.period_type', 'Hourly')
            ->first();
        $daily = ServicePrice::select('tbl_svc_price.price_per_period')->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_svc_price.id_svc')
            ->where('tbl_svc.id_svc', $request->id_svc)
            ->where('tbl_svc_price.period_type', 'Daily')
            ->first();
        $weekly = ServicePrice::select('tbl_svc_price.price_per_period')->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_svc_price.id_svc')
            ->where('tbl_svc.id_svc', $request->id_svc)
            ->where('tbl_svc_price.period_type', 'Weekly')
            ->first();
        $Monthly = ServicePrice::select('tbl_svc_price.price_per_period')->join('tbl_svc', 'tbl_svc.id_svc', 'tbl_svc_price.id_svc')
            ->where('tbl_svc.id_svc', $request->id_svc)
            ->where('tbl_svc_price.period_type', 'Monthly')
            ->first();
        $category_list = DB::table('tbl_svc_category')->select('svc_category_name')->pluck('svc_category_name');

        return view('servicer.services.edit', [
            'id_svc' => $request->id_svc,
            'data' => $data,
            'hourly' => $hourly,
            'daily' => $daily,
            'weekly' => $weekly,
            'monthly' => $Monthly,
            'category_list' => $category_list
        ]);
    }

    public function edit(Request $request)
    {
        $get_svc_cat_id = ServiceCategory::select('id_svc_category')->where('svc_category_name', $request->svc_category_name)->pluck('id_svc_category')->first();
        if (!empty($request->file_upload)) {
            $file_loc = public_path('/assets/img/services');
            $img_file = $request->file('file_upload');


            $svc_name = preg_replace('/\s+/', '', $request->svc_name);

            $img_svc_name = $svc_name . time() . '.' . $img_file->getClientOriginalExtension();
            $resize = Image::make($img_file->getRealPath());
            $resize->resize(320, 220)->save($file_loc . '/' . $img_svc_name);

            $idsvc = Auth::guard('servicer')->user()->id_servicer;
            Service::where('id_svc', $request->id_svc)
                ->update([
                    'thumbnail_image' => $img_svc_name,
                    'svc_name' => $request->svc_name,
                    'id_svc_category' => $get_svc_cat_id,
                    'description' => $request->description
                ]);

        } else {
            Service::where('id_svc', $request->id_svc)
                ->update([
                    'svc_name' => $request->svc_name,
                    'id_svc_category' => $get_svc_cat_id->id_svc_category,
                    'description' => $request->description
                ]);
        }
        ServicePrice::where('id_svc', $request->id_svc)
            ->where('period_type', 'Hourly')
            ->update([
                'price_per_period' => $request->hourly,
            ]);
        ServicePrice::where('id_svc', $request->id_svc)
            ->where('period_type', 'Daily')
            ->update([
                'price_per_period' => $request->daily,
            ]);
        ServicePrice::where('id_svc', $request->id_svc)
            ->where('period_type', 'Weekly')
            ->update([
                'price_per_period' => $request->weekly,
            ]);
        ServicePrice::where('id_svc', $request->id_svc)
            ->where('period_type', 'Monthly')
            ->update([
                'price_per_period' => $request->monthly,
            ]);
        return redirect()->route('servicer.service')->with('Success', 'Your Service Already Updated !');
    }
    public function delete(Request $request)
    {
        Service::where('id_svc', $request->id_svc)
            ->update([
                'delete_status' => 1
            ]);
        return redirect()->route('servicer.service')->with('Success', 'Your Service Already Deleted!');
    }
}