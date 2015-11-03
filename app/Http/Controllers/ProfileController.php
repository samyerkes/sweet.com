<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use App\Status;
use App\Address;
use Auth;
use Redirect;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        $orders = User::find($user->id)->order;
        $addresses = User::find($user->id)->address;

        return view('profile.index', ['user'=>$user, 'orders'=>$orders, 'addresses'=>$addresses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // not needed cause we have auth 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // not needed cause we have auth
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
        if($order->status_id == 1) {
            return Redirect::action('CartController@index');
        } else {
            return view('profile.show', ['order' => $order, 'items'=>$items, 'sum'=>$sum]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $addresses = User::find($user->id)->address;
        return view('profile.edit', ['user' => $user, 'addresses'=>$addresses]);
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
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
        ]);

        $id = $request->id;
        $user = User::find($id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->save();

        $request->session()->flash('status', 'Profile information was successfully updated.');

        return view('profile.index', ['user' => $user]);
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
