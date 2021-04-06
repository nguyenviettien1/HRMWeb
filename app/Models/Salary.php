<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = "salary";
    public function nhanvien(){
        return $this->belongsTo('App\Models\BAccount','userID','id');
    }
}
