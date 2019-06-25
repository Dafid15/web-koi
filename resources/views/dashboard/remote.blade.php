@extends('layouts.maste')
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
                        <img src="{!! asset('public/img/waterpump.png') !!}">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        {{--<button type="submit" class="button-flat" onclick="confirmData()">Remote</button>--}}
                        <button type="submit" class="button-flat" onclick="confirmData()">Submit</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection
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
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        function confirmData() {
            var data= new FormData();
            data.append("status",1);
            modalConfirm("Konfirmasi", "Apakah Anda Yakin Ingin Menyalakan Pompa?", function () {
                ajaxTransfer("/status-remote", data, "#modal-output");
            })
        }
    </script>
@endsection