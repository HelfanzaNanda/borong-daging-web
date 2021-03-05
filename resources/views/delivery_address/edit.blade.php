@extends('layouts.main')

@section('title', 'Update Delivery Address')

@section('content')
 <div class="gambo-Breadcrumb">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Update Delivery Address</li>
                </ol>
             </nav>
          </div>
       </div>
    </div>
 </div>
 <div class="all-product-grid">
    <div class="container">
       <div class="row">
           <div class="col-md-8">
               <div class="card">
                   <div class="card-body">
                        <div id='map' style='height: 60vh;'></div>
                   </div>
               </div>
           </div>
           <div class="col-md-4">
                <div class="card">
                    <div class="card-header" style="background-color: #f55d2c">
                        <h5 class="card-title text-white">Update Alamat</h5>
                    </div>
                    <div class="card-body">
                        <form id="add-form" action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Longitude</label>
                                        <input type="hidden" name="id"  value="{{ $address->id }}"/>
                                        <input type="text" class="form-control" name="longitude" id="lng" readonly
                                        value="{{ $address->longitude }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Latitude</label>
                                        <input type="text" class="form-control" name="latitude" id="lat" readonly
                                        value="{{ $address->latitude }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Tempat</label>
                                <input type="text" class="form-control" name="description"
                                value="{{ $address->description }}">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <textarea name="address" id="address" class="form-control" 
                                style="margin-top: 0px; margin-bottom: 0px; height: 147px;">{{ $address->address }}</textarea>
                            </div>
                        
                            <button class="btn btn-success btn-block float-right">Update</button>
                        </form>
                    </div>
                </div>
           </div>
       </div>
    </div>
 </div>
@endsection

@section('additionalScript')
<script>
    const defaultLocation = ['{{ $address->longitude }}', '{{ $address->latitude }}']
    mapboxgl.accessToken = '{{ env('MAPBOX_KEY') }}';
    let map = new mapboxgl.Map({
        container: 'map',
        center : defaultLocation,
        zoom: 11.15,
        style: 'mapbox://styles/mapbox/streets-v11'
    });

     //location user
    let geoLocate = new mapboxgl.GeolocateControl();
    map.addControl(geoLocate, 'bottom-right');
    geoLocate.on('geolocate', function(e) {
        map.flyTo({
            center:[e.coords.longitude, e.coords.latitude], 
            zoom:16 //set zoom 
        });
    });

     //search
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        marker: false,
        mapboxgl: mapboxgl
    });
    map.addControl(geocoder, 'top-left');

    //navigasi control
    map.addControl(new mapboxgl.NavigationControl())

    $(document).ready(function() {
        const lng = '{{ $address->longitude }}'
        const lat = '{{ $address->latitude }}'
        showMarker(lng, lat)
    })

    //map click
    map.on('click', (e) => {
        const lng = e.lngLat.lng
        const lat = e.lngLat.lat
        showMarker(lng, lat)
        setLatLngView(lng, lat)
    })

    let markers = [];
    let marker = new mapboxgl.Marker({draggable: true});

    //show marker
    function showMarker(lng, lat){
        clearMarkers()
        marker.setLngLat([lng, lat]).addTo(map);
        markers.push(marker);
    }

    // marker draggable
    function onDragEnd() {
        var lngLat = marker.getLngLat();
        setLatLngView(lngLat.lng, lngLat.lat)
    }
    marker.on('dragend', onDragEnd);

    //set lnglat
    function setLatLngView(lng, lat){
        $('#lng').val(lng)
        $('#lat').val(lat)
    }

    //remove marker
    function clearMarkers(){
        markers.forEach((marker) => marker.remove());
        markers = [];
    }

    $('form#add-form').submit( async function( e ) {
        e.preventDefault();
        let form_data = new FormData( this );
        let url = BASE_URL+'/delivery-address';
        let response = await createOrUpdate(url, form_data);
        if(response.status == 'success') {
            alertSuccess(response.message, response.url);
        } else {
            if (response.status == '422') {
                alertError('data harus di isi semua');
            }
        }
    });
</script>
@endsection