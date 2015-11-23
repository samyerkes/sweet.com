<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Supplier;
use Redirect;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index', ['suppliers'=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new Supplier;
        $supplier->name = $request->Name;
        $supplier->email = $request->Email;
        $supplier->phone = $request->Phone;
        $supplier->address = $request->Address;
        $supplier->save();

        $request->session()->flash('status', 'Supplier information was successfully saved.');

        return Redirect::action('SupplierController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.show', ['supplier'=>$supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit', ['supplier'=>$supplier]);
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
        $supplier = Supplier::find($id);
        $supplier->name = $request->Name;
        $supplier->email = $request->Email;
        $supplier->phone = $request->Phone;
        $supplier->address = $request->Address;
        $supplier->save();

        $request->session()->flash('status', 'Supplier information was successfully updated.');

        return Redirect::action('SupplierController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return Redirect::back()->with('status','Supplier removed!');
    }
}
