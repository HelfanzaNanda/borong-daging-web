@extends('layouts.main')

@section('title', 'Delivery Address')

@section('content')
<div class="gambo-Breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manajemen Pengiriman</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-group">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-dt">
                    <div class="user-img">
                        <img src="images/avatar/img-5.jpg" alt="">
                        <div class="img-add">
                            <input type="file" id="file">
                            <label for="file"><i class="uil uil-camera-plus"></i></label>
                        </div>
                    </div>
                    <h4>{{ $user->name }}</h4>
                    {{-- <p>{{ $user->phone }}<a href="#"><i class="uil uil-edit"></i></a></p> --}}
                    {{-- <div class="earn-points"><img src="images/Dollar.svg" alt="">Points : <span>20</span></div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container">
        <div class="row">
            <x-menu-user-login/>
            <div class="col-lg-9 col-md-8">
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tab">
                                <h4><i class="uil uil-box"></i>Manajemen Pengiriman</h4>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <a href="{{ url('/delivery-address/add') }}" class="btn btn-primary float-right my-3">Tambah</a>
                            <table class="table table-light">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Tempat</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Pin Point</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($addresses as $address)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $address->description }}</td>
                                            <td>{{ $address->address }}</td>
                                            <td><a href="{{ url('/delivery-address/'. $address->id. '/pin-point') }}" class="offer-link"><i class="uil uil-location-point"></i></a></td>
                                            <td>
                                                <a href="{{ url('/delivery-address/'. $address->id . '/edit') }}" class="btn btn-warning text-white"><i class="uil uil-edit-alt"></i></a>
                                                <a href="#" data-id="{{ $address->id }}" class="btn btn-delete btn-danger"><i class="uil uil-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"><x-empty-view-location/></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $addresses->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('additionalScript')
<script type="text/javascript">
     $(document).on('click', '.btn-delete', function(e){
        e.preventDefault()
        var id = $(this).data("id")
        var url = BASE_URL+'/delivery-address/'+id+'/delete';
       deleteConfirmation(url);
    });
</script>
@endsection