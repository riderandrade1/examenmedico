@extends('layouts.admin')

@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nuevo Medico</h3>
            </div>
            <form action="{{ route('medico.store') }}" method="POST" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa El Nombre Del medico">
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="especialidad">Especialidad</label>
                                <input type="text" class="form-control" name="especialidad" id="especialidad" placeholder="Ingrese el código del especialidad">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="aniosservicio">aniosservicio</label>
                                <input type="number" class="form-control" name="aniosservicio" id="aniosservicio" placeholder="Ingrese el stock del aniosservicio">
                            </div>
                        </div>
                       
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="foto">foto</label>
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                    <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
