<?php
/**
 * Created by PhpStorm.
 * User: Kaan
 * Date: 10.01.2019
 * Time: 00:37
 */

namespace App\Controller;


class AdapterController
{
    private $providerInfoList = array(
        "provider1" => array(
            "url" => "http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0",
            "params" => array("symbol","amount"),
            "stringConvert" => array(
                "USDTRY" => "usd",
                "EURTRY" => "eur",
                "GBPTRY" => "gbp",
            )
        ),
        "provider2" => array(
            "url" => "http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3",
            "params" => array("kod","oran"),
            "stringConvert" => array(
                "DOLAR" => "usd",
                "AVRO" => "eur",
                "İNGİLİZ STERLİNİ" => "gbp",
            )
        )
    );

    function getCleanData(){
        include_once "RestController.php";
        $rest = new RestController();
        $cleanExchangeList = array(
            "eur" => 0,
            "usd" => 0,
            "gbp" => 0
        );
        foreach($this->providerInfoList as $key => $val){
            $exchangeList = $rest->getDataByUrl($val['url']);
            if(array_key_exists("result",$exchangeList)) $exchangeList = $exchangeList['result'];
            if(is_array($exchangeList)){
                for($i=0;$i<count($exchangeList);$i++){
                    if($cleanExchangeList[$val['stringConvert'][$exchangeList[$i][$val['params'][0]]]] == 0 ||
                        $cleanExchangeList[$val['stringConvert'][$exchangeList[$i][$val['params'][0]]]] > $exchangeList[$i][$val['params'][1]]
                    ){
                        $cleanExchangeList[$val['stringConvert'][$exchangeList[$i][$val['params'][0]]]] = $exchangeList[$i][$val['params'][1]];
                    }else continue;
                }
            }else return false;
        }
        return $cleanExchangeList;
    }
}