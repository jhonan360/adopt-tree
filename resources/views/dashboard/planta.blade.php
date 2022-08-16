@extends('layouts.dashboard')
@section('contentBody')
    <style>
        #map_canvas {
            width: 900px;
            height: 500px;
        }
        #current {
            padding-top: 25px;
        }
    </style>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Planta</h1>
    </div>
    <div class="row" style="margin-bottom: 34px;">
        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-12">
            <img 
                @if (isset($planta->multimedia[0]))
                    @if(isset($planta->multimedia[0]->tipo) && $planta->multimedia[0]->tipo == 'imagen')
                        src="{{asset('images/multimedia/')}}{{$planta->multimedia[0]->nombre}}" 
                    @else
                        src="{{asset('images/multimedia/default.png')}}" 
                    @endif
                @else
                    src="{{asset('images/multimedia/default.png')}}" 
                @endif
                style="width: 100%;height: 100%;"
            >
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12">
            <section>
                <div id='map_canvas' style="width: 100%"></div>
            </section>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12">
            <table>
                <tbody>
                    <tr>
                        <td>Nombre:</td>
                        <td><b>{{$planta->nombre}}</b></td>
                    </tr>
                    <tr>
                        <td>Nombre comun:</td>
                        <td>{{$planta->nombrePlanta->nombre_comun}}</td>
                    </tr>
                    <tr>
                        <td>Nombre cientifico:</td>
                        <td>{{$planta->nombrePlanta->nombre_cientifico}}</td>
                    </tr>
                    <tr>
                        <td>Tipo de planta:</td>
                        <td>{{$planta->nombrePlanta->tipoPlanta->nombre}}</td>
                    </tr>
                    <tr>
                        <td>Clima:</td>
                        <td>{{$planta->nombrePlanta->clima->nombre}}</td>
                    </tr>
                    <tr>
                        <td>Fecha ingreso:</td>
                        <td>{{$planta->fecha_ingreso}}</td>
                    </tr>
                    <tr>
                        <td>Fecha adopcion:</td>
                        <td>{{$planta->fecha_adopcion}}</td>
                    </tr>
                    <tr>
                        <td>Mensaje:</td>
                        <td>{{$planta->mensaje}}</td>
                    </tr>
                </tbody>
            </table>
            @if(@Auth::user()->hasRole('administrador'))
                <h2>Cliente</h2>
                <table>
                    <tbody>
                        <tr>
                            <td>Nombres:</td>
                            <td><b>{{$planta->user->nombre}}</b></td>
                        </tr>
                        <tr>
                            <td>Apellidos:</td>
                            <td>{{$planta->user->apellido}}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{$planta->user->email}}</td>
                        </tr>
                        <tr>
                            <td>Telefono:</td>
                            <td>{{$planta->user->telefono}}</td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <div class="row">
        <div class=" @if (isset($planta->multimedia[0])) col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6 @else col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12  @endif">
            <h2>Bitacora</h2>
            <table class="table table-bordered" id="tabla">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha Realización</th>
                    <th scope="col">Hora Riego</th>
                    <th scope="col">Poda</th>
                    <th scope="col">Quimicos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planta->bitacoras as $key => $bitacora)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $bitacora->user->nombre }} {{ $bitacora->user->apellido }}</td>
                            <td>{{ $bitacora->created_at }}</td>
                            <td>{{ $bitacora->hora_riego ?? '' }}</td>
                            <td>{{ $bitacora->poda = 0 ? 'NO' : 'SI' }}</td>
                            <td>
                                @foreach($bitacora->quimicosHasBitacoras as $key => $qhb)
                                    <p style="font-size: 12px">
                                        {{ $qhb->cantidad  }} {{ $qhb->medida->nombre  }} de {{ $qhb->quimico->nombre  }}
                                    </p>
                                    <br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class=" @if (isset($planta->multimedia[0])) col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6 @else col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12  @endif">
            <div class="row">
                @foreach ($planta->multimedia as $multi)
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12">
                        <img src="{{asset('images/multimedia/')}}{{$multi->nombre}}"  class="foto-arbol">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFkOsu7Q8aSe7u6XLzAKHDqN7Bq8BcvNk&callback=initMap" async defer></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFkOsu7Q8aSe7u6XLzAKHDqN7Bq8BcvNk" async defer></script>
    {{-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> --}}
@endsection
@section('inScript')
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 18,
        center: new google.maps.LatLng({{$planta->latitud}}, {{$planta->longitud}}),
        mapTypeId: 'satellite'
    });

    var myMarker = new google.maps.Marker({
        position: new google.maps.LatLng({{ $planta->latitud }} , {{ $planta->longitud }} ),
    });

    map.setCenter(myMarker.position);
    myMarker.setMap(map);
@endsection