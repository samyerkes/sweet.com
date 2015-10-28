<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use Auth;
use App\Product;
use App\OrderProduct;
use DB;
use Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        $cart = DB::table('orders')
                     ->select('id')
                     ->where('status_id', '=', 1)
                     ->where('user_id', '=', $user->id)
                     ->value('id');
        $items = Order::find($cart)->product()->get();

        $sum = 0;
        foreach($items as $item) {
            $sum+= number_format($item->pivot->quantity * $item->price, 2);    
        }

        return view('cart.index', ['items'=>$items, 'sum'=>$sum, 'user'=>$user]);
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
        $user = Auth::User();
        $cart = DB::table('orders')
                     ->select('id')
                     ->where('status_id', '=', 1)
                     ->where('user_id', '=', $user->id)
                     ->value('id');

        $orderProduct = new OrderProduct;
        $orderProduct->order_id = $cart; 
        $orderProduct->product_id = $request->product_id;
        $orderProduct->quantity = $request->quantity;
        $orderProduct->save();

        $request->session()->flash('status', 'Product was saved to cart.');

        return Redirect::action('CartController@index');

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

        $orderProduct = OrderProduct::where('id', '=', $id)->get();
        
        return $orderProduct;

        // $orderProduct->delete();

        // return Redirect::action('CartController@index')->with('danger', 'Product was removed from cart.');
    }
}
