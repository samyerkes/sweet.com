<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\OrderProduct;
use Redirect;
use App\User;
use Stripe\Error\Card;
use Stripe\Stripe;

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
        $orders = Order::where('status_id', 2)->get();
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
        $products = Product::all();
        $users = User::orderBy('lname')->get();
        return view('orders.create', ['products'=>$products, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function employeeStore(Request $request)
    {
        // $this->validate($request, [
        //     'user' => 'required',
        //     'payment' => 'required',
        // ]);

        $order = new Order;
        $order->user_id = $request->user;
        $order->status_id = 2; //make status pending
        $order->dateOrdered = \Carbon\Carbon::now();
        $order->address = 'In store purchase'; // temporary
        // $order->transaction_total = '10.00'; // temporary
        $order->save();

        $products = Product::all();

        foreach($products as $p) {
            if($request->input('quantity'.$p->id) > 0) {
                $orderProduct = new OrderProduct;
                $orderProduct->order_id = $order->id;
                $orderProduct->product_id = $p->id;
                $orderProduct->quantity = $request->input('quantity'.$p->id);
                $orderProduct->save();
            }
        }

        $items = $order->product()->get();

        $sum = 0;
        foreach($items as $item) {
            $sum+= number_format($item->pivot->quantity * $item->price, 2);
        }

        $order = Order::find($order->id);
        $order->transaction_total = $sum;
        $order->save();

        Stripe::setApiKey(env('STRIPE_TEST_KEY'));

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        // Create the charge on Stripe's servers - this will charge the user's card
        $stripeAmount = bcmul($order->transaction_total, 100);
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $stripeAmount, // amount in cents, again
                "currency" => "usd",
                "source" => $token,
                "description" => "Sweet Sweet Chocolates"
            ));
        } catch(Card $e) {
            return "We're sorry your credit card has been declined.";
        }

        $request->session()->flash('status', 'Order has been submitted');

        return Redirect::action('OrderController@create');
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
