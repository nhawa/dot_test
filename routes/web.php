<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->get('/',function(){
    $data = [
        [
            'name'  => 'struktur data dan logika',
            'url'   => url('/test1')
        ],
        [
            'name'  => 'Backend engineering test',
            'url'   => url('/test2')
        ]
    ];
    return response()->json($data);
});

$router->get('test1','DotTestController@test1');
$router->post('test1','DotTestController@searchNumber');

//$router->get('testc','RajaOngkirController@getcity');
//$router->get('testp','RajaOngkirController@getProvince');
//$router->get('save','RajaOngkirController@saveToDB');

$router->post('login','UserController@login');
$router->group(['middleware'=>'auth'], function () use ($router){
    $router->get('search/provinces','AreaController@getProvince');
    $router->get('search/cities','AreaController@getcity');
});
