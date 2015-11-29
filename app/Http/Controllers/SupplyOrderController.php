<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Supplyorder;
use App\Supplier;
use App\Ingredient;
use App\IngredientSupplyOrder;
use Redirect;
use Mail;
use Activity;

class SupplyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplyorder = Supplyorder::all();
        return view('supplyorder.index', ['supplyorder'=>$supplyorder]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplyorder = new Supplyorder;
        $supplyorder->supplier_id =1;
        $supplyorder->status_id =1;
        $supplyorder->save();
        Activity::log('Created supply order #' . $supplyorder->id . '.');
        return Redirect::action('SupplyOrderController@show', $supplyorder->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredientsupplyorder = new IngredientSupplyOrder;
        $ingredientsupplyorder->supplyorder_id = $request->supplyorder_id;
        $ingredientsupplyorder->ingredient_id = $request->Ingredient;
        $ingredientsupplyorder->quantity = $request->Quantity;
        $ingredientsupplyorder->save();

        $ingredient = Ingredient::find($ingredientsupplyorder->ingredient_id);

        Activity::log('Added ' . $ingredient->name . ' to the supply order.');

        return Redirect::back()->with('status','Supply order updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suppliers = Supplier::all();
        $ingredients = Ingredient::all();
        $supplyorder = Supplyorder::find($id);
        return view('supplyorder.show', ['supplyorder' => $supplyorder, 'ingredients'=>$ingredients, 'suppliers'=>$suppliers]);
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
        $id = $request->id;
        $currentStatus = $request->status;
        $supplyorder = Supplyorder::find($id);
        if($currentStatus == 1) {
            $supplyorder->status_id = 2;
            $supplyorder->supplier_id = $request->Supplier;
        }
        elseif ($currentStatus == 2) {
            $ingredients = $supplyorder->ingredient;

            // loop through each ingredient and add itself to the quantity
            foreach ($ingredients as $i) {
                $i->quantity = ($i->quantity + $i->pivot->quantity);
                $i->save();
            }
            $supplyorder->status_id = 3;
        }
        $supplyorder->save();

        if ($supplyorder->status_id = 2){
            $ingredients = $supplyorder->ingredient;
            // return view('email.supplyorder', ['supplyorder' => $supplyorder, 'ingredients' => $ingredients]);
            Mail::send('email.supplyorder', ['supplyorder' => $supplyorder, 'ingredients' => $ingredients], function ($m) use ($supplyorder) {
                $m->from('samuelyerkes@gmail.com', 'Sweet Sweet Chocolates');
                $m->to($supplyorder->supplier->email, $supplyorder->supplier->name)->subject('Sweet Sweet Chocolates would like to make a supply order');
            });

            Activity::log('Submitted a supply order to ' . $supplyorder->supplier->name);
        }
        return Redirect::action('SupplyOrderController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = IngredientSupplyOrder::find($id);
        Activity::log('Removed an ingredient from a supply order.');
        $ingredient->delete();
        return Redirect::back()->with('status','Supply order updated!');
    }
}
