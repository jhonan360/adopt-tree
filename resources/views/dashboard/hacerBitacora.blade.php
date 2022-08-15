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
        <h1 class="h3 mb-0 text-gray-800">Hacer Bitacora</h1>
        
    </div>
    <form method=POST action="">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group row">
                    <label for="idplantas" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Id Planta</label>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <input type="text" class="form-control" id="idplantas" name="idplantas" value="{{ $planta->idplantas ?? '' }}" @if( Route::currentRouteName() == 'hacerBitacoraShow') readonly="readonly @endif" required>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <button class="btn btn-primary btn-icon-split" type="submit" id="btnBuscar" name="btnBuscar" onclick="buscarPlanta()">
                            <span class="icon text-white-50">
                                <i class="fas fa-search"></i>
                            </span>
                            <span class="text">Buscar</span>    
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>    
    <form action="{{route('hacerBitacoraCreate')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-6">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="check-time" id="check-time" name="check-time">
                                <label class="form-check-label" for="check-time">
                                    Hora Riego
                                </label>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <input class="timepicker text-center" type="text" name="tiempoRiego" id="tiempoRiego" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="check-poda" id="check-poda" name="check-poda">
                                <label class="form-check-label check-poda" for="check-poda">
                                    ¿Fue podado? NO
                                </label>
                            </div>
                        </div>
                    </div>
                    @if($planta != null)
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <section>
                                <div id='map_canvas' style="width: 100%"></div>
                                <div id="current">
                                    @if( Route::currentRouteName() == 'hacerBitacoraShow')
                                        <div id="mensajeMapa">
                                            <p class="text-success">Marcador posicionado: Latitud actual: {{ round($planta->latitud, 3) ?? '' }} Longitud actual : {{ round($planta->longitud, 3) ?? '' }}</p>
                                        </div>
                                        <p>Puede modificar la posición si lo desea.</p>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center" style="top:3px;">
                                            <button class="btn btn-success btn-icon-split" type="button" id="btnEncontrarMe" name="btnEncontrarMe" onclick="findMe()">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                                <span class="text">Encuentrame</span>    
                                            </button>
                                        </div>
                                    @else
                                        <h2 class="text-danger text-center">
                                            Mueve el marcador...
                                        </h2>
                                    @endif            
                                </div>
                            </section>
                        </div>
                    @endif
                </div>
                <input type="text" id="latitud" name="latitud" style="display:none;" value="{{ $planta->latitud ?? '' }}" required>
                <input type="text" id="longitud" name="longitud" style="display:none;" value="{{ $planta->longitud ?? '' }}" required>
                <input type="text" id="quimicosBitacora" name="quimicosBitacora" style="display:none;" value="">
                <input type="text" class="form-control" id="idplantas" name="idplantas" style="display:none;" value="{{ $planta->idplantas ?? '' }}" required>
            </div>
        
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-6">
                <table class="table" id="tablaQuimicos" name="tablaQuimicos">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Medida</th>
                            <th scope="col">Quimico</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                
                    
                <div class="form-group row">
                    <label for="cantidad" class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-form-label">Cantidad</label>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" value="" required>
                    </div>
                    <label for="medida" class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-form-label">Medidas</label>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <select name="medida" id="medida" class="form-control" required autocomplete="medida" autofocus>
                            <option value="" disabled selected>Seleccione una medida</option>
                            @foreach($medidas as $key => $medida)
                                <option value="{{ $medida->idmedidas }}">{{ $medida->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="quimico" class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-form-label">Quimicos</label>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <select name="quimico" id="quimico" class="form-control " required autocomplete="quimico" autofocus>
                            <option value="" disabled selected>Seleccione un quimico</option>
                            @foreach($quimicos as $key => $quimico)
                                <option value="{{ $quimico->idquimico }}">{{ $quimico->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center" style="top:3px;">
                        <button class="btn btn-success btn-icon-split" type="submit" id="btnAgregar" name="btnAgregar" @if( Route::currentRouteName() != 'hacerBitacoraShow') disabled @endif onclick="agregarQuimico()">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Agregar</span>    
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
        
            <div class="form-group text-center">
                <div class="col-12 ">
                    <button class="btn btn-success btn-icon-split" type="submit" id="btnCrear" name="btnCrear" @if( Route::currentRouteName() != 'hacerBitacoraShow') disabled @endif >
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Guardar Bitacora</span>    
                    </button>
                </div>
            </div>
        
    </form>
    <hr>
@endsection

@section('script')
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFkOsu7Q8aSe7u6XLzAKHDqN7Bq8BcvNk&callback=initMap" async defer></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFkOsu7Q8aSe7u6XLzAKHDqN7Bq8BcvNk" async defer></script>
    {{-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> --}}
@endsection

@section('inScript')

    var geo = navigator.geolocation;
    var arrayQuimicos = [];

    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };
    
    function success(pos) {
        var crd = pos.coords;
    
        console.log('Your current position is:');
        console.log('Latitude : ' + crd.latitude);
        console.log('Longitude: ' + crd.longitude);
        console.log('More or less ' + crd.accuracy + ' meters.');
        document.getElementById('mensajeMapa').innerHTML = '<p class="text-success">Marcador posicionado: Latitud actual: ' + crd.latitude.toFixed(3) + ' Longitud actual : ' + crd.longitude.toFixed(3) + '</p>';
        $('#latitud').val(crd.latitude);
        $('#longitud').val(crd.longitude);
        
        var myMarker = new google.maps.Marker({
            position: new google.maps.LatLng(crd.latitude , crd.longitude ),
            draggable: true
        });

        map.setCenter(myMarker.position);
        myMarker.setMap(map);
    };
    
    function error(err) {
        console.warn('ERROR(' + err.code + '): ' + err.message);
    };
    
    function agregarQuimico(){
        event.preventDefault();
        var cantidad = $('#cantidad').val();
        var medida = $('#medida').val();
        var quimico = $('#quimico').val();
        console.log(cantidad,medida,quimico);
        //$("<tr><td>Test Row Append</td></tr>").appendto("#test>tbody");
        var nombreQuimico = $('select[id="quimico"] option:selected').text();
        var nombreMedida = $('select[id="medida"] option:selected').text();
        console.log(cantidad , medida , quimico );
        if (cantidad != "" && medida != null && quimico != null){
            var tmp = {'cantidad':cantidad, 'idquimico': quimico, 'idmedidas': medida, 'nombreQuimico': nombreQuimico, 'nombreMedida': nombreMedida };
            console.log(tmp);
            arrayQuimicos.push(tmp);
            pintarTablaQuimicos();
            $('#quimicosBitacora').val(JSON.stringify(arrayQuimicos));
        }else{
            alert("Los campos son oblogatorios");
        }
    }

    function pintarTablaQuimicos(){
        eliminarFilasTabla();
        let contador = 1;
        var table = document.getElementById('tablaQuimicos');
        for (let index = 0; index < arrayQuimicos.length; index++) {
            tbody  = '<tr><th scope="row">'+(contador)+'</th>';
            tbody += '<td>'+arrayQuimicos[index].cantidad+'</td>'
            tbody +=  '<td>'+arrayQuimicos[index].nombreMedida+'</td>'
            tbody +=  '<td>'+arrayQuimicos[index].nombreQuimico+'</td>'

            $("#tablaQuimicos>tbody").append(tbody);
            ++contador;
        }
    }

    function eliminarFilasTabla(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tablaQuimicos');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function findMe(){
        navigator.geolocation.getCurrentPosition(success, error, options);
    }

    function buscarPlanta(){   
        event.preventDefault()
        var id = $('#idplantas').val();
        if(id != ''){
            window.location.replace("{{route('hacerBitacora')}}/" + id);
        }
    }    

    $(document).ready( function () {
        
        $('#tiempoRiego').timepicker({
            timeFormat: 'h:mm p',
            interval: 10,
            minTime: '5:00 am',
            maxTime: '8:00 pm',
            startTime: '10:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });

        $('#tabla').DataTable();    

        $('#check-time').change(function(){
            if ($(this).is(':checked')) {
                $('#tiempoRiego').prop('disabled', false);
            }else{
                $('#tiempoRiego').prop('disabled', true).val('');
            }
        });

        $('#check-poda').change(function(){
            if ($(this).is(':checked')) {
                $('.check-poda').text('¿Fue podado? SI');
                //$('#check-poda').val('true');
            }else{
                $('.check-poda').text('¿Fue podado? NO');
                //$('#check-poda').val('false');
            }
        });
    });

    @if($planta != null)
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
            document.getElementById('mensajeMapa').innerHTML = '<p class="text-success">Marcador posicionado: Latitud actual: ' + evt.latLng.lat().toFixed(3) + ' Longitud actual : ' + evt.latLng.lng().toFixed(3) + '</p>';
            $('#latitud').val(evt.latLng.lat());
            $('#longitud').val(evt.latLng.lng());
            console.log(evt.latLng.lat(), evt.latLng.lng());
            
        });
        
        google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
            document.getElementById('current').innerHTML = '<p>Marcador arrastrando actualmente ...</p>';
        });
        
        map.setCenter(myMarker.position);
        myMarker.setMap(map);
    @endif
@endsection