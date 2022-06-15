@extends('admin.layouts.app')
@section('title')
Produk
@endsection
@section('header')
<style>
    .ik {
        cursor: pointer;
    }

    #trHover:hover {
        background-color: #e6e6e6;
    }

    .jq-icon-success {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADsSURBVEhLY2AYBfQMgf///3P8+/evAIgvA/FsIF+BavYDDWMBGroaSMMBiE8VC7AZDrIFaMFnii3AZTjUgsUUWUDA8OdAH6iQbQEhw4HyGsPEcKBXBIC4ARhex4G4BsjmweU1soIFaGg/WtoFZRIZdEvIMhxkCCjXIVsATV6gFGACs4Rsw0EGgIIH3QJYJgHSARQZDrWAB+jawzgs+Q2UO49D7jnRSRGoEFRILcdmEMWGI0cm0JJ2QpYA1RDvcmzJEWhABhD/pqrL0S0CWuABKgnRki9lLseS7g2AlqwHWQSKH4oKLrILpRGhEQCw2LiRUIa4lwAAAABJRU5ErkJggg==);
        color: #ffffff;
        background-color: #2dce89;
        border-color: #ffffff;
    }

    .jq-icon-warning {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGYSURBVEhL5ZSvTsNQFMbXZGICMYGYmJhAQIJAICYQPAACiSDB8AiICQQJT4CqQEwgJvYASAQCiZiYmJhAIBATCARJy+9rTsldd8sKu1M0+dLb057v6/lbq/2rK0mS/TRNj9cWNAKPYIJII7gIxCcQ51cvqID+GIEX8ASG4B1bK5gIZFeQfoJdEXOfgX4QAQg7kH2A65yQ87lyxb27sggkAzAuFhbbg1K2kgCkB1bVwyIR9m2L7PRPIhDUIXgGtyKw575yz3lTNs6X4JXnjV+LKM/m3MydnTbtOKIjtz6VhCBq4vSm3ncdrD2lk0VgUXSVKjVDJXJzijW1RQdsU7F77He8u68koNZTz8Oz5yGa6J3H3lZ0xYgXBK2QymlWWA+RWnYhskLBv2vmE+hBMCtbA7KX5drWyRT/2JsqZ2IvfB9Y4bWDNMFbJRFmC9E74SoS0CqulwjkC0+5bpcV1CZ8NMej4pjy0U+doDQsGyo1hzVJttIjhQ7GnBtRFN1UarUlH8F3xict+HY07rEzoUGPlWcjRFRr4/gChZgc3ZL2d8oAAAAASUVORK5CYII=);
        background-color: #fb6340;
        color: #ffffff;
        border-color: #ffffff;
    }

    .loader {
        border: 5px solid #f3f3f3;
        -webkit-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite;
        border-top: 5px solid #007bff;
        border-radius: 50%;
        width: 50px;
        height: 50px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .ik-edit {

        background-color: #28a745;
        color: white;
        padding: 5px;
        font-size: 20px;
        border-radius: 5px;
        margin-right: 5px
    }

    .ik-plus-square {

        background-color: #007bff;
        color: white;
        padding: 5px;
        font-size: 20px;
        border-radius: 5px;
        margin-right: 5px
    }

    .ik-trash-2 {

        background-color: #dc3545;
        color: white;
        padding: 5px;
        font-size: 20px;
        border-radius: 5px;

    }

    .edit-table:hover {
        cursor: pointer;
    }

    .delete:hover {
        cursor: pointer;
    }

</style>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>
@endsection
@section('iconHeader')
<i class="ik ik-menu bg-icon"></i>
@endsection
@section('titleHeader')
Produk
@endsection
@section('subtitleHeader')
Data Produk
@endsection
@section('breadcrumb')
Produk
@endsection
@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="form-tambah" action="{{route('product.store')}}" class="text-left border border-light p-5" enctype="multipart/form-data"
                            style="padding-bottom: 50px;" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="text" class="form-control  " placeholder="Nama Produk" id="nama"
                                        name="nama" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Harga Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="number" class="form-control  " placeholder="Harga Produk" id="harga"
                                        name="harga" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Stok Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="number" class="form-control  " placeholder="Stok Produk" id="stok"
                                        name="stok" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="text" class="form-control  " placeholder="Kategori Produk"
                                        id="kategori" name="kategori" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tipe Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="text" class="form-control  " placeholder="Tipe Produk" id="tipe"
                                        name="tipe" required>
                                </div>
                            </div>

                            <div class="footer-buttons">
                                <button id="produk-btn-add" type="submit" class="btn btn-primary">
                                    Tambah
                                </button>
                            </div>
                        </form>

                        <form id="form-edit" action="{{route('product.update', '1')}}" class="text-left border border-light p-5 d-none" enctype="multipart/form-data"
                            style="padding-bottom: 50px;" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id_update" id="id_update">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="text" class="form-control  " placeholder="Nama Produk" id="nama_update"
                                        name="nama_update" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Harga Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="number" class="form-control  " placeholder="Harga Produk" id="harga_update"
                                        name="harga_update" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Stok Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="number" class="form-control  " placeholder="Stok Produk" id="stok_update"
                                        name="stok_update" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="text" class="form-control  " placeholder="Kategori Produk"
                                        id="kategori_update" name="kategori_update" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tipe Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="text" class="form-control  " placeholder="Tipe Produk" id="tipe_update"
                                        name="tipe_update" required>
                                </div>
                            </div>

                            <div class="footer-buttons">
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="batal()">
                                    Batal
                                </button>
                            </div>
                        </form>

                        <form id="form-delete" action="{{route('product.destroy', '1')}}" class="text-left border border-light p-5 d-none" enctype="multipart/form-data"
                            style="padding-bottom: 50px;" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id_delete" id="id_delete">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="text" class="form-control  " placeholder="Nama Produk" id="nama_delete"
                                        name="nama_delete" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Harga Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="number" class="form-control  " placeholder="Harga Produk" id="harga_delete"
                                        name="harga_delete" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Stok Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="number" class="form-control  " placeholder="Stok Produk" id="stok_delete"
                                        name="stok_delete" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="text" class="form-control  " placeholder="Kategori Produk"
                                        id="kategori_delete" name="kategori_delete" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tipe Produk</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                                    </span>
                                    <input type="text" class="form-control  " placeholder="Tipe Produk" id="tipe_delete"
                                        name="tipe_delete" readonly>
                                </div>
                            </div>

                            <div class="footer-buttons">
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="batal()">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="stats-loader" class="row d-none" style="text-align: -webkit-center;margin-top:20px">
                    <div class="col-md-12">
                        <div class="loader"></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="data_table" class="table scroll"
                                style='overflow:auto; width:100%;position:relative;padding-left:20px;padding-bottom:20px'>
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Id</th>
                                        <th>Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="body_tabel">
                                    @foreach ($data as $key => $document)
                                    @if ($document->exists())
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$document->id()}}</td>
                                        <td>{{app('firebase.firestore')->database()->collection('products')->document($document->id())->snapshot()->data()['nama']}}
                                        </td>
                                        <td>
                                            <a class="btn btn-success" style="color: white"
                                                onclick="editProduk('{{$document->id()}}')">Edit</a>
                                            <a class="btn btn-danger" style="color: white" onclick="deleteProduk('{{$document->id()}}')">Hapus</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
