@extends('layouts.main')

@section('title', 'Add Delivery Address')

@section('content')
 <div class="gambo-Breadcrumb">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Add Delivery Address</li>
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
                        <h5 class="card-title text-white">Tambah Alamat</h5>
                    </div>
                    <div class="card-body">
                        <form id="add-form" action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Longitude</label>
                                        <input type="text" class="form-control" name="longitude" id="lng" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Latitude</label>
                                        <input type="text" class="form-control" name="latitude" id="lat" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Tempat</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <textarea name="address" id="address" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 147px;"></textarea>
                            </div>
                        
                            <button class="btn btn-success btn-block float-right">simpan</button>
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
    const defaultLocation = [106.82614247655886, -6.177229876413122]
    mapboxgl.accessToken = '{{ env('MAPBOX_KEY') }}';
    let map = new mapboxgl.Map({
        container: 'map',
        center : defaultLocation,
        zoom: 11.15,
        style: 'mapbox://styles/mapbox/streets-v11'
    });

    map.addControl(new mapboxgl.NavigationControl())
    map.on('click', (e) => {
        const lng = e.lngLat.lng
        const lat = e.lngLat.lat
        showMarker(lng, lat);
        $('#lng').val(lng)
        $('#lat').val(lat)
    })
    let markers = [];
    
    function showMarker(lng, lat){
        clearMarkers()
        let marker =  new mapboxgl.Marker().setLngLat([lng, lat]).addTo(map);
        markers.push(marker);
    }

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