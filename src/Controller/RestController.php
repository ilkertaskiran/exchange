<?php
/**
 * Created by PhpStorm.
 * User: Kaan
 * Date: 10.01.2019
 * Time: 00:33
 */

namespace App\Controller;


class RestController
{
    function getDataByUrl($url=''){
        if($url == '') return false;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 90);
        $result = curl_exec($curl);

        return json_decode($result,true);
    }
}