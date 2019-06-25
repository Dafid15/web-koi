<?php
/**
 * Created by PhpStorm.
 * User: IKIDAFID
 * Date: 03-May-19
 * Time: 05:38
 */

namespace App\Firebase;
use App\Http\Controllers\Backend\BackendController;

use function JmesPath\search;

class FirebaseData
{
    const DEFAULT_URL = 'https://laravelforfirebase.firebaseio.com/';
    const DEFAULT_TOKEN = 'isgXXwSfOouIKnnWuOOdgNg5JaiYtNoFwqFu1Bch';
    const DEFAULT_PATH = '/DFROBOT/PH';
    const DEFAULT_PATH2 = '/DS18B20/Temperature';
    const DEFAULT_PATH3 = '/status';

    public static  function getPH()
    {
        $firebase = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
        $data = json_decode($firebase->get(self::DEFAULT_PATH ));
        $currentData=[];
        $sumData=0;
        foreach ($data as $key =>$item){
            $currentData[]=str_replace('pH','',str_replace(' ','',$item));
            $sumData+=floatval(str_replace('pH','',str_replace(' ','',$item)));
        }

        $average=$sumData/count($currentData);
        $params=[
            'averageData'=>$average,
            'data'=>$currentData
        ];
        return $params;
    }
    public static function getSuhu(){
        $firebase = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
        //dd($firebase->get(self::DEFAULT_PATH3 ));
        $data = json_decode($firebase->get(self::DEFAULT_PATH2 ));
        $currentData=[];
        $sumData=0;
        foreach ($data as $key =>$item){
            $currentData[]=str_replace(' ','',str_replace(' ','',$item));
            $sumData+=floatval(str_replace(' ','',str_replace(' ','',$item)));
        }
        $average=$sumData/count($currentData);
        $params=[
            'averageSuhu'=>$average,
            'dataSuhu'=>$currentData
        ];
        return $params;
    }

    public  static  function getStatus(){
        $firebase = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
        $data2 = json_decode($firebase->get(self::DEFAULT_PATH3 ));
        return $data2;
    }
    public static function getRemote($pushData){
        $data=[
            'status'=>$pushData
        ];
        $firebase = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
        $data2 = json_decode($firebase->get(self::DEFAULT_PATH3 ));
        $statuspush=json_encode($firebase->update(self::DEFAULT_PATH3,$data));
        return $statuspush;
    }
}