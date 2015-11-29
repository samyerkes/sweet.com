<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Ingredient;
use App\User;
use DB;
use Response;
use DateTime;
use DateInterval;
use DatePeriod;
use Spatie\Activitylog\Models\Activity;

class MetricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        $begin = new DateTime(\Carbon\Carbon::now()->subDays(7));
        $end = new DateTime(\Carbon\Carbon::now());

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        $orderCount = [];
        foreach ($period as $p ){
          $dt = $p->format( "Y-m-d" );
          $oc = Order::where('dateOrdered', $dt)->where('status_id', '>', 1)->count();
          $orderCount[] = $oc;
        };

        $sumTransactions = [];
        foreach ($period as $p ){
          $dt = $p->format( "Y-m-d" );
          $daySum = Order::where('dateOrdered', $dt)->where('status_id', '>', 1)->sum('transaction_total');
          $sumTransactions[] = $daySum ;
        };

        $dates = [];
        foreach ($period as $p ){
          $dt = $p->format( "Y-m-d" );
          $dates[] = $dt;
        };

        return view('metrics.orders', ['dates' => $dates, 'orderCount' => $orderCount, 'sumTransactions' => $sumTransactions]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inventory()
    {
        $measurementHeading = "Product inventory quantities";
        $measure = Product::all();
        return view('metrics.inventory', ['measure' => $measure, 'measurementHeading' => $measurementHeading]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function supply()
    {
        $measure = Ingredient::all();
        return view('metrics.supply', ['measure' => $measure]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        // $measure = DB::table('users')
        //      ->select(DB::raw('COUNT(id) as userCount, created_at'))
        //      ->groupBy('created_at')
        //      ->get();

        $days = User::select(DB::raw('DATE(created_at) as datum'))
           ->distinct()
           ->orderBy('datum','asc')
           ->get();

        $measure = array();
        foreach($days as $day) {
          $count = User::where(DB::raw('DATE(created_at)'),'=',$day->datum)
                    ->orderBy('id','asc')
                    ->count();

          $measure[$day->datum] = $count;
        }

        return view('metrics.users', ['measure' => $measure]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activity()
    {
        $latestActivities = Activity::with('user')->latest()->limit(100)->get();
        return view('metrics.activity', ['latestActivities' => $latestActivities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
