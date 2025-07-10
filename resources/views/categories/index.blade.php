@extends('layouts.admin')
@section('municipios')
@section('content')



    <div class="container">
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif

        <div class="d-flex flex-wrap mt-3">

            <a href="{{ url('categorias/create') }}" class="btn btn-lg btn-light border border-primary shadow-sm m-2 w-auto">
                Agregar Categoria
            </a>

        </div>


        <div class="container">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Categoria</th>
                        <th>Slug</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categoria)
                        <tr>
                            <td> {{ $categoria->id }} </td>
                            <td> {{ $categoria->name }} </td>
                            <td> {{ $categoria->slug }} </td>
                            <td>
                                <button class="btn btn-warning mb-2"> <a class="text-white"
                                        href="{{ route('categorias.edit', $categoria->slug) }}">
                                        Editar
                                    </a> </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>

@endsection
