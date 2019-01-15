<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartoon extends Model
{
    public function getEndAttribute($key)
    {
        $end=$key==1?'已完结':'连载中';

        return $end;
    }
}
