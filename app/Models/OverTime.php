<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverTime extends Model
{
    protected $table = "overtime";
    public function nhanvien(){
        return $this->belongsTo('App\Models\BAccount','userID','id');
    }
}
