<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Product;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('recipe.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.create');
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
        $address = new Address;
        $address->user_id = $user->id;
        $address->name = $request->name;
        $address->street = $request->street;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip = $request->zip;
        $address->save();

        $request->session()->flash('status', 'Address information was successfully saved.');

        return Redirect::action('AddressController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $ingredients = Product::find($id)->ingredient()->get();

        return view('recipe.show', ['ingredients' => $ingredients, 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);
        return view('address.edit', ['address'=>$address]);
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
        $address = Address::find($id);
        $address->name = $request->name;
        $address->street = $request->street;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip = $request->zip;
        $address->save();

        $request->session()->flash('status', 'Address information was successfully updated.');

        return Redirect::action('AddressController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();
        return Redirect::action('AddressController@index')->with('status', 'Address information was successfully updated.');
    }
}
