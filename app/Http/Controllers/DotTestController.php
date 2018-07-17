<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use Illuminate\Http\Request;

class DotTestController extends Controller
{
    /**
     * @return \Illuminate\View\View
     * view/test1.blade.php
     */
    public function test1(){
        return view('test1');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     *
     * view/test1.blade.php
     * with number and arr
     */
    public function SearchNumber(Request $request){
        $array = explode(',',$request->arr); //turn text to array
        $array = array_unique($array); //eliminate duplicate in array
        rsort($array);// recursive sort array
        $number = $array[1]; //get second largest of array
        $arr = $request->arr;
        return view('test1',compact('number','arr'));
    }
    public function test2Sprint1(){
        $client = new GuzzleHttp\Client();

        return 'ini test2';
    }
}
