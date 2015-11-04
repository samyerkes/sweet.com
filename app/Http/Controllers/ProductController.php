<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use Storage;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource for the public.
     *
     * @return \Illuminate\Http\Response
     */
    public function publicListing()
    {
        $products = Product::all();

        return view('products.public', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publicShow($id)
    {
        $product = Product::find($id);
        return view('products.item', ['product' => $product]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lowInventory()
    {
        $products = DB::table('products')
                ->where('inventory', '<=', 10)
                ->get();

        return view('products.low', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'Name' => 'required|max:25',
            'Price' => 'required',
            'Description' => 'required',
            'Image' => 'required',
            'Quantity' => 'required',
        ]);

        $product = new Product;
        $product->name = $request->Name;
        $product->price = $request->Price;
        $product->description = $request->Description;
        $product->inventory = $request->Quantity;
        $product->save();

        $extension = $request->file('Image')->getClientOriginalExtension();
        $imageName = 'product-' .$product->id . '.' . $extension;

        $request->file('Image')->move(
            base_path() . '/public/uploads/images/products/', $imageName
        );

        $request->session()->flash('status', 'Product was added.');

        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weekAgo = \Carbon\Carbon::now()->subDays(7);

        $product = Product::find($id);
        $orders = Order::all();
        return view('products.show', ['product' => $product, 'orders'=>$orders]);
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
        return view('products.edit', ['product' => $product]);
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
        $product->name = $request->Name;
        $product->price = $request->Price;
        $product->description = $request->Description;
        $product->inventory = $request->Quantity;
        $product->save();

        if(!empty($request->file('Image'))) {
            $extension = $request->file('Image')->getClientOriginalExtension();
            $imageName = 'product-' .$product->id . '.' . $extension;

            $request->file('Image')->move(
                base_path() . '/public/uploads/images/products/', $imageName
            );    
        }
        
        $request->session()->flash('status', 'Product was successfully updated.');

        $products = Product::all();
        return view('products.index', ['products' => $products]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return " destroyed";
    }
}
