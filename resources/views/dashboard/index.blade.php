@extends('layouts.master')
@section('content')

    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Keadaan Air</h4>
                            <p>24 H</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2 id="status"> </h2>
                            {{--<span>--</span>--}}
                        </div>
                    </div>
                    <canvas id="coin_sales1" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Temperatur</h4>
                            <p>24 H</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2 id="averageSuhu"> </h2>
                            {{--<span> 27</span>--}}
                        </div>
                    </div>
                    <canvas id="coin_sales2" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Kadar Asam</h4>
                            <p>24 H</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2 id="averagepH"></h2>
                            {{--<span>7</span>--}}
                        </div>
                    </div>
                    <canvas id="coin_sales3" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">PH</h4>
                        {{--<select class="custome-select border-0 pr-3">--}}
                        {{--<option selected>Last 24 Hours</option>--}}
                        {{--<option value="0">01 July 2018</option>--}}
                        {{--</select>--}}
                    </div>
                    <div id="grafik-ph"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">Suhu</h4>
                        {{--<select class="custome-select border-0 pr-3">--}}
                        {{--<option selected>Last 24 Hours</option>--}}
                        {{--<option value="0">01 July 2018</option>--}}
                        {{--</select>--}}
                    </div>
                    <div id="grafik-suhu"></div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: "{{url('/pHJson')}}",
                dataType: 'json',
                success: function (data) {
                    $("#averagepH").text(data.averagepH.toFixed(2));
                    $("#averageSuhu").text(data.averageSuhu.toFixed(2));
                    grafikPH(data.pHdata);
                    grafikSuhu(data.SuhuData);
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{url('/StatusJson')}}",
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $("#status").text(data);

                }
            });

            setInterval(function () {
                $.ajax({
                    type: 'GET',
                    url: "{{url('/pHJson')}}",
                    dataType: 'json',
                    success: function (data) {
                        $("#averagepH").text(data.averagepH.toFixed(2));
                        $("#averageSuhu").text(data.averageSuhu.toFixed(2));
                        grafikPH(data.pHdata);
                        grafikSuhu(data.SuhuData);
                    }
                });
            },2000)
        })

        function  grafikPH(data){
            var arrayData =[];
            for (var i = 0; i <data.length ; i++) {
                arrayData.push(parseFloat(data[i]));
            }
            console.log(arrayData);
            $('#grafik-ph').highcharts({
                chart: {
                    type: 'line',
                    marginTop: 80
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    headerFormat: '<b>{point.key}</b><br/>'
                },
                title: {
                    text: 'Data PH'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [2019],
                    labels: {
                        rotation: 0,
                        align: 'right',
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                legend: {
                    enabled: true
                },
                series: [{
                    "name":"ph",
                    "data": arrayData

                },
                    //     {
                    //     "name":"wanita",
                    //     "data":[229,340,337]
                    // }
                ]
            });
        }

        function  grafikSuhu(data){
            var arrayData =[];
            for (var i = 0; i <data.length ; i++) {
                arrayData.push(parseFloat(data[i]));
            }
            console.log(arrayData);
            $('#grafik-suhu').highcharts({
                chart: {
                    type: 'line',
                    marginTop: 80
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    headerFormat: '<b>{point.key}</b><br/>'
                },
                title: {
                    text: 'Data Suhu'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [2019],
                    labels: {
                        rotation: 0,
                        align: 'right',
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                legend: {
                    enabled: true
                },
                series: [{
                    "name":"ph",
                    "data": arrayData

                },
                    //     {
                    //     "name":"wanita",
                    //     "data":[229,340,337]
                    // }
                ]
            });
        }


    </script>

@endsection