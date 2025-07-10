@extends('layouts.admin')
@section('municipios')
@section('content')
<div class="container">
    <br>
<form action="{{url(('/municipios'))}}" method="post" enctype="multipart/form-data">
    @csrf
 <H1>Crear Municipio</H1>
    @include('municipios.form', ['modo'=>'Crear'])
  </form>
</div>
@endsection