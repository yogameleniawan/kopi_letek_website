@extends('admin.layouts.app')
@section('title')
Dashboard
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
<i class="ik ik-bar-chart-2 bg-icon"></i>
@endsection
@section('titleHeader')
Dashboard
@endsection
@section('subtitleHeader')
Data Dashboard
@endsection
@section('breadcrumb')
Dashboard
@endsection
@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row" style="align-items: center;">
                    <div class="col-md-12">
                        <div class="form-inline">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="mdi mdi-calendar-range"></i></label>
                                    </span>
                                    <input type="date" name="from_date" id="from_date" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span><label>&nbsp - &nbsp</label></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="mdi mdi-calendar-range"></i></label>
                                    </span>
                                    <input type="date" name="to_date" id="to_date" class="form-control">
                                </div>&nbsp
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    &nbsp<button name="search" id="search"
                                        class="btn btn-secondary">Search</button>&nbsp
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-md-12">
                        <div class="card prod-p-card card-green">
                            <div class="card-body">
                                <div class="row align-items-center mb-30">
                                    <div class="col">
                                        <h6 class="mb-5 text-white">Total Income</h6>
                                        <h3 class="mb-0 fw-700 text-white" id="income">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="loader"
                                                        style="border-top: 5px solid #6c757d;width: 34px;height: 34px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-money-bill-alt text-green f-18"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card card-blue">
                            <div class="card-body">
                                <div class="row align-items-center mb-30">
                                    <div class="col">
                                        <h6 class="mb-5 text-white">Total Transaksi</h6>
                                        <h3 class="mb-0 fw-700 text-white" id="total_transaksi">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="loader"
                                                        style="border-top: 5px solid #6c757d;width: 34px;height: 34px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-database text-blue f-18"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card card-yellow">
                            <div class="card-body">
                                <div class="row align-items-center mb-30">
                                    <div class="col">
                                        <h6 class="mb-5 text-white">Produk Terjual</h6>
                                        <h3 class="mb-0 fw-700 text-white" id="total_produk">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="loader"
                                                        style="border-top: 5px solid #6c757d;width: 34px;height: 34px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tags text-warning f-18"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="badge badge-pill badge-primary mb-1">Informasi Produk</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="card ticket-card">
                            <div class="card-body">
                                <p class="mb-30 bg-blue lbl-card"><i class="fas fa-file-archive"></i> Total Produk</p>
                                <div class="text-center">
                                    <h2 class="mb-0 d-inline-block text-blue" id="total_produk_data"><div class="row">
                                        <div class="col-md-12">
                                            <div class="loader"
                                                style="border-top: 5px solid #6c757d;width: 34px;height: 34px;">
                                            </div>
                                        </div>
                                    </div></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="card ticket-card">
                            <div class="card-body">
                                <p class="mb-30 bg-green lbl-card"><i class="fa fa-tasks"></i> Jumlah Produk Tersedia</p>
                                <div class="text-center">
                                    <h2 class="mb-0 d-inline-block text-green" id="produk_tersedia"><div class="row">
                                        <div class="col-md-12">
                                            <div class="loader"
                                                style="border-top: 5px solid #6c757d;width: 34px;height: 34px;">
                                            </div>
                                        </div>
                                    </div></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="card ticket-card">
                            <div class="card-body">
                                <p class="mb-30 bg-warning lbl-card"><i class="fa fa-exclamation-triangle"></i> Jumlah Produk Kosong</p>
                                <div class="text-center">
                                    <h2 class="mb-0 d-inline-block text-warning" id="produk_kosong"><div class="row">
                                        <div class="col-md-12">
                                            <div class="loader"
                                                style="border-top: 5px solid #6c757d;width: 34px;height: 34px;">
                                            </div>
                                        </div>
                                    </div></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="badge badge-pill badge-success mb-1">Transaksi Terbaru</span>
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="card table-card mt-4">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Pelanggan</th>
                                            <th>Tanggal</th>
                                            <th>Total Order</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body_tabel">
                                        @foreach ($transactions as $key => $document)
                                        @if ($document->exists())
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{app('firebase.firestore')->database()->collection('transactions')->document($document->id())->snapshot()->data()['pelanggan']}}
                                            </td>
                                            <td>{{app('firebase.firestore')->database()->collection('transactions')->document($document->id())->snapshot()->data()['tanggal']}}
                                            </td>
                                            <td>Rp. {{number_format(app('firebase.firestore')->database()->collection('transactions')->document($document->id())->snapshot()->data()['totalOrder'],0)}}
                                            </td>
                                            <td>
                                                <a class="btn btn-success" style="color: white"
                                                    onclick="lihatTransaksi('{{$document->id()}}')" data-toggle="modal"
                                                    data-target="#demoModal">Lihat</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3>Grafik Income</h3>
            </div>
            <div class="card-block text-center">
                <div class="row">
                    <div class="col-md-12">
                        <p>Kasir : </p>
                        <select class="form-control select2" name="kasir_select" id="kasir_select">
                            <option value="">Semua Kasir</option>
                            @foreach ($kasir_data as $key => $document)
                            @if ($document->exists())
                            <option
                                value="{{app('firebase.firestore')->database()->collection('transactions')->document($document->id())->snapshot()->data()['kasir']}}"
                                >
                                {{app('firebase.firestore')->database()->collection('transactions')->document($document->id())->snapshot()->data()['kasir']}}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-4" id="loader_grafik">
                    <div class="col-md-12" style="text-align: -webkit-center;">
                            <div class="loader" style="border-top: 5px solid #6c757d;width: 34px;height: 34px;">
                            </div>
                    </div>
                </div>
                <div id="line_chart" class="chart-shadow d-none" style="height:400px"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Detail Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="transaksi-loader" class="row d-none"
                            style="text-align: -webkit-center;margin-top:20px">
                            <div class="col-md-12">
                                <div class="loader"></div>
                            </div>
                        </div>
                        <div id="form-lihat" class="card d-none">
                            <div class="card-header">
                                <h3 class="d-block w-100">Transaction<small class="float-right">Tanggal: <label
                                            id="tanggal_transaksi"></label></small></h3>
                            </div>
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
                                                    <td><b>Rp. <label id="total_harga"></label></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@endsection
