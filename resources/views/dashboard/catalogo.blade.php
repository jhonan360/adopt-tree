@extends('layouts.dashboard')
@section('contentBody')
    <style>

    </style>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Catalogo</h1>
    </div>
    <div class="row">
        @foreach($plantas as $key => $planta)
            <div class="col-6">
                <div class="card">
                    <div class="row">

                        <div class="col-6">
                            <img 
                                @if (isset($plantas->multimedia))
                                    @if($plantas->multimedia[0]->tipo == 'imagen')
                                        src="{{asset('images/multimedia/')}}{{$plantas->multimedia[0]->nombre}}" 
                                    @else
                                        src="{{asset('images/multimedia/default.png')}}" 
                                    @endif
                                @else
                                    src="{{asset('images/multimedia/default.png')}}" 
                                @endif
                                style="width: 100%;height: 100%;"
                            >
                        </div>
                        <div class="col-6">
                            <h4 class="text-center"><b>Adóptame</b></h4>
                            <h5><b>Nombre comun: </b> {{$planta->nombrePlanta->nombre_comun}}</h5>
                            <h5><b>Nombre cientifico: </b> {{$planta->nombrePlanta->nombre_cientifico}}</h5>
                            <h5><b>Tipo de planta: </b> {{$planta->nombrePlanta->tipoPlanta->nombre}}</h5>
                            <h5><b>Clima: </b> {{$planta->nombrePlanta->clima->nombre}}</h5>
                            <form action="{{route('adoptar')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-form-label">Nombre</label>
                                            <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                <input type="text" class="form-control " id="nombre" name="nombre" placeholder="Bautizame" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group row">
                                            <label for="mensaje" class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-form-label">Mensaje</label>
                                            <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                <textarea class="form-control" name="mensaje" id="mensaje"  rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="text-center" style="margin-bottom: 10px;">
                                    <button type="submit" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus-square"></i>
                                        </span>
                                        <span class="text">Adoptar</span>    
                                    </button>
                                </div>
                                <input type="text" id="idplantas" name="idplantas" value="{{$planta->idplantas}}" required readonly="true" style="display: none">
                            </form>
                        </div>
                    </div>
                    <!-- <div class="container_tree">
                    </div> -->
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('inScript')
@endsection