<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

    //protected $table = 'provinces';
    public function towns()
    {
        return $this->hasMany('App\Town');
    }
    public function providers()
    {
        return $this->hasMany('App\Provider');
    }
}

