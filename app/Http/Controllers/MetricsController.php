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

class MetricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        $measure = DB::table('orders')
             ->select(DB::raw('SUM(transaction_total) as dayTotal, COUNT(id) as numberTransaction, dateOrdered'))
             ->where('status_id', '>', 1)
             ->groupBy('dateOrdered')
             ->get();

        return view('metrics.orders', ['measure' => $measure]);
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
        $measure = DB::table('users')
             ->select(DB::raw('COUNT(id) as userCount, created_at'))
             ->groupBy('created_at')
             ->get();
        return view('metrics.users', ['measure' => $measure]);
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
