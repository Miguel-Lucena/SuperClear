<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    
    public function town()
    {
        return $this->belongsTo('App\Town');
    }
    
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }

}
