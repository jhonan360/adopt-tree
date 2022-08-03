@extends('layouts.dashboard')
@section('contentBody')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quimicos</h1>
        
    </div>
        
    <form method=POST action="{{route('quimicosCreateUpdate')}}">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group row" @if( Route::currentRouteName() != 'quimicosShow') style="display:none" @endif">
                    <label for="idquimico" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Id</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control" id="idquimico" name="idquimico" value="{{ $quimico->idquimico ?? '' }}" @if( Route::currentRouteName() == 'quimicosShow') readonly="readonly @endif" >
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Nombre</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Escribe nombre del quimico" value="{{ $quimico->nombre ?? '' }}" required>
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="detalle" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Detalle</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <textarea class="form-control @error('detalle') is-invalid @enderror" name="detalle" id="detalle"  rows="3">{{ $quimico->detalle ?? '' }}</textarea>
                        @error('detalle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-4 ">
                <button class="btn btn-success btn-icon-split" type="submit" id="btnCrear" name="btnCrear" @if( Route::currentRouteName() == 'quimicosShow') disabled @endif >
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Crear quimico</span>    
                </button>
            </div>
            <div class="col-sm-4">
                    <button class="btn btn-warning btn-icon-split"  id="btnActualizar" name="btnActualizar" @if( Route::currentRouteName() != 'quimicosShow') disabled @endif>
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Actualizar</span>    
                    </button>
                </div>
            <div class="col-sm-4">
                    <a  href="{{route('quimicos')}}" class="btn btn-primary btn-icon-split"  >
                        <span class="icon text-white-50">
                            <i class="fas fa-dumpster"></i>
                        </span>
                        <span class="text">Limpiar</span>    
                    </a>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-12">
        <table class="table table-bordered" id="tabla">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Detalle</th>
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quimicos as $key => $qui)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $qui->nombre }}</td>
                        <td>{{ $qui->detalle }}</td>
                        <td>
                            <a href="/dashboard/quimicos/{{ $qui->idquimico }}"  class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Editar</span>    
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
