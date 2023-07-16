@extends('layout')

@section ( 'judul', 'Laporan API')

@section ( 'konten')
<h3>laporan yang buat akun</h3>

<form id="form-laporan">
  <label >Dari:</label>
  <input type="date" id="periode-awal" name="periode_awal">
  <input type="date" id="periode-akhir" name="periode_akhir">
  <button onclick="tampil()" type="button" name="submit" >Tampil</button>
</form>

<table class="table table-bordered mb-0">
    <thead>
        <th>ID</th>
        <th>nama</th>
        <th>email</th>
    </thead>
    <tbody id="isi-laporan">
        {{-- kosong di isi dari jsquey --}}
    </tbody>

@endsection

@section ('script')
@parent
    <script type="text/javascript">
        function tampil(){
            // alert ('test ');
            // console.log($('#form-laporan').serialize());
            // return true;
            $("button").click(function(){
            $("#isi-laporan").empty();
            });
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: 'api/laporan',
                data: $('#form-laporan').serialize(),

                success:function (result) {
                    console.log(result);
                    if(result.length > 0) {
                        $.each(result, function(index, val){
                            $('#isi-laporan').append('<tr> <td>'+val.id+'</td> <td>'+val.nama+'</td> <td>'+val.email+'</td></tr>');
                        });
                    }else {
                        alert('data tidak ada')
                    }
                }
            });
        }
    </script>
@endsection