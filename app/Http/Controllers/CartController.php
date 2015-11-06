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
use App\Address;

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
        $cartQuantity = DB::table('order_products')->where('order_id', '=', 40)->sum('quantity');

        if(empty($cart)) {
            $order = new Order;
            $order->user_id = $user->id;
            $order->status_id = 1;
            $order->save();

            $cart = $order;
        }

        $items = Order::find($cart)->product()->get();

        $sum = 0;
        foreach($items as $item) {
            $sum+= number_format($item->pivot->quantity * $item->price, 2);    
        }

        return view('cart.index', ['items'=>$items, 'sum'=>$sum, 'user'=>$user]);
    }

    /**
     * Checkout of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $user = Auth::User();
        $cart = DB::table('orders')
                     ->select('id')
                     ->where('status_id', '=', 1)
                     ->where('user_id', '=', $user->id)
                     ->value('id');
        $items = Order::find($cart)->product()->get();
        $order = Order::find($cart);

        $sum = 0;
        foreach($items as $item) {
            $sum+= number_format($item->pivot->quantity * $item->price, 2);    
        }

        $addresses = $user->address()->get();
        $creditcards = $user->creditcard()->get();

        return view('cart.checkout', ['items'=>$items, 'sum'=>$sum, 'user'=>$user, 'addresses'=>$addresses, 'order'=>$order, 'creditcards'=>$creditcards]);
    }

    /**
     * Store a newly submitted order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitOrder(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'payment' => 'required',
        ]);

        $now = \Carbon\Carbon::now();

        $id = $request->id;
        $order = Order::find($id);

        $items = Order::find($id)->product()->get();

        foreach($items as $item) {
            $product = Product::find($item->id);
            $product->inventory = $product->inventory - $item->pivot->quantity;
            $product->save();
        }

        $order->transaction_total = $request->total;
        $order->dateOrdered = $now;
        $order->status_id = 2;
        $order->address = $request->address;
        $order->payment = $request->payment;
        $order->save();
        
        $request->session()->flash('status', 'Your order has been submitted!');

        return Redirect::action('ProfileController@index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Not needed cause this is coming from the item listing
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
        
        if(empty($cart)) {
            $order = new Order;
            $order->user_id = $user->id;
            $order->status_id = 1;
            $order->save();

            $orderProduct = new OrderProduct;
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $request->product_id;
            $orderProduct->quantity = $request->quantity;
            $orderProduct->save();
        } else {
            $orderProduct = new OrderProduct;
            $orderProduct->order_id = $cart; 
            $orderProduct->product_id = $request->product_id;
            $orderProduct->quantity = $request->quantity;
            $orderProduct->save();
        }

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

        $item = OrderProduct::find($id);
        $item->delete();
        return Redirect::action('CartController@index')->with('status', 'Item was successfully removed.');;
    }
}
