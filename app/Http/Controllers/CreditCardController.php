<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\CreditCard;
use Redirect;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        $creditcards = User::find($user->id)->creditcard;
        return view('creditcard.index', ['user' => $user, 'creditcards'=>$creditcards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creditcard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $cc = new CreditCard;
        $cc->user_id = $user->id;
        $cc->name = $request->name;
        $cc->number = $request->number;
        $cc->expiration = $request->expiration;
        $cc->cvc = $request->cvc;
        $cc->save();

        $request->session()->flash('status', 'Credit card information was successfully saved.');

        return Redirect::action('CreditCardController@index');
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
        $creditcard = CreditCard::find($id);
        return view('creditcard.edit', ['creditcard'=>$creditcard]);
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

        $id = $request->id;
        $cc = CreditCard::find($id);
        $cc->name = $request->name;
        $cc->number = $request->number;
        $cc->expiration = $request->expiration;
        $cc->cvc = $request->cvc;
        $address->save();

        $request->session()->flash('status', 'Credit card information was successfully updated.');

        return Redirect::action('CreditCardController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cc = CreditCard::find($id);
        $cc->delete();
        return Redirect::action('CreditCardController@index')->with('status', 'Credit card information was successfully updated.');
    }
}
