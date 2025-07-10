@extends('layouts.admin')
@section('estados')
@section('content')
    <div class="container">
        <br>
        <form action="{{ route('estados.update', $state->slug) }}" method="POST">
            @csrf
            @method('PATCH')
            <H1>Editar Estado</H1>
            @include('states.form', ['modo' => 'Editar'])
        </form>
    </div>
@endsection
