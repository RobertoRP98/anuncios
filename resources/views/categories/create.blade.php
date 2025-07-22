@extends('layouts.admin')
@section('municipios')
@section('content')
<div class="container">
    <br>
<form action="{{url(('/categorias'))}}" method="post" enctype="multipart/form-data">
    @csrf
 <H1>Crear Categorias</H1>
    @include('categories.form', ['modo'=>'Crear'])
  </form>
</div>
@endsection