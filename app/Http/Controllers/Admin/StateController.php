<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StateCreateRequest;
use App\Http\Requests\StateUpdateRequest;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states  = State::OrderBy('name', 'asc')->get();
        $title   = 'State list';
        $data    = compact('states', 'title');
        return view('admin.states.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'State Create';
        $data  = compact('title');
        return view('admin.states.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateCreateRequest $request)
    {
        State::create($request->only('name'));
        return redirect()->route('admin.states.index')->with('Sucess', 'State added success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state, $id)
    {
        $states    = State::find($id);
        $title     = 'State Edit';
        $data      = compact('states', 'title');
        return view('admin.states.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(StateUpdateRequest $request, State $state)
    {
        $state->update($request->validated());
        return redirect()->route('admin.states.index')->with('Sucess', 'State update success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state, $id)
    {
        State::find($id)->delete();
        return redirect()->back()->with('Success', 'State deleted successfully');
    }
}