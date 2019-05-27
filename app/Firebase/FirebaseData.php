<?php
/**
 * Created by PhpStorm.
 * User: IKIDAFID
 * Date: 03-May-19
 * Time: 05:38
 */

namespace App\Firebase;


use function JmesPath\search;

class FirebaseData
{
    const DEFAULT_URL = 'https://laravelforfirebase.firebaseio.com/';
    const DEFAULT_TOKEN = 'ns5t4Z2nMmgwmMVysDU13gL6bGydO4BWpQFW3uIT';
    const DEFAULT_PATH = '/SEN0161/PH';
    const DEFAULT_PATH2 = '/DHT11/Temperature';

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
}