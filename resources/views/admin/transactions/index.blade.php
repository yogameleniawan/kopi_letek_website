@extends('admin.layouts.app')
@section('title')
Transaction
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
Transaction
@endsection
@section('subtitleHeader')
Data Transaction
@endsection
@section('breadcrumb')
Transaction
@endsection
@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="form-lihat" class="card d-none">
                            <div class="card-header"><h3 class="d-block w-100">Transaction<small class="float-right">Tanggal: <label id="tanggal_transaksi"></label></small></h3></div>
                            <div class="card-body">
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Pelanggan
                                        <address>
                                            <strong id="pelanggan"></strong>
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        Kasir
                                        <address>
                                            <strong>Kopi Letek</strong>
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <b>Transaction ID : <label id="id_transaction"></label></b><br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Kategori</th>
                                                    <th>Tipe</th>
                                                    <th>Qty</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabel_transaction">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>Total Harga:</th>
                                                    <td>Rp. <label id="total_harga"></label></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-print">
                                    <div class="col-11">
                                    </div>
                                    <div class="col-1">
                                        <button type="button" onclick="tutup()" class="btn btn-secondary pull-right"> Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <th>Pelanggan</th>
                                        <th>Tanggal</th>
                                        {{-- <th>Total Order</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="body_tabel">
                                    @foreach ($data as $key => $document)
                                    @if ($document->exists())
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$document->id()}}</td>
                                        <td>{{app('firebase.firestore')->database()->collection('transactions')->document($document->id())->snapshot()->data()['pelanggan']}}
                                        </td>
                                        <td>{{app('firebase.firestore')->database()->collection('transactions')->document($document->id())->snapshot()->data()['tanggal']}}
                                        </td>
                                        {{-- <td>Rp. {{number_format(app('firebase.firestore')->database()->collection('transactions')->document($document->id())->snapshot()->data()['totalOrder'],0)}}
                                        </td> --}}
                                        <td>
                                            <a class="btn btn-success" style="color: white"
                                                onclick="lihatTransaksi('{{$document->id()}}')">Lihat</a>
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

    function tutup()
    {
        $('#form-lihat').addClass('d-none')
    }

    function lihatTransaksi(id)
    {
        $('#form-lihat').removeClass('d-none')
        let id_transaksi = id
        $.ajax({
            async: false,
            url: `{{route("getTransaksi")}}`,
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id':id_transaksi,
            },
            statusCode: {
                500: function (response) {
                    console.log(response)
                },
            },
            success: function (data) {
                $('#tabel_transaction').html('')
                let html = ``
                let total = 0
                $('#pelanggan').html(data.data.pelanggan)
                $('#tanggal_transaksi').html(data.data.tanggal)
                $('#id_transaction').html(id_transaksi)

                data.data.orders.forEach(item => {
                    total += item.product.harga
                    html += `
                    <tr>
                        <td>${item.product.nama}</td>
                        <td>${item.product.kategori}</td>
                        <td>${item.product.tipe}</td>
                        <td>${item.qty}</td>
                        <td>Rp. ${number_format(item.product.harga,0)}</td>
                    </tr>
                    `
                });
                $('#tabel_transaction').html(html)
                $('#total_harga').html(number_format(total,0))
                console.log(data)
            }
        });
    }

    function number_format(number, decimals, dec_point, thousands_point) {

        if (number == null || !isFinite(number)) {
            throw new TypeError("number is not valid");
        }

        if (!decimals) {
            var len = number.toString().split('.').length;
            decimals = len > 1 ? len : 0;
        }

        if (!dec_point) {
            dec_point = '.';
        }

        if (!thousands_point) {
            thousands_point = ',';
        }

        number = parseFloat(number).toFixed(decimals);

        number = number.replace(".", dec_point);

        var splitNum = number.split(dec_point);
        splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
        number = splitNum.join(dec_point);

        return number;
    }

</script>
@endsection
