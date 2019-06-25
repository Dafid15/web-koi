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
        $params=[
            'pHdata'=>$data['data'],
            'averagepH'=>$data['averageData'],
            'SuhuData'=>$data2['dataSuhu'],
            'averageSuhu'=>$data2['averageSuhu']
        ];
        return json_encode($params);
    }
    public function StatusJson(Request $request){
        $data=FirebaseData::getPH();
        $data2=FirebaseData::getSuhu();

        if((0<=$data) &&(2<=$data)){
            if ((0<=$data2) &&(14<=$data2)){
                 $status="danger";
            }
            elseif ((15<=$data2) &&(30<=$data2)){
                $status="warning";
            }
            else{
                $status="danger";
            }
        }
        elseif ((3<=$data) &&(6<=$data)){
            if ((0<=$data2) &&(14<=$data2)){
                $status="danger";
            }
            elseif ((15<=$data2) &&(30<=$data2)){
                $status="warning";
            }
            else{
                $status="danger";
            }
        }
        elseif ((7<=$data) &&(10<=$data)){
            if ((0<=$data2) &&(14<=$data2)){
                $status="warning";
            }
            elseif ((15<=$data2) &&(30<=$data2)){
                $status="normal";
            }
            else{
                $status="warning";
            }
        }
        elseif ((11<=$data) &&(14<=$data)){
            if ((0<=$data2) &&(14<=$data2)){
                $status="danger";
            }
            elseif ((15<=$data2) &&(30<=$data2)){
                $status="warning";
            }
            else{
                $status="danger";
            }
        }
        return json_encode($status);
    }
    public function remotedevice(){
        return view('dashboard.remote');
    }
    public function statusremote(Request $request){
        $status= $request->input('status');
        $pushdata=FirebaseData::getRemote($status);
        return $pushdata;

    }
}
