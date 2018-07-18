<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ROProvince extends Model
{
    protected $table = 'ro_province';

    public static function getProvinceWithID($id)
    {
        return self::where('province_id',$id)->first();
    }

}
