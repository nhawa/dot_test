<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function response($data){
        if (is_null($data))
            $return = [
                'status'    => 204,
                'response'  => $data
            ];
        else
            $return = [
                'status'    => 200,
                'response'  => $data
            ];
        return response()->json($return);
    }
}
