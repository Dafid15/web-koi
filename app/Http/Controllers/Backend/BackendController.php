<?php

namespace App\Http\Controllers\Backend;

use App\Firebase\FirebaseData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase;

class BackendController extends Controller
{
    public function index(Request $request){
        $data=FirebaseData::getPH();
        $data2=FirebaseData::getSuhu();
        $params=[
            'pHdata'=>$data['data'],
            'averagepH'=>$data['averageData'],
            'SuhuData'=>$data2['dataSuhu'],
            'averageSuhu'=>$data2['averageSuhu']
        ];

        return view('dashboard.index',$params);
    }
    public function pHJson(Request $request){
        $data=FirebaseData::getPH();
        $data2=FirebaseData::getSuhu();
        $currentData=[];
        $currentData2=[];
        $sumData=0;
        $sumData2=0;
        $count=count($data['data'])-1;
        for($i=($count-10);$i<$count;$i++){
            $currentData[]=$data['data'][$i];
            $sumData+=floatval(str_replace('pH','',str_replace(' ','',$data['data'][$i])));
        }



        $count=count($data2['dataSuhu'])-1;
        for($i=($count-10);$i<$count;$i++){
            $currentData2[]=$data2['dataSuhu'][$i];
            $sumData2+=floatval(str_replace('pH','',str_replace(' ','',$data2['dataSuhu'][$i])));

        }
        $params=[
            'pHdata'=>$currentData,
            'averagepH'=>$sumData/10,
            'SuhuData'=>$currentData2,
            'averageSuhu'=>$sumData2/10,
            'alert'=>$this->StatusJson($sumData/10,$sumData2/10)
        ];

        return json_encode($params);
    }
    public function StatusJson($value1,$value2){

        if((0<=$value1) &&(2<=$value1)){
            if ((0<=$value2) &&(14<=$value2)){
                 $status="danger";
            }
            elseif ((15<=$value2) &&(30<=$value2)){
                $status="warning";
            }
            else{
                $status="danger";
            }
        }
        elseif ((3<=$value1) &&(6<=$value1)){
            if ((0<=$value2) &&(14<=$value2)){
                $status="danger";
            }
            elseif ((15<=$value2) &&(30<=$value2)){
                $status="warning";
            }
            else{
                $status="danger";
            }
        }
        elseif ((7<=$value1) &&(10<=$value1)){
            if ((0<=$value2) &&(14<=$value2)){
                $status="warning";
            }
            elseif ((15<=$value2) &&(30<=$value2)){
                $status="normal";
            }
            else{
                $status="warning";
            }
        }
        elseif ((11<=$value1) &&(14<=$value1)){
            if ((0<=$value2) &&(14<=$value2)){
                $status="danger";
            }
            elseif ((15<=$value2) &&(30<=$value2)){
                $status="warning";
            }
            else{
                $status="danger";
            }
        }
        return $status;
    }
    public function remotedevice(){
        $status=FirebaseData::getStatus();
        $params=[
            'status'=>$status->status
        ];
        return view('dashboard.remote',$params);
    }
    public function statusremote(Request $request){
        $status= $request->input('status');
        $pushdata=FirebaseData::getRemote($status);
        if($pushdata){
            return "<div class='alert alert-success' style='text-align: center'>Berhasil</div> <script>reload(1000);</script>";
        }else{
            return "<div class='alert alert-warning' style='text-align: center'>Gagal</div>";

        }

    }
}
