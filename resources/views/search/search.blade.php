@extends ('layout')

@section('judul', 'cari USER FULL API')

@section('konten')

<input type="text" name="q" class="form-control mt-4 cari-input" placeholder="cari user berdasarkan nama ">
<div class="card mt-2" >
    <ul class="list-group list-group-flush isi-cari">
      {{-- <li class="list-group-item">An item</li>
      <li class="list-group-item">A second item</li>
      <li class="list-group-item">A third item</li> --}}
    </ul>
  </div>
@endsection

@section ('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.cari-input').on('keyup', function(){
            var isi = $(this).val();
            console.log(isi);

            if (isi.length >= 3) {
                $.ajax({
                    // type: 'GET',
                    url: '{{ url('search') }}',
                    data:{
                        q:isi
                    },
                    dataType: 'json',

                    beforeSend: function(){
                        $('.isi-cari').html('<li class="list-group-item">Loading...</li>');
                    }, success: function(res){
                        console.log(res);
                        var hasil ='';
                        $.each (res.data, function(index, val){
                            hasil += '<li class="list-group-item"><a href="#">'+val.nama+'</a></li>';;
                        });
                        $('.isi-cari').html(hasil);
                    }

                });
            }
        });
    });
</script>
@endsection