@section('footer')
<script src="{{url('assets/admin/js/datatables.js')}}"></script>
<script src="{{ url('assets/admin/dynamictable/dynamitable.jquery.min.js') }}"></script>

<script>
    $(document).ready(function () {
        console.log($('#kasir_hidden').val())
        $("#kasir_select option").each(function () {
            $(this).siblings('[value="' + this.value + '"]').remove();
        });
    })
</script>

<script>
    $(document).ready(function(){
        let h1;
        let h2;
        let h3;
        let h4;
        let h5;
        let h6;
        let h7;

        getGrafik();
    })

    function getGrafik() {
            $.ajax({
                url: `{{route("getGrafik")}}`,
                type: "GET",
                dataType: "json",
                statusCode: {
                    500: function (response) {
                        console.log(response)
                    },
                },
                success: function (data) {
                    h1 = data.h1;
                    h2 = data.h2;
                    h3 = data.h3;
                    h4 = data.h4;
                    h5 = data.h5;
                    h6 = data.h6;
                    h7 = data.h7;

                    $('#loader_grafik').addClass('d-none')
                    $('#line_chart').removeClass('d-none')
                    var chart = AmCharts.makeChart("line_chart", {
                        "type": "serial",
                        "theme": "light",
                        "dataDateFormat": "YYYY-MM-DD",
                        "precision": 2,
                        "valueAxes": [{
                            "id": "v1",
                            "position": "left",
                            "autoGridCount": false,
                            "labelFunction": function(value) {
                                return "$" + Math.round(value) + "M";
                            }
                        }, {
                            "id": "v2",
                            "gridAlpha": 0,
                            "autoGridCount": false
                        }],
                        "graphs": [{
                            "id": "g1",
                            "valueAxis": "v2",
                            "bullet": "round",
                            "bulletBorderAlpha": 1,
                            "bulletColor": "#FFFFFF",
                            "bulletSize": 8,
                            "hideBulletsCount": 50,
                            "lineThickness": 3,
                            "lineColor": "#2ed8b6",
                            "title": "Income",
                            "useLineColorForBulletBorder": true,
                            "valueField": "market1",
                            "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
                        }],
                        "chartCursor": {
                            "pan": true,
                            "valueLineEnabled": true,
                            "valueLineBalloonEnabled": true,
                            "cursorAlpha": 0,
                            "valueLineAlpha": 0.2
                        },
                        "categoryField": "date",
                        "categoryAxis": {
                            "parseDates": true,
                            "dashLength": 1,
                            "minorGridEnabled": true
                        },
                        "legend": {
                            "useGraphSettings": true,
                            "position": "top"
                        },
                        "balloon": {
                            "borderThickness": 1,
                            "shadowAlpha": 0
                        },
                        "dataProvider": [{
                            "date": h1.tanggal,
                            "market1": h1.income,
                        }, {
                            "date": h2.tanggal,
                            "market1": h2.income,
                        }, {
                            "date": h3.tanggal,
                            "market1": h3.income,
                        }, {
                            "date": h4.tanggal,
                            "market1": h4.income,
                        }, {
                            "date": h5.tanggal,
                            "market1": h5.income,
                        }, {
                            "date": h6.tanggal,
                            "market1": h6.income,
                        }, {
                            "date": h7.tanggal,
                            "market1": h7.income,
                        }]
                    });
                }
            });
        }

        $('#kasir_select').change(function(){
            $('#loader_grafik').removeClass('d-none')
            $('#line_chart').addClass('d-none')
            getGrafikByKasir();
        })

        function getGrafikByKasir() {
            $.ajax({
                url: `{{route("getGrafikByKasir")}}`,
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'kasir': $('#kasir_select').val(),
                },
                statusCode: {
                    500: function (response) {
                        console.log(response)
                    },
                },
                success: function (data) {
                    h1 = data.h1;
                    h2 = data.h2;
                    h3 = data.h3;
                    h4 = data.h4;
                    h5 = data.h5;
                    h6 = data.h6;
                    h7 = data.h7;

                    $('#loader_grafik').addClass('d-none')
                    $('#line_chart').removeClass('d-none')
                    var chart = AmCharts.makeChart("line_chart", {
                        "type": "serial",
                        "theme": "light",
                        "dataDateFormat": "YYYY-MM-DD",
                        "precision": 2,
                        "valueAxes": [{
                            "id": "v1",
                            "position": "left",
                            "autoGridCount": false,
                            "labelFunction": function(value) {
                                return "$" + Math.round(value) + "M";
                            }
                        }, {
                            "id": "v2",
                            "gridAlpha": 0,
                            "autoGridCount": false
                        }],
                        "graphs": [{
                            "id": "g1",
                            "valueAxis": "v2",
                            "bullet": "round",
                            "bulletBorderAlpha": 1,
                            "bulletColor": "#FFFFFF",
                            "bulletSize": 8,
                            "hideBulletsCount": 50,
                            "lineThickness": 3,
                            "lineColor": "#2ed8b6",
                            "title": "Income",
                            "useLineColorForBulletBorder": true,
                            "valueField": "market1",
                            "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
                        }],
                        "chartCursor": {
                            "pan": true,
                            "valueLineEnabled": true,
                            "valueLineBalloonEnabled": true,
                            "cursorAlpha": 0,
                            "valueLineAlpha": 0.2
                        },
                        "categoryField": "date",
                        "categoryAxis": {
                            "parseDates": true,
                            "dashLength": 1,
                            "minorGridEnabled": true
                        },
                        "legend": {
                            "useGraphSettings": true,
                            "position": "top"
                        },
                        "balloon": {
                            "borderThickness": 1,
                            "shadowAlpha": 0
                        },
                        "dataProvider": [{
                            "date": h1.tanggal,
                            "market1": h1.income,
                        }, {
                            "date": h2.tanggal,
                            "market1": h2.income,
                        }, {
                            "date": h3.tanggal,
                            "market1": h3.income,
                        }, {
                            "date": h4.tanggal,
                            "market1": h4.income,
                        }, {
                            "date": h5.tanggal,
                            "market1": h5.income,
                        }, {
                            "date": h6.tanggal,
                            "market1": h6.income,
                        }, {
                            "date": h7.tanggal,
                            "market1": h7.income,
                        }]
                    });
                }
            });
        }
