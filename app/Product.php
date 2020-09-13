<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//agreggo el modelo
//use App\Rubro;
class Product extends Model
{
    //agrege esta funcion
    public function rubro()
    {
        return $this->belongsTo('App\Rubro');
    }
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function order_item()
    {
        return $this->belongsTo('App\OrderItem');
    }

}
