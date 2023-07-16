@extends('layout')
@section('judul', 'Login')
    
@section ('konten')
<div class="container justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="https://source.unsplash.com/random/450x400" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
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
                            <form class="user" action="{{ url('login') }}" method="post">
                                @CSRF
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." >
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary btn-user btn-block" type="submit">Masuk</button>
                                <a href="{{ url('/register') }}" class="btn btn-primary btn-user btn-block">Daftar</a>
                                <hr>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection