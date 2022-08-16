@extends('layouts.dashboard')
@section('contentBody')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Adopciones</h1>
        
    </div>
    
    <div class="row">
        <div class="col-12">
        <table class="table table-bordered" id="tabla">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Nombre Planta</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">Fecha Adopcion</th>
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plantas as $key => $planta)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $planta->idplantas }}</td>
                        <td>{{ $planta->nombrePlanta->nombre_comun }} {{ $planta->nombrePlanta->nombre_cientifico }}</td>
                        <td>{{ $planta->nombre }}</td>
                        <td>{{ $planta->user->nombre }} {{ $planta->user->apellido }}</td>
                        <td>{{ $planta->fecha_adopcion }}</td>
                        <td>
                            <a href="{{route('planta',$planta->idplantas)}}"  class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-eye"></i>
                                </span>
                                <span class="text">Ver</span>    
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
@section('inScript')
    $(document).ready( function () {
        $('#tabla').DataTable();
    });
@endsection
