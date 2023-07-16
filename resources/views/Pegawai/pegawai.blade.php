@extends ('layout')
@section ('judul', 'Pegawai')

@section ('konten')

<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <strong>Tabel pegawai</strong>
            {{-- <a href="{{ url('biodata/tambahbiodata') }}" class="btn btn-primary float-right"> tambah data</a> --}}
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
                        <th>pekerjaan</th>
                        <th>opsi</th>
                    </thead>
                    <tbody>
                        {{-- loping user --}}
                        @foreach ($users as $user)
                        @if ($user->user)
                        <tr>
                            <td>{{  $user->id }}</td>
                            <td>{{  $user->user->nama }}</td>
                            <td class="{{  $user->pekerjaan ? "" : 'text-danger' }}">{{  $user->pekerjaan ? $user->pekerjaan : 'kosong' }}</td>
                            <td>
                                <a href="{{ url('pegawai/'. $user->id . '/editpegawai') }}">Ubah</a>
                                <a href="{{ url('pegawai/'. $user->id . '/hapuspegawai') }}">hapus</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</div>
</div>
@endsection