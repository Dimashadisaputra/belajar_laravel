@extends('layout')
@section ('judul', 'biodata pengguna')

@section ('konten')
<div class="row justify-content-center mt-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong>Tabel bidata Penguna</strong>
                <a href="{{ url('biodata/tambahbiodata') }}" class="btn btn-primary float-right"> tambah data</a>
                <a href="{{ url('biodata/cetakbiodata') }}" class="btn btn-danger float-right"> cetak</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                @if (\Session::has('pesan_gagal'))
                    <div class="alert alert-danger alert-dismissible fade show mb-2">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ \Session::get('pesan_gagal') }}</strong>
                    </div>
                @endif
                @if (\Session::has('pesan_berhasil'))
                    <div class="alert alert-success alert-dismissible fade show mb-2">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ \Session::get('pesan_berhasil') }}</strong>
                    </div>
                @endif
                    <table class="table table-bordered mb-0">
                        <thead>
                            <th>ID</th>
                            <th>nama</th>
                            <th>Foto</th>
                            <th>age</th>
                            <th>bhirtday</th>
                            <th>no telpon</th>
                            <th>jenis</th>
                            <th>opsi</th>
                        </thead>
                        <tbody>
                            {{-- loping user --}}
                            @foreach ($users as $user)
                            @if ($user->user)
                            <tr>
                                <td>{{  $user->id }}</td>
                                <td>{{  $user->user->nama }}</td>
                                <td class="{{  $user->foto ? "" : 'text-danger' }}"><img src="images/{{ $user->foto }}" style="width:50px;height:50px;" ></td>
                                <td class="{{  $user->age ? "" : 'text-danger' }}">{{  $user->age ? $user->age : 'kosong' }}</td>
                                <td class="{{  $user->bhirtday ? "" : 'text-danger' }}">{{  $user->bhirtday ? $user->bhirtday : 'kosong' }}</td>
                                <td class="{{  $user->phone ? "" : 'text-danger' }}">{{  $user->phone ? $user->phone : 'kosong' }}</td>
                                <td class="{{  $user->gender ? "" : 'text-danger' }}">{{  $user->gender ? $user->gender : 'kosong' }}</td>
                                <td>
                                    <a href="{{ url('biodata/'. $user->id . '/editbiodata') }}">Ubah</a>
                                    <a href="{{ url('biodata/'. $user->id . '/hapusbiodata') }}">hapus</a>
                                    <a href="{{ url('biodata/'. $user->id . '/cetakbiodatauser') }}">cetak</a>
                                    {{-- <a href="{{ url('biodata/'. $user->id . '/detailbiodata') }}">detail</a> --}}
                                    <!-- Button trigger modal -->
                                    {{-- detai with API json --}}
                                    <button onclick="detail({{ $user->user_id }})" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        detailWithAPI
                                    </button>
                                    {{-- hapus with Api json--}}
                                    <button onclick="hapusbiodata({{ $user->id }})" type="button" class="btn btn-danger">
                                        HapusWithAPI 
                                    </button>

  
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    
                    @include('Biodata.modalBiodataApi')
                    {{-- hapusbiodata juga di dalem Biodata.detailmodal --}}

                    {{-- last modal --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- nambahin foto harus bikin 


    composer require intervention/image (diterminal)
    Intervention\Image\ImageServiceProvider::class (ditaro  config/app setelah $providers )
    use Image (use image di controllernya)
    'Image' => Intervention\Image\Facades\Image::class (ditaro di config/app juga di paling bawah) --}}


{{-- membuat PDF
    
    
    composer require barryvdh/laravel-dompdf (diterminal)
    use Barryvdh\DomPDF\Facade\Pdf; (diuse di contolller)
    
    --}}

    {{-- @section('script')
    <script type="text/javascript">
    function hapusbiodata(id){
        if (confirm("Are you sure?")) {
            $.ajax({
            type: 'GET',
            dataType:"json",
            url: '/api/hapusbiodata/'+id,
            success: function (result) {
                console.log(result) 
                // function reloadPage(){
            location.reload(true);
        // }
            }
        });
        } else{
            return alert('gagal hapus');
        }
    }
    
    </script>
    @endsection --}}
