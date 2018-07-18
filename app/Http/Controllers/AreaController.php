<?php

namespace App\Http\Controllers;

use App\Model\ROCity;
use App\Model\ROProvince;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function getCity(Request $request){

        if (config('app.area_source')=='DB')
            $city = ROCity::getCityWithID($request->id); //get from database
        else
            $city = (new RajaOngkirController())->getCityById($request->id); //get from API rajaongkir
        return $this->response($city);
    }

    public function getProvince(Request $request){
        if (config('app.area_source')=='DB')
            $province = ROProvince::getProvinceWithID($request->id); // get from database
        else
            $province = (new RajaOngkirController())->getProvinceById($request->id); //get from API rajaongkir
        return $this->response($province);
    }
}
