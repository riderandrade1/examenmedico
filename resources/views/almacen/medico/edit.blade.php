@extends('layouts.admin')
@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
           <div class="card-header">
              <h3 class="card-title">Editar medico: {{ $medico->nombre }}</h3>
           </div>
        <form action="{{ route('medico.update', $medico->id_medico) }}" method="POST" enctype="multipart/form-data" id="myForm">
         @csrf
         @method('PUT')
         <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{ $medico->nombre }}" placeholder="Ingrese el nombre del medico">
            </div>
          </div>
                  
               <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="especialidad">especialidad</label>
              <input type="text" class="form-control" name="especialidad" value="{{ $medico->especialidad }}" placeholder="Ingrese la especialidad del medico">
            </div>
          </div>
                <div class="col-md-6 col-12">
                 <div class="form-group">
                  <label for="aniosservicio">aniosservicio</label>
                   <input type="number" class="form-control" name="aniosservicio" value="{{ $medico->aniosservicio }}" placeholder="Ingrese el stock del medico">
            </div>
          </div>

                <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="foto">foto</label>
              <input type="file" class="form-control" id="foto" name="foto">
              @if ($medico->foto != "")
              <img src="/RiderVenta/public/imagenes/medico/{{ $medico->foto }}" alt="{{ $medico->nombre }}" width="70px" height="70px" class="img-thumbnail">
              @endif
            </div>
          </div>
        </div>
      </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                   <button type="submit" class="btn btn-danger me-1 mb-1">Cancelar</button>
            </div>
        </div>
     </div>
    </form>
  </div>
    </div> 

@endsection