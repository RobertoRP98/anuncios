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
 <div class="row mb-4 col-md-3">
   <div class="col">
     <div data-mdb-input-init class="form-outline">
      <input type="text" id="name" name="name" value="{{ isset($municipio) ? $municipio->name : '' }}" class="form-control "  placeholder="Centro" />
      <label class="form-label" for="name">Municipio</label>
     </div>
   </div>
 </div>

    <div class="col-md-2">
         <div class="form-outline">
             <select id="state_id" name="state_id" class="form-control">
                 <option value="" {{ old('state_id', $municipio->state_id ?? '') == '' ? 'selected' : '' }}>
                     ESTADO</option>
                 @foreach ($estados as $estado)
                     <option value="{{ $estado->id }}"
                         {{ old('state_id', $municipio->state_id ?? '') == $estado->id ? 'selected' : '' }}>
                         {{ $estado->name }}
                     </option>
                 @endforeach
             </select>
             <label class="form-label" for="state_id">&nbsp;Estado</label>

         </div>
     </div>


 <!-- Submit button -->
 <button type="submit" class="btn btn-primary btn-block mb-4 m-2">{{$modo}} Municipio</button>

 <button type="button" class="btn btn-warning btn-block mb-3"> <a class="text-white" href="{{ url('/municipios') }}">
    Regresar
</a> </button> 