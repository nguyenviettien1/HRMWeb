<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timekeeping extends Model
{
    protected $table = "timekeeping";
    public function nhanvien(){
        return $this->belongsTo('App\Models\BAccount','userID','id');
    }
}