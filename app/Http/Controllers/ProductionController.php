<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Batch;
use App\Product;
use App\Status;
use Redirect;
use App\Ingredient;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        return view('production.index', ['batches'=>$batches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('production.create', ['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check to see if we have enough inventory
        $product = Product::find($request->Product);
        $batches = $request->Batches;
        $productIngredients = $product->ingredient()->get();

        foreach($productIngredients as $i) {
            $ingredient = Ingredient::find($i->id);
            $eachIngredient = ($batches * $i->pivot->quantity);
            $enoughMaterials = ($i->quantity - $eachIngredient);
            if ($enoughMaterials < 0) {
                return Redirect::back()->with('danger', 'Sorry, we do not have enough '. $ingredient->name . ' to make this!');
            }            
        }

        //if the check is successful then schedule the batch
        $productionSchedule = new Batch;
        $productionSchedule->product_id = $request->Product;
        $productionSchedule->batches = $request->Batches;
        $productionSchedule->proddate = $request->Date;
        $productionSchedule->status_id = 1;
        $productionSchedule->save();

        $request->session()->flash('status', 'Production schedule was successfully saved.');

        return Redirect::action('ProductionController@index');
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
        $statuses = Status::all();
        $products = Product::all();
        $productionschedule = Batch::find($id);
        return view('production.edit', ['productionschedule'=>$productionschedule, 'products'=>$products, 'statuses'=>$statuses]);
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
        $productionSchedule = Batch::find($id);
        $productionSchedule->product_id = $request->Product;
        $productionSchedule->batches = $request->Batches;
        $productionSchedule->proddate = $request->Date;
        $productionSchedule->status_id = $request->Status;
        $productionSchedule->save();

        if ($productionSchedule->status_id == 3){
            $product = Product::find($productionSchedule->product_id);
            $addInventory = ($productionSchedule->batches * $product->units_per_batch);
            $product->inventory = ($product->inventory + $addInventory);
            $product->save();

            // for each ingredient in the recipe subtract the units required to make the batch
            $currentIngredientQuantity = $product->ingredient()->get();
            $batches = $productionSchedule->batches;
            foreach($currentIngredientQuantity as $i) {
                $ingredient = Ingredient::find($i->id);
                $multipleIngredientBatch = ($batches * $i->pivot->quantity);
                $ingredient->quantity = ($ingredient->quantity - $multipleIngredientBatch);
                $ingredient->save();
            }

        }
        
        $request->session()->flash('status', 'Production schedule was successfully updated.');

        return Redirect::action('ProductionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productionSchedule = Batch::find($id);
        $productionSchedule->delete();
        return Redirect::action('ProductionController@index')->with('status', 'Production schedule was successfully updated.');
    }
}
