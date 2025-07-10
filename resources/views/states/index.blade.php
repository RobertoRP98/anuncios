@extends('layouts.admin')
@section('estados')
@section('content')



    <div class="container">
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif

        <div class="d-flex flex-wrap mt-3">

            <a href="{{ url('estados/create') }}" class="btn btn-lg btn-light border border-primary shadow-sm m-2 w-auto">
                Agregar Estado
            </a>

        </div>


        <div class="container">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estados as $state)
                        <tr>
                            <td> {{ $state->id }} </td>
                            <td> {{ $state->name }} </td>
                            <td> {{ $state->slug }} </td>
                            <td>
                                <button class="btn btn-warning mb-2"> <a class="text-white"
                                        href="{{ route('estados.edit', $state)}}">
                                        Editar
                                    </a> </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
             <div class="mt-4">
                {{ $estados->links() }}
            </div>
        </div>
    </div>

@endsection
