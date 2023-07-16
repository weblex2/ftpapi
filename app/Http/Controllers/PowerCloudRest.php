<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PowerCloudRest extends Controller
{
    function getToken(){
        $username="Fairtrade-Rest-Prod";
        $password="vQxKgfWgsvAY7Tp7E9FG";
        $context = "#".$username.":".$password;
        $url="https://app.powercloud.de/rest:client/9d4da1fe24e7da45dfc5c242af40d913";
        #$credentials = $context."#".$this->sc->username.":".$this->sc->password;
        $b64hash="Y2xpZW50I0ZhaXJ0cmFkZS1SZXN0LVByb2Q6dlF4S2dmV2dzdkFZN1RwN0U5Rkc=";  
        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Authorization: Basic " . base64_encode('Fairtrade-Rest-Prod:vQxKgfWgsvAY7Tp7E9FG')
        ); 

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        
        $res = curl_exec($ch);
        dump($res);
        //$result = json_decode($res,true);
    }
}
