<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Recipe;
use App\Product;
use App\Supplier;
use Redirect;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredient.index', ['ingredients'=>$ingredients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($product)
    {
        $product = Product::find($product);
        $ingredients = Ingredient::all();
        return view('ingredient.add', ['ingredients' => $ingredients, 'product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddStore(Request $request)
    {
        $recipe = new Recipe;
        $recipe->product_id = $request->product_id;
        $recipe->ingredient_id = $request->Ingredient;
        $recipe->quantity = $request->Quantity;
        $recipe->save();

        return Redirect::action('RecipeController@show', $request->product_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('ingredient.create', ['suppliers'=>$suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient;
        $ingredient->name = $request->Name;
        $ingredient->supplier_id = $request->Supplier;
        $ingredient->quantity = $request->Quantity;
        $ingredient->unit = $request->Unit;
        $ingredient->save();

        $request->session()->flash('status', 'Ingredient information was successfully saved.');

        return Redirect::action('IngredientController@index');
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
        $suppliers = Supplier::all();
        $ingredient = Ingredient::find($id);
        return view('ingredient.edit', ['ingredient'=>$ingredient, 'suppliers'=>$suppliers]);
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
        $ingredient = Ingredient::find($id);
        $ingredient->name = $request->Name;
        $ingredient->supplier_id = $request->Supplier;
        $ingredient->quantity = $request->Quantity;
        $ingredient->unit = $request->Unit;
        $ingredient->save();

        $request->session()->flash('status', 'Ingredient information was successfully updated.');

        return Redirect::action('IngredientController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        return Redirect::back()->with('status','Ingredient removed!');
    }
}
