<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Support\Str;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = State::paginate(50);

        return view('states.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $state = new State();
        return view('states.create', compact('state'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        $state = new State();

        $state->name = $request->name;
        $state->slug = Str::slug($request->name);
        $state->save();

        return redirect()->route('estados.index')->with('message', 'Estado creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        return view('states.edit', compact('state'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {

        $state->name = $request->name;
        $state->slug = Str::slug($request->name);
        $state->save();

        return redirect()->route('estados.index')->with('message', 'Estado actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
    }
}
