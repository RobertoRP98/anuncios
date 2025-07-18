<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\State;
use App\Models\Anuncio;
use App\Models\Category;
use App\Models\Municipio;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAnuncioRequest;
use App\Http\Requests\UpdateAnuncioRequest;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anuncios = Anuncio::all();

        return view('anuncios.index', compact('anuncios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = State::all();
        $municipios = Municipio::all();
        $categorias = Category::all();
        $planes = Plan::all();
        $anuncio = new Anuncio();

        return view('anuncios.create', compact(['estados', 'municipios', 'categorias', 'anuncio','planes']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnuncioRequest $request)
    {
        $anuncio = new Anuncio();

        $anuncio->titulo = $request->titulo;
        $anuncio->slug = Str::slug($request->titulo);
        $anuncio->body = $request->body;
        $anuncio->user_id = Auth::user()->id;
        $anuncio->category_id = $request->category_id;
        $anuncio->state_id = $request->state_id;
        $anuncio->municipio_id = $request->municipio_id;
        

        return redirect()->route('anuncios.index')->with('message', 'Anuncio Creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anuncio $anuncio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anuncio $anuncio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnuncioRequest $request, Anuncio $anuncio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anuncio $anuncio)
    {
        //
    }
}
