@extends('layouts.maste')
@section('style')
    <style>
        .button-flat {
            border: 1px solid #801515;        /* border: tebal[px] tipe[solid,dashed,dotted] warna[#hex, rgb()]; */
            background-color: #801515;        /* ubah warna background */
            color: #FFFFFF;                   /* ubah warna font */
            font-size: 16px;                  /* ubah ukuran font */
            padding: 0.5em 1em 0.5em 1em;     /* padding: top right bottom left; */
            position: center;
        }
        .button-flat:hover {
            opacity: 0.8;                     /* ubah tingkat transparansi saat cursor menuju button. 0.0 s.d 1.0 */
        }
        .button-flat:active {
            background: #550000;              /* ubah background saat button ditekan */
        }
        #artiststhumbnail a img {
            display : block;
            margin : auto;
        }
        img.center {
            display: block;
            margin-left: auto;
            margin-right: auto;

        }
        .button-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endsection
@section('content')
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @if($status==0 ||$status=='0')
                            <img src="{{asset('public/img/off.png')}}" height="300px" width="300px" class="center" border="1" />

                        @else
                            <img src="{{asset('public/img/on.png')}}" height="300px" width="300px" class="center" border="1" />


                        @endif
                    </div>
                        <div class="row">
                            <p align="center">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Status Sensor</b></td>
                                    <td>
                                        @if($status==0 ||$status=='0')
                                            <button class='btn btn-danger'>OFF</button>
                                        @else
                                            <button class='btn btn-success'>ON</button>

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

                </div>
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
            modalConfirm("Konfirmasi", "Apakah Anda Yakin Ingin Menyalakan Pompa?", function () {
                ajaxTransfer("/status-remote", data, "#modal-output");
            })
        }
    </script>
@endsection