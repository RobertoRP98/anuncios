@extends('layouts.admin')
@section('municipios')
@section('content')


    <div class="container">
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif

        <div class="d-flex flex-wrap mt-3">

            <a href="{{ url('anuncios/create') }}" class="btn btn-lg btn-light border border-primary shadow-sm m-2 w-auto">
                Agregar Anuncio
            </a>

        </div>

        <div class="container">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Anuncio</th>
                        <th>Slug</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anuncios as $anuncio)
                        <tr>
                            <td> {{ $anuncio->id }} </td>
                            <td> {{ $anuncio->titulo }} </td>
                            <td> {{ $anuncio->slug }} </td>
                            <td> {{ $anuncio->starts_at }} </td>
                            <td> {{ $anuncio->ends_at }} </td>
                            <td>
                                <button class="btn btn-warning mb-2"> <a class="text-white"
                                        href="{{ route('anuncios.edit', $anuncio->slug) }}">
                                        Editar
                                    </a> </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $anuncios->links() }}
            </div>
        </div>
    </div>

@endsection
