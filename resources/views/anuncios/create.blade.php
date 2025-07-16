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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalElement = document.getElementById('modalPlanes');
        let modalInstance = bootstrap.Modal.getInstance(modalElement);
        if (!modalInstance) {
            modalInstance = new bootstrap.Modal(modalElement);
        }

        document.querySelectorAll('[data-plan-id]').forEach(button => {
            button.addEventListener('click', function () {
                const planId = this.getAttribute('data-plan-id');
                const planText = this.textContent.trim();

                // Set hidden input value
                document.getElementById('plan_id').value = planId;

                // Change main button text
                const botonPrincipal = document.getElementById('btnSeleccionarPlan');
                botonPrincipal.textContent = `Seleccionado: ${planText}`;

                // Hide modal
                modalInstance.hide();
            });
        });
    });
</script>

