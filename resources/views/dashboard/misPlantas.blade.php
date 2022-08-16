@extends('layouts.dashboard')
@section('contentBody')
    <style>

    </style>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mis Arboles</h1>
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
                            
                            <h4 class="text-center"><b>{{$planta->nombre}}</b> </h4><br>
                            <h5><b>Nombre comun: </b> {{$planta->nombrePlanta->nombre_comun}}</h5>
                            <h5><b>Nombre cientifico: </b> {{$planta->nombrePlanta->nombre_cientifico}}</h5>
                            <h5><b>Tipo de planta: </b> {{$planta->nombrePlanta->tipoPlanta->nombre}}</h5>
                            <h5><b>Clima: </b> {{$planta->nombrePlanta->clima->nombre}}</h5>
                            <h5><b>Mensaje: </b> {{$planta->mensaje}}</h5>
                            
                            <div class="text-center" style="margin-bottom: 10px; margin-top: 10px;">
                                <a type="submit" class="btn btn-info btn-icon-split" href="{{route('planta',$planta->idplantas)}}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <span class="text">Ver</span>    
                                </a>
                            </div>
                            
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