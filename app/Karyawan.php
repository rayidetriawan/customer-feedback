<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public function departemen(){
        return $this->belongsTo('\App\Departemen','id_bag_dept');
    }
    public function jabatan(){
        return $this->belongsTo('\App\Jabatan','id_jabatan');
    }
    public function cabang(){
        return $this->belongsTo('\App\Branch','branch_id');
    }
}
