@extends('layouts.main')

@section('title', 'Delivery Address')

@section('content')
 <div class="gambo-Breadcrumb">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Delivery Address</li>
                </ol>
             </nav>
          </div>
       </div>
    </div>
 </div>
 <div class="all-product-grid">
    <div class="container">
       <div class="row">
           <a href="{{ url('/delivery-address/add') }}" class="btn btn-primary mb-3">Tambah</a>
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
                            <td colspan="5"><x-empty-view/></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $addresses->links() }}
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