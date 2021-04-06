<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    protected $table = "checkin";
    public function nhanvien(){
        return $this->belongsTo('App\Models\BAccount','userID','id');
    }
}