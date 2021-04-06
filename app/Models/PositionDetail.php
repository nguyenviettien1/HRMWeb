<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionDetail extends Model
{
    protected $table = "positiondetail";
    public function nhanvien(){
        return $this->hasMany('App\Models\BAccount','positionID','id');
    }
}