</div>

<!-- /.content-wrapper -->
@endsection
@section('footer')
<script src="{{url('assets/admin/js/datatables.js')}}"></script>
<script src="{{ url('assets/admin/dynamictable/dynamitable.jquery.min.js') }}"></script>

<script>

    function getProduk(id)
    {
        let id_produk = id
        $.ajax({
            async: false,
            url: `{{route("getProduk")}}`,
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id':id_produk,
            },
            statusCode: {
                500: function (response) {
                    console.log(response)
                },
            },
            success: function (data) {
                if(data.data.nama == undefined){
                    $('#nama_update').val('')
                }else{
                    $('#nama_update').val(data.data.nama)
                }

                if(data.data.harga == undefined){
                    $('#harga_update').val('')
                }else{
                    $('#harga_update').val(data.data.harga)
                }

                if(data.data.stok == undefined){
                    $('#stok_update').val('')
                }else{
                    $('#stok_update').val(data.data.stok)
                }

                if(data.data.tipe == undefined){
                    $('#tipe_update').val('')
                }else{
                    $('#tipe_update').val(data.data.tipe)
                }

                if(data.data.kategori == undefined){
                    $('#kategori_update').val('')
                }else{
                    $('#kategori_update').val(data.data.kategori)
                }
            }
        });
    }

    function getProdukDelete(id)
    {
        let id_produk = id
        $.ajax({
            async: false,
            url: `{{route("getProduk")}}`,
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id':id_produk,
            },
            statusCode: {
                500: function (response) {
                    console.log(response)
                },
            },
            success: function (data) {
                if(data.data.nama == undefined){
                    $('#nama_delete').val('')
                }else{
                    $('#nama_delete').val(data.data.nama)
                }

                if(data.data.harga == undefined){
                    $('#harga_delete').val('')
                }else{
                    $('#harga_delete').val(data.data.harga)
                }

                if(data.data.stok == undefined){
                    $('#stok_delete').val('')
                }else{
                    $('#stok_delete').val(data.data.stok)
                }

                if(data.data.tipe == undefined){
                    $('#tipe_delete').val('')
                }else{
                    $('#tipe_delete').val(data.data.tipe)
                }

                if(data.data.kategori == undefined){
                    $('#kategori_delete').val('')
                }else{
                    $('#kategori_delete').val(data.data.kategori)
                }
            }
        });
    }

    function editProduk(id) {
        $('#form-edit').removeClass('d-none')
        $('#form-tambah').addClass('d-none')
        $('#form-delete').addClass('d-none')
        $('#id_update').val(id)
        getProduk(id)
    }

    function deleteProduk(id) {
        $('#form-delete').removeClass('d-none')
        $('#form-tambah').addClass('d-none')
        $('#form-edit').addClass('d-none')
        $('#id_delete').val(id)
        getProdukDelete(id)
    }

    function batal()
    {
        $('#form-tambah').removeClass('d-none')
        $('#form-edit').addClass('d-none')
        $('#form-delete').addClass('d-none')
        $('#nama_update').val('')
        $('#harga_update').val('')
        $('#stok_update').val('')
        $('#tipe_update').val('')
        $('#kategori_update').val('')
        $('#nama_delete').val('')
        $('#harga_delete').val('')
        $('#stok_delete').val('')
        $('#tipe_delete').val('')
        $('#kategori_delete').val('')
    }

</script>
@endsection
