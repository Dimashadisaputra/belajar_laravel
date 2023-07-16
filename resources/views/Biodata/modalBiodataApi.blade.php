<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <table> {{-- kescript bawah --}}
                <tr>
                    <th>ID: </th>
                    <th id="id_user"></th>
                </tr>
                <tr>
                    <th>Nama: </th>
                    <th id="nama_user"></th>
                </tr>
                <tr>
                    <th>Email: </th>
                    <th id="email_user"></th>
                </tr>
                <tr>
                    <th>foto</th>
                    <th><img id="foto_user" style="width:50px;height:50px;" src=""></th>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
    </div>
    </div>
</div>

@section('script')
    @parent
    <script type="text/javascript">
        function detail(id) {
            $("#id_user").empty();
            $("#nama_user").empty();
            $("#email_user").empty();
            $("#foto_user").empty();
            // alert("halo")
            $.ajax({
                type: 'GET',
                dataType: "json",
                url: '/api/detailbiodata/'+id,
                success: function (result) {
                    console.log(result)
                    $('#id_user').append(result.data.id)
                    $('#nama_user').append(result.data.nama)
                    $('#email_user').append(result.data.email)
                    $('#foto_user').attr("src",'images/'+result.data.biodata.foto)
                }
            });
        }
    </script>

    @parent
    <script type="text/javascript">
        function hapusbiodata(id){
            if (confirm("Are you sure?")) {
                $.ajax({
                type: 'GET',
                dataType:"json",
                url: '/api/hapusbiodata/'+id,
                success: function (result) {
                    console.log(result) 
                    // function reloadPage(){
                location.reload(true);
            // }
                }
            });
            } else{
                return alert('gagal hapus');
            }
        }
        
        </script>
@endsection