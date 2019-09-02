@extends('layouts.master')
@section('content')
<?php
 $page = 'index';
 ?>
<div class="">
    <div class="mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 ">
                <div class="single-report mb-xs-30 main-section bg-white mt-2 water-condition">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <p class="title-card mb-0">Keadaan Air</p>
                            {{--<p>24 H</p>--}}
                        </div>
                        <div class="d-flex justify-content-between pb-2 mt-2">
                            <b><p class="title-child" id="status"> </p></b>
                            {{--<span>--</span>--}}
                        </div>
                    </div>
                    <canvas id="coin_sales1" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30 main-section bg-white mt-2 water-condition">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <p class="title-card mb-0">Temperatur</p>
                            {{--<p>24 H</p>--}}
                        </div>
                        <div class="d-flex justify-content-between pb-2 mt-2 ">
                            <b><p class="title-child" id="averageSuhu"> </p></b>
                            {{--<span> 27</span>--}}
                        </div>
                    </div>
                    <canvas id="coin_sales2" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report main-section bg-white mt-2 water-condition">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <p class="title-card mb-0">Kadar Asam</p>
                            {{--<p class="title-child">24 H</p>--}}
                        </div>
                        <div class="d-flex justify-content-between pb-2 mt-2">
                            <b><p class="title-child" id="averagepH"></p></b>
                            {{--<span>7</span>--}}
                        </div>
                    </div>
                    <canvas id="coin_sales3" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row main-section bg-white">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="title-card mb-0">PH</p>
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
                        <p class="title-card mb-0">Suhu</p>
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
                    $("#status").text(data.alert);
                    grafikPH(data.pHdata);
                    grafikSuhu(data.SuhuData);
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
                        $("#status").text(data.alert);
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
                    //categories: [2019],
                    labels: {
                        rotation: 0,
                        align: 'right',
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis:{
                    plotLines: [{
                        color: 'red',
                        dashStyle: 'shortdash',
                        value: 5.0,
                        width: 2,
                        label:{
                            text:'batas bawah'
                        }
                    },
                        {
                            color: 'red',
                            dashStyle: 'shortdash',
                            value: 10.0,
                            width: 2,
                            label:{
                                text:'batas atas'
                            }
                        }
                    ],
                },
                legend: {
                    enabled: true
                },
                series: [{
                    "name":"ph",
                    "data": arrayData

                },
                     //     {
                     //     "name":"batas-ph",
                     //     "data":limitedpH
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
                    //categories: [2019],
                    labels: {
                        rotation: 0,
                        align: 'right',
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    },
                },
                yAxis:{
                    plotLines: [{
                        color: 'red',
                        dashStyle: 'shortdash',
                        value: 30.0,
                        width: 2,
                        label:{
                            text:'batas bawah'
                        }
                    },
                        {
                            color: 'red',
                            dashStyle: 'shortdash',
                            value: 14.0,
                            width: 2,
                            label:{
                                text:'batas atas'
                            }
                        }
                    ],
                },
                legend: {
                    enabled: true
                },
                series: [{
                    "name":"Suhu",
                    "data": arrayData

                },
                     //     {
                     //     "name":"batas-suhu",
                     //     "data":[]
                     // }
                ]
            });
        }


    </script>

@endsection