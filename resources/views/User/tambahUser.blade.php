@extends('layout')
@section('judul','tambah user')

    
@section('konten')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{  url('user/tambahUser') }}" method="post">
                    @CSRF
                    <div class="form-group">
                        <label for="">nama</label>
                        <input type="text" name="nama" class="form-control form-control-user" placeholder="nama anda" >
                        @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" name="email" class="form-control form-control-user" placeholder="email" >
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" name="password" class="form-control form-control-user" placeholder="password"  placeholder="email" >
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection