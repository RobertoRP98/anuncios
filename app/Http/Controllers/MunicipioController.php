<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Municipio;
use Illuminate\Support\Str;
use App\Http\Requests\StoreMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = Municipio::paginate(50);

        return view('municipios.index', compact(['municipios']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = State::all();

        return view ('municipios.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMunicipioRequest $request)
    {
        $municipio = new Municipio();

        $municipio->name = $request->name;
        $municipio->slug = Str::slug($request->name);
        $municipio->state_id = $request->state_id;
        $municipio->save();

        return redirect()->route('municipios.index')->with('message', 'Municipio Creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Municipio $municipio)
    {
        $estados = State::all();

        return view('municipios.edit', compact(['estados','municipio']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMunicipioRequest $request, Municipio $municipio)
    {
        $municipio->name = $request->name;
        $municipio->slug = Str::slug($request->name);
        $municipio->state_id = $request->state_id;
        $municipio->save();

        return redirect()->route('municipios.index')->with('message','Municipio actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municipio $municipio)
    {
        //
    }
}
