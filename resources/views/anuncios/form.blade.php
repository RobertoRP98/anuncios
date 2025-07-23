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


         <div class="col-md-5 text-center mt-3">
             <div class="mb-3">
                 <label for="plan_id" class="form-label">Ver planes (opcional)</label>

                 <select name="plan_id" id="plan_id" class="form-select border border-secondary">
                     <option class="text-center" value="">Ver planes</option>
                     @foreach ($planes as $plan)
                         <option value="{{ $plan->id }}" @if (old('plan_id') == $plan->id) selected @endif
                             @class([
                                 'bg-warning text-dark' => $plan->id == 1, // Oro
                                 'bg-secondary text-white' => $plan->id == 2, // Plata
                                 'bg-light text-dark' => $plan->id == 3, // Bronce
                             ])>
                            {{ $plan->descripcion }}
                         </option>
                     @endforeach
                     <option class="text-center" value="">No deseo publicarme más días (publicación básica)
                     </option>
                 </select>

             </div>
         </div>

        @if(old('plan_id'))
    <div class="text-center mt-4">
        <p class="text-success fw-bold">Has seleccionado un plan premium</p>
        <p class="text-muted">Podrás pagar en el siguiente paso</p>
    </div>
@endif


     </div>

     <div class="row justify-content-center mt-4">
         <div class="col-md-6 text-center">
             <button type="submit" class="btn btn-primary w-100">{{ $modo }} Publicación</button>
         </div>
     </div>

 </div>
