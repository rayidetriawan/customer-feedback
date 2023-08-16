<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    public function karyawan(){
        return $this->belongsTo('\App\Karyawan','id_user','nik');
    }
    public function customer(){
        return $this->belongsTo('\App\Customer','id_user','email');
    }
}
