@extends('layout')
@section ('judul', 'User')

@section ('konten')
<div class="row justify-content-center mt-2">
    <div class="col-md-8">

        <div id="berhasil_save"></div>

        <div class="card">
            <div class="card-header">
                <strong>Tabel Penguna</strong>
                <a href="{{ url('user/tambahUser') }}" class="btn btn-primary float-right"> tambah data</a>
                <a href="#" class="btn btn-primary ml-2" data-toggle="modal" data-target="#addModal"> {{-- target nya yang utama --}}
                    Tambah data with API
                </a>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered mb-0">
                        <thead>
                            <th>ID</th>
                            <th>nama</th>
                            <th>EMAIL</th>
                            <th>OPSI</th>
                            <th>opsi API</th>
                        </thead>
                        <tbody>
                            {{-- loping user --}}
                            @foreach ($users as $user)
                            <tr>
                                <td>{{  $user->id }}</td>
                                <td>{{  $user->nama }}</td>
                                <td>{{  $user->email }}</td>
                                <td>
                                    <a href="{{ url('user/'. $user->id . '/editUser') }}">edit</a>
                                    <a href="{{ url('user/'. $user->id . '/hapus') }}">hapus</a>
                                    {{-- hapus ada di kontroller jadi gk bikin blade --}}
                                </td>
                                <td>
                                    <button type="button" value="{{ $user->id }}" class="edit_userApi btn btn-primary" data-toggle="modal" data-target="#edituserModal">edit</button>
                                    <button type="button" value="{{ $user->id }}" class="delete_userApi btn btn-danger" data-toggle="modal" data-target="#deleteuserModal">delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('User.modalUserApi')

                    {{-- EDIT API --}}
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

