<?php

namespace App\Http\Controllers;

use App\Model\ROCity;
use App\Model\ROProvince;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function getCity(Request $request){
        $city = ROCity::getCityWithID($request->id); //get from database
        return $this->response($city);
    }

    public function getProvince(Request $request){
        $province = ROProvince::getProvinceWithID($request->id); // get from database
        return $this->response($province);
    }
}
