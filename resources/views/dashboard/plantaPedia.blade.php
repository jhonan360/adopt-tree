@extends('layouts.dashboard')
@section('contentBody')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Planta Pedia</h1>
        
    </div>
        
    <form method=POST action="{{route('plantaPediaCreateUpdate')}}">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group row" @if( Route::currentRouteName() != 'plantaPediaShow') style="display:none" @endif">
                    <label for="idnombre" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Id</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control" id="idnombre" name="idnombre" value="{{ $plantaPedia->idnombre ?? '' }}" @if( Route::currentRouteName() == 'plantaPediaShow') readonly="readonly @endif" >
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="nombre_comun" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Nombre Comun</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control @error('nombre_comun') is-invalid @enderror" id="nombre_comun" name="nombre_comun" placeholder="Escribe nombre comun de la planta" value="{{ $plantaPedia->nombre_comun ?? '' }}" required>
                        @error('nombre_comun')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nombre_cientifico" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Nombre Cientifico</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control @error('nombre_cientifico') is-invalid @enderror" id="nombre_cientifico" name="nombre_cientifico" placeholder="Escribe nombre cientifico de la planta" value="{{ $plantaPedia->nombre_cientifico ?? '' }}" required>
                        @error('nombre_cientifico')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="idtipo_planta" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Tipo Planta</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <select name="idtipo_planta" id="idtipo_planta" class="form-control @error('idtipo_planta') is-invalid @enderror" required autocomplete="name" autofocus>
                            <option value="" disabled @if(old('idtipo_planta') == '') selected @endif>Seleccione una opción</option>
                            @foreach($tiposPlantas as $key => $tps)
                                <option value="{{ $tps->idtipo_planta }}" @if(old('idtipo_planta') == "{{ $tps->idtipo_planta }}" OR (Route::currentRouteName() == 'plantaPediaShow' AND "{{ $tps->idtipo_planta}}" == "{{$plantaPedia->idtipo_planta }}")) selected @endif>{{ $tps->nombre }}</option>
                            @endforeach
                        </select>
                        @error('idtipo_planta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            <div class="form-group row">
                <label for="idclimas" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Clima</label>
                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <select name="idclimas" id="idclimas" class="form-control @error('idclimas') is-invalid @enderror" required autocomplete="name" autofocus>
                        <option value="" disabled @if(old('idclimas') == '') selected @endif>Seleccione una opción</option>
                        @foreach($climas as $key => $cli)
                            <option value="{{ $cli->idclimas }}" @if(old('idclimas') == "{{ $cli->idclimas}}" OR (Route::currentRouteName() == 'plantaPediaShow' AND "{{ $cli->idclimas}}" == "{{$plantaPedia->idclimas}}") ) selected @endif>{{ $cli->nombre }}</option>
                        @endforeach
                    </select>
                    @error('idclimas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="detalle" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Detalle</label>
                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <textarea class="form-control @error('detalle') is-invalid @enderror" name="detalle" id="detalle"  rows="3">{{ $plantaPedia->detalle ?? '' }}</textarea>
                    @error('detalle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-sm-4 ">
                <button class="btn btn-success btn-icon-split" type="submit" id="btnCrear" name="btnCrear" @if( Route::currentRouteName() == 'plantaPediaShow') disabled @endif >
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Crear registro</span>    
                </button>
            </div>
            <div class="col-sm-4">
                    <button class="btn btn-warning btn-icon-split"  id="btnActualizar" name="btnActualizar" @if( Route::currentRouteName() != 'plantaPediaShow') disabled @endif>
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Actualizar</span>    
                    </button>
                </div>
            <div class="col-sm-4">
                    <a  href="{{route('plantaPedia')}}" class="btn btn-primary btn-icon-split"  >
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
                <th scope="col">Nombre Comun</th>
                <th scope="col">Nombre Cientifico</th>
                <th scope="col">Tipo Planta</th>
                <th scope="col">Clima</th>
                <th scope="col">Detalle</th>
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plantaPedias as $key => $pps)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pps->nombre_comun }}</td>
                        <td>{{ $pps->nombre_cientifico }}</td>
                        <td>{{ $pps->tipoPlanta->nombre }}</td>
                        <td>{{ $pps->clima->nombre }}</td>
                        <td>{{ $pps->detalle }}</td>
                        <td>
                            <a href="/dashboard/plantaPedia/{{ $pps->idnombre }}"  class="btn btn-warning btn-icon-split">
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
