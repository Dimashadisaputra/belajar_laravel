@extends('layout')
@section('judul','register')

    
@section('konten')
<div class="row justify-content-center mt-4">
<div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://source.unsplash.com/random/550x450" alt="">
                </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            {{-- menampilkan pesan gagal --}}
                            @if (\Session::has('pesan_gagal'))
                            <div class="alert alert-danger alert-dismissible fade show mb-2">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{ \Session::get('pesan_gagal') }}</strong>
                            </div>
                            @endif
                            {{-- menampilkan berhasil --}}
                            @if (\Session::has('pesan_berhasil'))
                            <div class="alert alert-danger alert-dismissible fade show mb-2">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{ \Session::get('pesan_berhasil') }}</strong>
                            </div>
                            @endif
                            <form class="user" action="{{  url('register') }}" method="post">
                                @CSRF
                                <div class="form-group">
                                    <div>
                                        <input type="text" name="nama" class="form-control form-control-user" id="exampleFirstName"placeholder="Your Name" >
                                        @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" >
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" >
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirmpassword" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" >
                                        @error('confirmpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit">register</button>
                                <a href="{{ url('/login') }}" class="btn btn-primary btn-user btn-block">login</a>
                                <hr>
                                
                            </form>
                            <hr>
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
