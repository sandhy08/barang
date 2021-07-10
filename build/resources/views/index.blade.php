@extends('layout')

@section('content')
<br>
<div class="card">
        <div class="card-header">
            <h4 class="card-title">
                <button class="btn btn-primary m-r-5" id="addbarang">
                    <i class="anticon anticon-plus"></i>
                    Add Barang
                </button>
            </h4>
        </div>

        {{--        TABEL BARANG--}}
        <div class="card-body">
            <table id="tbarang" class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Foto Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    {{--    MODAL DAN FORM DATA BARANG--}}
    <div class="modal fade" id="mbarang">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Barang</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ion ion-md-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formbarang" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input required type="text"  class="form-control" id="namabarang" name="namabarang" placeholder="Nama Barang">
                        </div>

                        <div class="form-group">
                            <label>Harga Beli</label>
                            <input required type="number"  class="form-control" id="hargabeli" name="hargabeli" placeholder="Harga Beli">
                        </div>

                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input required type="number"  class="form-control" id="hargajual" name="hargajual" placeholder="Harga Jual">
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input required type="number"  class="form-control" id="stok" name="stok" placeholder="Stok">
                        </div>

                        <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="100000" />
                        <div class="form-group">
                            <label>Foto Barang</label>
                            <input required onchange="upload_check()" type="file" accept="image/*,.jpg,.png"  class="form-control" id="fotobarang" name="fotobarang" placeholder="Foto Barang">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="/assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/datatables/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                language: {
                    search: '<span>Cari:</span> _INPUT_',
                    searchPlaceholder: 'Cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });

            function loadData() {
                $('#tbarang').dataTable({
                    "ajax": "{{ url('/barang/data') }}",
                    "columns": [
                        {
                            "data" : "id",
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            "data": "foto_url",
                            render: function(data) {
                                return '<img src='+data+' height="100" width="100">'
                            }
                        },
                        { "data": "NamaBarang" },
                        { "data": "HargaBeli" },
                        { "data": "HargaJual" },
                        { "data": "Stok" },
                        {
                            data: 'id',
                            sClass: 'text-center',
                            render: function(data) {
                                return  '<a href="#" data-id="'+data+'" id="edit" class="btn btn-purple btn-rounded waves-effect waves-light btn-sm" title="edit"><i class="anticon anticon-edit"></i>edit </a> &nbsp;'+
                                        '<a href="#" data-id="'+data+'" id="delete" class="btn btn-danger btn-rounded waves-effect waves-light btn-sm" title="hapus"><i class="anticon anticon-delete">hapus</i> </a>';
                            }
                        }
                    ],
                });
            } loadData();

            $(document).on('click', '#addbarang', function() {
                $('#mbarang').modal('show');
                $('#formbarang').attr('action', '{{ url('barang/create') }}');
            });

            $(document).on('click', '#edit', function() {
                var data = $('#tbarang').DataTable().row($(this).parents('tr')).data();
    
                $('#mbarang').modal('show');
                $('#namabarang').val(data.NamaBarang).change();
                $('#hargabeli').val(data.HargaBeli).change();
                $('#hargajual').val(data.HargaJual).change();
                $('#stok').val(data.Stok).change();
                $('#formbarang').attr('action', '{{ url('barang/edit') }}/'+data.id);
            });

            $('#simpan').submit(function(e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: formData,
                    dataType : 'json',
                    contentType : "application/json; charset=utf-8",
                    success :function (response) {
                        $('#tbarang').DataTable().destroy();
                        loadData();
                        $('#mbarang').modal('hide');
                    },
                });
            });
            
            $(document).on('click', '#delete', function() {
                var data = $('#tbarang').DataTable().row($(this).parents('tr')).data();
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('barang/delete') }}/"+data.id,
                        success :function () {
                            $('#tbarang').DataTable().destroy();
                            loadData();
                        }
                    })
                }
            });
        });

        function upload_check()
            {
                var upl = document.getElementById("fotobarang");
                var max = document.getElementById("max_id").value;

                console.log(max);
                if(upl.files[0].size > max)
                {
                alert("Maximal File Is 100kb");
                upl.value = "";
                }
            };
    </script>
@endsection

