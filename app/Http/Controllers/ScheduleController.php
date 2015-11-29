<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Shift;
use App\UserShift;
use DB;
use Redirect;
use Carbon\Carbon;
use Activity;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startDate = Carbon::now()->format('Y-m-d');
        $endDate = Carbon::now()->addWeek()->format('Y-m-d');
        $shift = Shift::whereBetween('date', [$startDate, $endDate])->get();
        // $users = Shift::find($shift->id)->users()->get();

        return view('shifts.index', ['shift' => $shift]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $users = User::where('role_id', '<', '3')->get();
        $shift = Shift::find($id);
        return view('shifts.create', ['users' => $users, 'shift' => $shift]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $shift = UserShift::find($id);
        $shift->user_id = $request->user;
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        $shift->save();

        Activity::log('Added ' . $shift->users->fname . ' ' . $shift->users->lname . 'to the shift.');

        $request->session()->flash('status', 'Employee was successfully saved.');

        return Redirect::action('ScheduleController@index');
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
        $users = User::where('role_id', '<', '3')->get();
        $shift = Shift::find($id);
        return view('shifts.edit', ['users' => $users, 'shift' => $shift]);
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
        $shift = new UserShift;
        $shift->shift_id = $request->id;
        $shift->user_id = $request->user;
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        $shift->save();

        Activity::log('Added an employee to a shift.');

        $request->session()->flash('status', 'Employee was successfully saved.');

        return Redirect::action('ScheduleController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = UserShift::find($id);
        Activity::log('Removed an employee from a shift.');
        $shift->delete();
        return Redirect::action('ScheduleController@index')->with('status', 'Employee shift was successfully updated.');
    }
}
