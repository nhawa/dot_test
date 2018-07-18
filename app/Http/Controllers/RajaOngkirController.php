<?php

namespace App\Http\Controllers;
use App\Model\ROCity;
use App\Model\ROProvince;
use GuzzleHttp;

class RajaOngkirController extends Controller
{
    private $api_key = '0df6d5bf733214af6c6644eb8717c92c';
    private $host = 'https://api.rajaongkir.com/starter/';

    public function sendGuzzle($endpoint, $method='GET'){
        try{
            $client = new GuzzleHttp\Client();
            $get = $client->request($method,$this->host.$endpoint,[
                'headers' => [
                    'key'        => $this->api_key,
                ]
            ]);
            return json_decode($get->getBody());
        }catch (\Exception $e){
            return json_decode(($e->getResponse()->getBody(true)));
        }
    }


    public function getProvinceById($id){
//        $res = realpath(__DIR__.'../../../../public/province.json');
//        $res = file_get_contents($res);
////        dd(json_decode($res));
//        $res =  json_decode($res);
        $res = $this->sendGuzzle('province?id='.$id);
//        return $res;
        if ($res->rajaongkir->status->code == 200){
            return $res->rajaongkir->results;
        }else{
            return null;
        }
    }

    public function getCityById($id){
//        $res = realpath(__DIR__.'../../../../public/city.json');
//        $res = file_get_contents($res);
////        dd(json_decode($res));
//        $res =  json_decode($res);
        $res = $this->sendGuzzle('city?id='.$id);
//        return $res;
        if ($res->rajaongkir->status->code == 200){
            return $res->rajaongkir->results;
        }else{
            return null;
        }
    }

    public function getProvince(){
        $res = $this->sendGuzzle('province');
        return $res;
    }

    public function getCity(){
        $res = $this->sendGuzzle('city');
        return $res;
    }

    public function saveToDB(){
        $now = date('Y-m-d H:i:s');
        $res = $this->getProvince();
        if ($res->rajaongkir->status->code == 200){
            foreach ($res->rajaongkir->results as $result){
                $province[] = [
                    'province_id'            => $result->province_id,
                    'province'          => $result->province,
                    'created_at'    => $now,
                    'updated_at'    => $now
                ];
            }
            ROProvince::truncate();
            $insert = ROProvince::insert($province);
            if (!$insert){
                return [
                    'status'    => 500,
                    'message'   => 'province not inserted'
                ];
            }
        }
        $res = $this->getCity();
        if ($res->rajaongkir->status->code == 200){
            foreach ($res->rajaongkir->results as $result){
                $city[] = [
                    'city_id'       => $result->city_id,
                    'province_id'   => $result->province_id,
                    'province'      => $result->province,
                    'type'          => $result->type,
                    'city_name'          => $result->city_name,
                    'postal_code'   => $result->postal_code,
                    'created_at'    => $now,
                    'updated_at'    => $now
                ];
            }
            ROCity::truncate();
            $insert = ROCity::insert($city);
            if (!$insert){
                return [
                    'status'    => 500,
                    'message'   => 'province not inserted'
                ];
            }
        }
        return [
            'status'    => 200,
            'message'   => 'success'
        ];
    }
}
