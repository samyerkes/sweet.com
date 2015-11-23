<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Product;
use App\Recipe;
use Redirect;

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
        $product = Product::find($id);
        return view('recipe.edit', ['product'=>$product]);
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
        $product = Product::find($id);
        $product->recipe = $request->Description;
        $product->save();

        $request->session()->flash('status', 'Product recipe was successfully updated.');

        return Redirect::action('RecipeController@show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return Redirect::back()->with('status','Ingredient removed!');
    }
}
