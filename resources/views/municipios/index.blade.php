@extends('layouts.admin')
@section('municipios')
@section('content')



    <div class="container">
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif

        <div class="d-flex flex-wrap mt-3">

            <a href="{{ url('municipios/create') }}" class="btn btn-lg btn-light border border-primary shadow-sm m-2 w-auto">
                Agregar Municipio
            </a>

        </div>


        <div class="container">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Municipio</th>
                        <th>Slug</th>
                        <th>Estado</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($municipios as $municipio)
                        <tr>
                            <td> {{ $municipio->id }} </td>
                            <td> {{ $municipio->name }} </td>
                            <td> {{ $municipio->slug }} </td>
                            <td> {{ $municipio->state->name }} </td>
                            <td>
                                <button class="btn btn-warning mb-2"> <a class="text-white"
                                        href="{{ route('municipios.edit', $municipio) }}">
                                        Editar
                                    </a> </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $municipios->links() }}
            </div>
        </div>
    </div>

@endsection
