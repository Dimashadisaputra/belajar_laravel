@extends('layout')
@section('judul','edit user')

    
@section('konten')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{  url('user/'.$user->id.'/editUser') }}" method="post">
                    @CSRF
                    <div class="form-group">
                        <label for="">nama</label>
                        <input type="text" name="nama" class="form-control form-control-user" value="{{ $user->nama }}" placeholder="nama anda" >
                        @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" name="email" class="form-control form-control-user" value="{{ $user->email }}" placeholder="email" >
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">save</button>
                        <a href="{{ url('/user') }}">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection