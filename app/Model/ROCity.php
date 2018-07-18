<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ROCity extends Model
{
    protected $table = 'ro_city';

    public static function getCityWithID($id)
    {
        return self::where('city_id',$id)->first();
    }

}
