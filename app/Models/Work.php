<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = "work";
    public function nhanvien(){
        return $this->belongsTo('App\Models\BAccount','userID','id');
    }
}
