@extends('layouts.admin')

@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Médicos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Médicos</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-xl-12">
                        <form action="{{ route('medico.index') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                        <input type="text" class="form-control" name="texto" placeholder="Buscar médicos" value="{{ $texto }}" aria-label="Buscar médicos" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                        <a href="{{ route('medico.create') }}" class="btn btn-success">Nuevo</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body"></div>
                    <!-- Table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Especialidad</th>
                                    <th>Años de Servicio</th>
                                    <th>Foto</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicos as $med)
                                <tr>
                                    <td>
                                        <a href="{{ route('medico.edit', $med->id_medico) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                        <!-- Button trigger for danger theme modal -->
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $med->id_medico }}"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td>{{ $med->nombre }}</td>
                                    <td>{{ $med->especialidad }}</td>
                                    <td>{{ $med->aniosservicio }}</td>
                                    <td><img src="/RiderVenta/public/imagenes/medico/{{ $med->foto }}" alt="{{ $med->nombre }}" width="70px" height="70px" class="img-thumbnail"></td>
                            
                                </tr>
                                @include('almacen.medico.modal')
                                @endforeach
                            </tbody>
                        </table>
                        {{ $medicos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
