<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use Activity;
use Redirect;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pages = Page::all();
      return view('pages.index',['pages'=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $page = new Page;
      $page->name = $request->name;
      $page->slug = $request->slug;
      $page->order = $request->order;
      $page->content = $request->Description;
      $page->save();

      Activity::log('Added a new page, ' . $page->name);

      $request->session()->flash('status', 'Page was added.');

      return Redirect::action('PagesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $page = Page::where('slug', $slug)->first();
      return view('pages.show', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $page = Page::find($id);

      return view('pages.edit', ['page' => $page]);
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
      $page = Page::find($id);
      $page->name = $request->name;
      $page->slug = $request->slug;
      $page->order = $request->order;
      $page->content = $request->Description;
      $page->save();

      Activity::log('Updated the ' . $page->name . ' page.');

      $request->session()->flash('status', 'Page was successfully updated.');

      return Redirect::action('PagesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $page = Page::find($id);

      Activity::log('Deleted the ' . $page->name . ' page.');

      $page->delete();

      return Redirect::action('PagesController@index')->with('status', 'Page was successfully deleted.');
    }
}
