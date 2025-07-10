@extends('layouts.admin')
@section('municipios')
@section('content')
    <div class="container">
        <br>
        <form action="{{ route('categorias.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <H1>Editar Categoria</H1>
            @include('categories.form', ['modo' => 'Editar'])
        </form>
    </div>
@endsection
