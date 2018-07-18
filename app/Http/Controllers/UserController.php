<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email',$request->email)->first();
        if (Hash::check($request->password,$user->password)){
            $apikey = base64_encode(str_random(20));
            $user->api_key = $apikey;
            $user->save();

            $diagnostic = array(
                "status"    => 200,
                "apikey"    => $apikey
            );
            return response()->json($diagnostic);
        }

        $diagnostic = array(
            "status"        => 401,
            "error_msgs"    => 'Unauthorized'
        );
        return response()->json($diagnostic);
    }
    //
}
