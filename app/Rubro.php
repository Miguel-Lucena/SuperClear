<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//agrego esto tambien
//use App\Product;

class Rubro extends Model
{
    //agrego esto
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
