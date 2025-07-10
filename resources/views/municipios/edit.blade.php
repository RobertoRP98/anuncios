@extends('layouts.admin')
@section('municipios')
@section('content')
<div class="container">
    <br>
    <form action="{{ url('/municipios/' . $municipio->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}    
    <H1>Editar Municipio</H1>
    @include('municipios.form',['modo'=>'Editar'])
  </form>
</div>
@endsection