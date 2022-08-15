@extends('layouts.index')
@section('content')
    @parent
    <div class="content-wrapper">
        <div class="greennature-content">

            <!-- Above Sidebar Section-->

            <!-- Sidebar With Content Section-->
            <div class="with-sidebar-wrapper">
                <section id="content-section-1">
                    {{-- <div class="greennature-parallax-wrapper greennature-background-image gdlr-show-all greennature-skin-dark-skin" id="greennature-parallax-wrapper-1" data-bgspeed="0" style=" padding-top: 280px; padding-bottom: 160px; "> --}}
                    <div style=" padding-top: 92px; padding-bottom: 0px; ">
                        <div id ="map" style="height: 63em; width: 100%; "> </div> 
                    </div>
                    <div class="clear"></div>
                </section>
            </div>
            <!-- Below Sidebar Section-->

        </div>
        <!-- greennature-content -->
        <div class="clear"></div>
    </div>
@endsection
@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFkOsu7Q8aSe7u6XLzAKHDqN7Bq8BcvNk&callback=initMap" async defer></script>
	
@endsection

@section('inScript')
    
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 5.210657, lng: -74.900989},
            zoom: 18,
            mapTypeId: 'satellite'
        });
        // marcadores
        var marker = new google.maps.Marker(
            {
                position: {lat:  5.210657, lng: -74.900989},
                map: map,
                title: 'Juan'
            }
        );
        var marker = new google.maps.Marker(
            {
                position: {lat:  5.210506, lng: -74.9052538},
                map: map,
                title: 'Leidi'
            }
        );
        var marker = new google.maps.Marker(
            {
                position: {lat:  5.21043, lng: -74.9038915},
                map: map,
                title: 'Yency'
            }
        );
        var marker = new google.maps.Marker(
            {
                position: {lat:  5.211252, lng: -74.9021845},
                map: map,
                title: 'Rodri'
            },
        );
    }
    
@endsection