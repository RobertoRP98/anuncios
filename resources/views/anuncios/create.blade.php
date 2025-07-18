@extends('layouts.user')
@section('anuncios')
@section('content')
<div class="container">
    <br>
<form action="{{url(('/anuncios'))}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="text-center">
 <H2 class="text-danger-emphasis">Crear Anuncio</H2>
 </div>
    @include('anuncios.form', ['modo'=>'Crear'])
  </form>
</div>
@endsection


