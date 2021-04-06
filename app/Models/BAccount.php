<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BAccount extends Model
{
    protected $table = "baccount";
    public function vitri(){
        return $this->belongsTo('App\Models\PositionDetail','positionID','id');
    }
    public function phongban(){
        return $this->belongsTo('App\Models\DepartmentDetail','departmentID','id');
    }
    public function checkinout(){
        return $this->hasMany('App\Models\CheckIn','userID','id');
    }
}
