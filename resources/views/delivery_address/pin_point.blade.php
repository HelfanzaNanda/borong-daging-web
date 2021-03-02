@extends('layouts.main')

@section('title', 'Pin Point')

@section('content')
 <div class="gambo-Breadcrumb">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Pin Point</li>
                </ol>
             </nav>
          </div>
       </div>
    </div>
 </div>
 <div class="all-product-grid">
    <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-body">
                        <div id='map' style='height: 60vh;'></div>
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

    map.addControl(new mapboxgl.NavigationControl())

    $(document).ready(function() {
        const lng = '{{ $address->longitude }}'
        const lat = '{{ $address->latitude }}'
        showMarker(lng, lat)
    })

    let markers = [];
    function showMarker(lng, lat){
        let marker =  new mapboxgl.Marker().setLngLat([lng, lat]).addTo(map);
        markers.push(marker);
    }

</script>
@endsection