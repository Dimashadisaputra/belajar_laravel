@extends('layout')
@section('judul','edit biodata')

    
@section('konten')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{  url('biodata/'.$user->id.'/editbiodata') }}" method="post" enctype="multipart/form-data">
                    @CSRF
                    {{-- <div>
                        <input type="file" name="foto" class="form-control form-control-user" required>
                    </div> --}}
                    <div class="form-group">
                        <label for="">umur</label>
                        <input type="numeber" name="age" class="form-control form-control-user" value="{{  $user->age }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">tgl lahir</label>
                        <input type="date" name="bhirtday" value="{{ $user->bhirtday}}" class="form-control form-control-user" required>
                    </div>
                    <div class="form-group">
                        <label for="">Select a file:</label>
                        <input type="file" id="myfile" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="">alamat</label>
                        <input type="text" name="alamat" value="{{ $user->alamat}}" class="form-control form-control-user" required>
                    </div>
                    <div class="form-group">
                        <label for="">no telp</label>
                        <input type="number" name="phone" value="{{ $user->phone }}" class="form-control form-control-user" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="gender" id="" class="form-control form-control-user" required>
                            <option value="male" {{ ($user->biodata ? $user->biodata->gender : '' ) == 'male' ? 'selected' : '' }}>laki</option>
                            <option value="female" {{ ($user->biodata ? $user->biodata->gender : '' ) == 'female' ? 'selected' : '' }}>perempuan</option>
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