@extends('layouts.dashboard')
@section('contentBody')
    <style>
        #map_canvas {
            width: 980px;
            height: 500px;
        }
        #current {
            padding-top: 25px;
        }
    </style>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plantas</h1>
        
    </div>
        
    <form method=POST action="{{route('plantaCreateUpdate')}}">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group row" @if( Route::currentRouteName() != 'plantasShow') style="display:none" @endif">
                    <label for="idplantas" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Id</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control" id="idplantas" name="idplantas" value="{{ $planta->idplantas ?? '' }}" @if( Route::currentRouteName() == 'plantasShow') readonly="readonly @endif" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="idnombre" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Tipo Planta</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <select name="idnombre" id="idnombre" class="form-control @error('idnombre') is-invalid @enderror" required autocomplete="name" autofocus>
                            <option value="" disabled @if(old('idnombre') == '') selected @endif>Seleccione una opción</option>
                            @foreach($plantaPedia as $key => $pp)
                                <option value="{{ $pp->idnombre }}" @if(old('idnombre') == "{{ $pp->idnombre }}" OR (Route::currentRouteName() == 'plantasShow' AND "{{ $pp->idnombre}}" == "{{$planta->idnombre }}")) selected @endif>{{ $pp->nombre_comun }} - {{ $pp->nombre_cientifico }}</option>
                            @endforeach
                    </select>
                    @error('idnombre')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <section>
                    <div id='map_canvas' style="width: 100%"></div>
                    <div id="current">
                        @if( Route::currentRouteName() == 'plantasShow')
                            <p class="text-success">Marcador posicionado: Latitud actual: {{ round($planta->latitud, 3) ?? '' }} Longitud actual : {{ round($planta->longitud, 3) ?? '' }}</p>
                        @else
                            <h2 class="text-danger text-center">
                                Mueve el marcador...
                            </h2>
                        @endif
                        

                    </div>
                </section>
                
                <input type="text" id="latitud" name="latitud" style="display:none;" value="{{ $planta->latitud ?? '' }}" required>
                <input type="text" id="longitud" name="longitud" style="display:none;" value="{{ $planta->longitud ?? '' }}" required>
                
                
            <div class="form-group row text-center">
                <div class="col-sm-4 ">
                <button class="btn btn-success btn-icon-split" type="submit" id="btnCrear" name="btnCrear" @if( Route::currentRouteName() == 'plantasShow') disabled @endif >
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Crear planta</span>    
                </button>
            </div>

            <div class="col-sm-4">
                    <button class="btn btn-warning btn-icon-split"  id="btnActualizar" name="btnActualizar" @if( Route::currentRouteName() != 'plantasShow') disabled @endif>
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Actualizar</span>    
                    </button>
                </div>
            <div class="col-sm-4">
                    <a  href="{{route('plantas')}}" class="btn btn-primary btn-icon-split"  >
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
                <th scope="col">ID</th>
                <th scope="col">Nombre Comun</th>
                <th scope="col">Nombre Cientifico</th>
                <th scope="col">Latitud</th>
                <th scope="col">Longitud</th>
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plantas as $key => $ps)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $ps->idplantas }}</td>
                        <td>{{ $ps->nombrePlanta->nombre_comun }}</td>
                        <td>{{ $ps->nombrePlanta->nombre_cientifico }}</td>
                        <td>{{ round($ps->latitud, 3) }}</td>
                        <td>{{ round($ps->longitud, 3) }}</td>
                        <td>
                            <a href="/dashboard/plantas/{{ $ps->idnombre }}"  class="btn btn-warning btn-icon-split">
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

@section('script')
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFkOsu7Q8aSe7u6XLzAKHDqN7Bq8BcvNk&callback=initMap" async defer></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFkOsu7Q8aSe7u6XLzAKHDqN7Bq8BcvNk" async defer></script>
    {{-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> --}}
@endsection

@section('inScript')
    $(document).ready( function () {
        $('#tabla').DataTable();
    });

    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 18,
        center: new google.maps.LatLng(5.210657, -74.900989),
        mapTypeId: 'satellite'
        //mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var myMarker = new google.maps.Marker({
        position: new google.maps.LatLng({{ $planta->latitud ?? '5.210657' }} , {{ $planta->longitud ?? '-74.90098' }} ),
        draggable: true
    });
    
    google.maps.event.addListener(myMarker, 'dragend', function (evt) {
        document.getElementById('current').innerHTML = '<p class="text-success">Marcador posicionado: Latitud actual: ' + evt.latLng.lat().toFixed(3) + ' Longitud actual : ' + evt.latLng.lng().toFixed(3) + '</p>';
        $('#latitud').val(evt.latLng.lat());
        $('#longitud').val(evt.latLng.lng());
        console.log(evt.latLng.lat(), evt.latLng.lng());
        
    });
    
    google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
        document.getElementById('current').innerHTML = '<p>Marcador arrastrando actualmente ...</p>';
    });
    
    map.setCenter(myMarker.position);
    myMarker.setMap(map);
@endsection