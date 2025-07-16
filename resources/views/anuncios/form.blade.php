 <!-- 2 column grid layout with text inputs for the first and last names -->
 @if ($errors->any())
     <div class="alert alert-danger" role="alert">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

 <br>
 <div class="container py-1">

     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="text-center">
                 <h4 class="form-label fw-bold" for="titulo">Titulo</h4>
                 <input type="text" id="titulo" name="titulo" value="{{ isset($anuncio) ? $anuncio->titulo : '' }}"
                     class="form-control text-center border border-secondary"
                     placeholder="Se solicita 5 donadores para el hospital general" />
             </div>
         </div>
     </div>

     <div class="row mb-4 col-md-12 pt-4">

         <div class="col-md-4">
             <div class="form-group">
                 <label class="form-labe fw-bold" for="category_id">Categoría</label>
                 <select id="category_id" name="category_id" class="form-control border border-secondary">
                     <option value="" disabled {{ !isset($anuncio) ? 'selected' : '' }}>Categoría</option>
                     @foreach ($categorias as $categoria)
                         <option value="{{ $categoria->id }}"
                             {{ (isset($anuncio) && $anuncio->category_id == $categoria->id) || old('category_id') == $categoria->id ? 'selected' : '' }}>
                             {{ $categoria->name }}
                         </option>
                     @endforeach
                 </select>
             </div>
         </div>

         <div class="col-md-4">
             <div class="form-group">
                 <label class="form-labe fw-bold" for="state_id">Estado</label>
                 <select id="state_id" name="state_id" class="form-control border border-secondary">
                     <option value="" disabled {{ !isset($anuncio) ? 'selected' : '' }}>Estado</option>
                     @foreach ($estados as $state)
                         <option value="{{ $state->id }}"
                             {{ (isset($anuncio) && $anuncio->state_id == $state->id) || old('state_id') == $state->id ? 'selected' : '' }}>
                             {{ $state->name }}
                         </option>
                     @endforeach
                 </select>
             </div>
         </div>

         <div class="col-md-4">
             <div class="form-group">
                 <label class="form-labe fw-bold" for="municipio_id">Municipios</label>
                 <select id="municipio_id" name="municipio_id" class="form-control border border-secondary">
                     <option value="" disabled {{ !isset($anuncio) ? 'selected' : '' }}>Municipio</option>
                     @foreach ($municipios as $municipio)
                         <option value="{{ $municipio->id }}"
                             {{ (isset($anuncio) && $anuncio->municipio_id == $municipio->id) || old('municipio_id') == $municipio->id ? 'selected' : '' }}>
                             {{ $municipio->name }}
                         </option>
                     @endforeach
                 </select>
             </div>
         </div>

     </div>



     <div class="row justify-content-center">
         <div class="col-md-12">
             <div class="form-outline">
                 <label class="form-label" for="body">Explicanos como ayudarte</label>
                 <textarea style="height: 65px" id="body" name="body" class="form-control border border-secondary"
                     placeholder="Solicitamos donadores O+ para nuestro paciente Juan N que esta en el hospital regional del estado pueden contactarme a mi whatsapp o mi numero 55-55-55-55-55. Muchas gracias">{{ old('body', $anuncio->body ?? '') }}</textarea>
             </div>
         </div>
     </div>

     <div class="row mb-4 col-md-12 pt-4">

         <div class="col-md-6 text-center">
             <label class="form-label d-block">Publicar durante 3 días</label>
             <h5 class="bg-light"> Sí </h5>
             <input type="hidden" name="is_active" value="1">
         </div>


         <div class="col-md-6 text-center mt-3">
             <button type="button" id="btnSeleccionarPlan" class="btn btn-primary" data-bs-toggle="modal"
                 data-bs-target="#modalPlanes">
                 Agregar más días de publicidad
             </button>
         </div>


         <!-- Modal -->
         <div class="modal fade" id="modalPlanes" tabindex="-1" aria-labelledby="modalPlanesLabel" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modalPlanesLabel">Selecciona un Plan</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                     </div>
                     <div class="modal-body text-center">
                         <div class="d-grid gap-2">
                             <button type="button" class="btn btn-success" data-plan-id="1">Plan Oro - 7 días + 3 dias
                                 de regalo -
                                 Prioridad mas alta</button>
                             <button type="button" class="btn btn-secondary" data-plan-id="2">Plan Plata - 5 días + 3 dias de regalo -
                                 Prioridad
                                 media</button>
                             <button type="button" class="btn btn-light" data-plan-id="3">Plan - Bronce 4 dias + 2 días -
                                 Proridad baja</button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <input type="hidden" name="plan_id" id="plan_id">

     </div>

     <div class="row justify-content-center mt-4">
         <div class="col-md-6 text-center">
             <button type="submit" class="btn btn-primary w-100">{{ $modo }} Publicación</button>
         </div>
     </div>

 </div>
