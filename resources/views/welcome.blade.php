@extends('layout')
@section ('judul', 'Home page')

@section ('konten')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h4>
            Halo, {{ \Session::get('user')->email }}
            
        </h4>
    </div>
    {{-- <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong>Tabel Penguna</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <th>ID</th>
                            <th>nama</th>
                            <th>EMAIL</th>
                            <th>OPSI</th>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                            <tr>
                                <td>{{  $user->id }}</td>
                                <td>{{  $user->nama }}</td>
                                <td>{{  $user->email }}</td>
                                <td>
                                    <a href="{{ url('user/'. $user->id . '/edit') }}">edit</a>
                                    <a href="{{ url('user/'. $user->id . '/hapus') }}">hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
