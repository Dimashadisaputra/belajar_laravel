@extends ('layout')
@section ('judul', 'Tambah Biodata')

@section ('konten')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{  url('biodata/tambahbiodata') }}" method="post" enctype="multipart/form-data">
                    @CSRF
                    <div class="form-group">
                        <label for="">nama</label>
                        <select name="user_id"  class="form-control form-control-user" required>
                            @foreach($users as $user)
                                @if ($user->biodata === null)
                                <option value="{{ $user->id }}">{{$user->nama}}</option>
                                @else
                                <option value="" selected disabled>pengguna tidak ditemukan</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">umur</label>
                        <input type="number" name="age" class="form-control form-control-user"  >
                        @error('age')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">tgl lahir</label>
                        <input type="date" name="bhirtday" class="form-control form-control-user" required>
                    </div>
                    <div class="form-group">
                        <label for="">Select a file:</label>
                        <input type="file" id="myfile" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="">alamat</label>
                        <input type="text" name="alamat" class="form-control form-control-user" >
                        @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">no telp</label>
                        <input type="number" name="phone" class="form-control form-control-user" >
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jenis kelamin</label>
                        <select name="gender" id="" class="form-control form-control-user" required>
                            <option value="male" >laki</option>
                            <option value="female">perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary " type="submit">save</button>
                        <a href="{{ url('/biodata') }}">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection