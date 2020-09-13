<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    //protected $table = 'towns';
    
    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    //Para probar con otro video
    /*
    public static function towns($id){
       return Town::where('province_id', $id)->get();
       
    }*/
}
