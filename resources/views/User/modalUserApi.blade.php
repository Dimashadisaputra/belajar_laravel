<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            {{-- <ul id="#save_error"></ul> --}}

            <div class="form-group mb-3">
                <label for="">nama</label>
                <input type="text" class="nama form-control" placeholder="Nama"> {{-- class nama nya INGAT --}}
            </div>
            <div class="form-group mb-3">
                <label for="">email</label>
                <input type="email" class="email form-control" placeholder="email"> {{-- class email nya INGAT --}}
            </div>
            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" class="password form-control" placeholder="password"> {{-- class password nya INGAT --}}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary tambahUserApi">Save changes</button> {{-- class tambahUser nya INGAT buat save untuk lemat ke sciprtnya --}}
        </div>
      </div>
    </div>
</div>

{{-- edit --}}
<div class="modal fade" id="edituserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            {{-- <ul id="#save_error"></ul> --}}
            <input id="edit_id" type="hidden">
            <div class="form-group mb-3">
                <label for="">nama</label>
                <input type="text" id="edit_nama" class="nama form-control" placeholder="Nama"> {{-- class nama nya INGAT --}}
            </div>
            <div class="form-group mb-3">
                <label for="">email</label>
                <input type="email" id="edit_email" class="email form-control" placeholder="email"> {{-- class email nya INGAT --}}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updateUserApi">Update</button> {{-- class tambahUser nya INGAT buat save untuk lemat ke sciprtnya --}}
        </div>
      </div>
    </div>
</div>

{{-- DELETE --}}
<div class="modal fade" id="deleteuserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <input id="delete_id" type="hidden">
            <h1>Yakin anda mau delete?</h1>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary deleteUserApi">Delete</button> {{-- class tambahUser nya INGAT buat save untuk lemat ke sciprtnya --}}
        </div>
      </div>
    </div>
</div>

@section ('script')
@parent
    <script>
        $(document).ready(function (){
            $(document).on('click', '.tambahUserApi', function(e){  //.tambahUserApi lembaran dari save
                e.preventDefault();
                // console.log("halo");
                var databaru = {
                    'nama': $('.nama').val(),
                    'email': $('.email').val(),
                    'password': $('.password').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/api/user', 
                    data: databaru,
                    datatype: 'json',
                    success: function (response){
                        console.log(response);
                        if (response.code == 201)
                        {   
                            alert('isi semua');
                        }else{
                            $('#berhasil_save').addClass('alert alert-success')
                            $('#berhasil_save').text(response.message)
                            $('#addModal').modal('hide');
                            $('#addModal').find('input').val("");

                            location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endsection

{{-- TAMBAH USER ATAS --}}

{{-- INGET ID # --}}

{{-- edit USER bawah --}}

@section('script')
@parent
<script>
    $(document).on('click', '.edit_userApi', function(e) {
        e.preventDefault();
        var id = $(this).val();
        // console.log(id);

        $('#edituserApi').modal('show');
        $.ajax({
            type: 'GET',
            url: '/api/useredit/'+id,
            success: function(response){
                // console.log(response);
                if(response.code == 200){
                    $('#edit_id').val(id);
                    $('#edit_nama').val(response.message.nama);
                    $('#edit_email').val(response.message.email);
                }
            }
        });
    });

    $(document).on('click', '.updateUserApi', function (e){
        e.preventDefault();
        var id = $('#edit_id').val();
        var dataedit = {
            'nama' : $('#edit_nama').val(),
            'email' : $('#edit_email').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type : 'PUT',
            url: '/api/updateUserApi/'+id,
            data: dataedit,
            dataType : 'json',
            success: function (response){
                console.log(response);
                if (response.code == 201) {
                    alert('gagal update');
                }else {
                    $('#edituserModal').modal('hide');

                    location.reload();
                }
            }
        });
    });
    

    // delete

    $(document).on('click', '.delete_userApi', function(e) {
        e.preventDefault();
        var id = $(this).val();
        console.log(id);

        $('#delete_id').val(id);
        $('#deleteuserModal').modal('show');
    });

    $(document).on('click', '.deleteUserApi', function (e){
        e.preventDefault();

        var id = $('#delete_id').val();
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type : 'DELETE',
            url :'/api/deleteUserApi/'+id,
            success: function (response){
                console.log(response);

                // $('#deleteuserModal').modal('hide');
                location.reload();
            }
        });

    });

</script>
@endsection
