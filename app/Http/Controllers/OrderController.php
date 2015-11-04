<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\OrderProduct;
use Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Display a listing of the resource that are pending.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $orders = Order::where('status_id', '=', 2)->get();
        return view('orders.pending', ['orders' => $orders]);
    }

    /**
     * Display a listing of the resource that are completed.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed()
    {
        $orders = Order::where('status_id', '=', 3)->get();
        return view('orders.completed', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderProduct = new OrderProduct;
        $orderProduct->order_id = 1; // temporary!!
        $orderProduct->product_id = $request->product_id;
        $orderProduct->quantity = $request->quantity;
        $orderProduct->save();

        return $orderProduct;
        
        // return view('products.index', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $items = Order::find($id)->product()->get();

        $sum = 0;
        foreach($items as $item) {
            $sum+= number_format($item->pivot->quantity * $item->price, 2);    
        }

        return view('orders.show', ['order' => $order, 'items'=>$items, 'sum'=>$sum]);
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
        $orderProduct = Order::find($id);
        $orderProduct->status_id = 3;
        $orderProduct->dateCompleted = \Carbon\Carbon::now();
        $orderProduct->save();

        $request->session()->flash('status', 'Order has been marked as completed!');

        return Redirect::action('OrderController@show', ['id' => $orderProduct->id]);
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
