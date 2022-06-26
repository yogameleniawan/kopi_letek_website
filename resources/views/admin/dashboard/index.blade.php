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
                                            <label class="input-group-text"><i
                                                    class="mdi mdi-calendar-range"></i></label>
                                        </span>
                                        <input type="date" name="from_date" id="from_date" class="form-control"
                                            >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span><label>&nbsp - &nbsp</label></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <label class="input-group-text"><i
                                                    class="mdi mdi-calendar-range"></i></label>
                                        </span>
                                        <input type="date" name="to_date" id="to_date" class="form-control"
                                            >
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
                        <div class="card prod-p-card card-red">
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
                                        <i class="fa fa-money-bill-alt text-red f-18"></i>
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

<!-- /.content-wrapper -->
@endsection
@section('footer')
<script src="{{url('assets/admin/js/datatables.js')}}"></script>
<script src="{{ url('assets/admin/dynamictable/dynamitable.jquery.min.js') }}"></script>

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

    $('#search').click(function(){

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
            }
        });
    }

</script>
@endsection
