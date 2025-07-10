@extends('layouts.admin')
@section('estados')
@section('content')
<div class="container">
    <br>
<form action="{{url(('/estados'))}}" method="post" enctype="multipart/form-data">
    @csrf
 <H1>Crear Estado</H1>
    @include('states.form', ['modo'=>'Crear'])
  </form>
</div>
@endsection