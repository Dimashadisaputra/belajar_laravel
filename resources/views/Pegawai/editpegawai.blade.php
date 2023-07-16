@extends('layout')
@section('judul', 'edit pegawai')

@section('konten')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{  url('pegawai/'.$user->id.'/editpegawai') }}" method="post" enctype="multipart/form-data">
                    @CSRF
                    <div class="form-group">
                        <label for="">pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control form-control-user" value="{{  $user->pekerjaan }}" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary " type="submit">save</button>
                        <a href="{{ url('/pegawai') }}">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection