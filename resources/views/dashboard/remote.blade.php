@extends('layouts.master')
@section('content')
    <!-- <div class="sales-report-area mt-5 mb-5">
        <div class="row">
        </div>
    </div> -->
    <?php
    $page = 'remote';
    ?>
    <div class="row main-section bg-white">
        <div class="status-bar">
            <center>
                <p style="font-size:20pt;">Water Pump <b>Control System</b></p>
            </center>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class=" ">
                        @if($status==0 ||$status=='0')
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <input type="hidden" id="status" value="1">
                                    <button type="submit" class="btn button-pump-off button-center" onclick="confirmData()">
                                        <!-- <img src="{{asset('public/img/off.png')}}" height="300px" width="300px" class="center" border="1" /> -->
                                        <i class="fas fa-power-off fa-5x text-white"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <center>
                                        <div class="status">
                                            <p>Water Pump Status :<b> OFF </b></p>
                                        </div>
                                    </center>
                                </div> 
                            </div>
                            
                        @else
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <input type="hidden" id="status" value="0">
                                    <button type="submit" class="btn button-pump-on button-center" onclick="confirmData()">
                                        <!-- <img src="{{asset('public/img/on.png')}}" height="300px" width="300px" class="center" border="1" /> -->
                                        <i class="fas fa-power-off fa-5x text-white"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">                                
                                    <center>
                                        <div class="status">
                                            <p>Water Pump Status :<b> ON </b></p>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        @endif
<!--                     
                        @if($status==0 ||$status=='0')
                            <img src="{{asset('public/img/off.png')}}" height="300px" width="300px" class="center" border="1" />

                        @else
                            <img src="{{asset('public/img/on.png')}}" height="300px" width="300px" class="center" border="1" />


                        @endif -->
                    <!-- </div>
                        <div class="row">
                            <p align="center">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Status Sensor</b></td>
                                    <td>
                                        @if($status==0 ||$status=='0')
                                            <button class='btn btn-danger'>Matikan</button>
                                        @else
                                            <button class='btn btn-success'>Nyalakan</button>

                                        @endif
                                    </td>
                                    <td>

                                        <div style="text-align: center">
                                            @if($status==0 ||$status=='0')
                                                <input type="hidden" id="status" value="1">
                                                <button type="submit" class="btn btn-success button-center" onclick="confirmData()">Nyalakan</button>
                                            @else
                                                <input type="hidden" id="status" value="0">
                                                <button type="submit" class="btn btn-danger button-center" onclick="confirmData()">Matikan</button>

                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            </p>
                        </div>

                </div> -->
            </div>
        </div>


    </div>


@endsection


@section('scripts')
    <script type="text/javascript">
        function confirmData() {
            var data= new FormData();
            var value=$("#status").val();
            data.append("status",value);
            modalConfirm("Konfirmasi", "Apakah Anda Yakin ?", function () {
                ajaxTransfer("/status-remote", data, "#modal-output");
            })
        }
    </script>
@endsection