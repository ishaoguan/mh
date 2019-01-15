<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartoon_list extends Model
{

    public $timestamps=false;
    public $table='cartoon_list';
    public function getUrlAttribute($key)
    {

      $url =  explode(',',trim($key))? : [trim($key)];
      return $url;
    }
}
