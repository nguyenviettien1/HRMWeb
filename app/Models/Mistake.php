<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    protected $table = "mistake";
    public function nhanvien(){
        return $this->belongsTo('App\Models\BAccount','userID','id');
    }
}