</script>

<script>
    let loader = `
    <div class="row">
        <div class="col-md-12">
                <div class="loader" style="border-top: 5px solid #6c757d;width: 34px;height: 34px;">
                </div>
        </div>
    </div>
    `
    $(document).ready(function () {
        getDataCard()
    })

    $('#search').click(function () {

        $('#income').html(loader)
        $('#total_transaksi').html(loader)
        $('#total_produk').html(loader)
        getDataCard()
    })

    function getDataCard() {
        $.ajax({
            url: `{{route("getDataCard")}}`,
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'from_date': $('#from_date').val(),
                'to_date': $('#to_date').val(),
            },
            statusCode: {
                500: function (response) {
                    console.log(response)
                },
            },
            success: function (data) {
                $('#income').text(`Rp. ${number_format(data.income,0)}`)
                $('#total_transaksi').text(`${number_format(data.total_transaction,0)}`)
                $('#total_produk').text(`${number_format(data.total_product,0)}`)
                $('#total_produk_data').text(`${number_format(data.total_product_data,0)}`)
                $('#produk_tersedia').text(`${number_format(data.total_product_tersedia,0)}`)
                $('#produk_kosong').text(`${number_format(data.total_product_kosong,0)}`)
            }
        });
    }

    function tutup() {
        $('#form-lihat').addClass('d-none')
    }

    function lihatTransaksi(id) {
        $('#transaksi-loader').removeClass('d-none')
        $('#form-lihat').addClass('d-none')
        let id_transaksi = id
        $.ajax({
            url: `{{route("getTransaksi")}}`,
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id': id_transaksi,
            },
            statusCode: {
                500: function (response) {
                    console.log(response)
                },
            },
            success: function (data) {
                $('#transaksi-loader').addClass('d-none')
                $('#form-lihat').removeClass('d-none')
                $('#tabel_transaction').html('')
                let html = ``
                let total = 0
                $('#pelanggan').html(data.data.pelanggan)
                $('#tanggal_transaksi').html(data.data.tanggal)
                $('#id_transaction').html(id_transaksi)

                data.data.orders.forEach(item => {
                    total += item.product.harga * item.qty
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
                $('#total_harga').html(number_format(total, 0))
                console.log(data)
            }
        });
    }

</script>
@endsection
