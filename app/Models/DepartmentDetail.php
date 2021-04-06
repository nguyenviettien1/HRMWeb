<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentDetail extends Model
{
    protected $table = "DepartmentDetail";
    public function nhanvien(){
        return $this->hasMany('App\Models\BAccount','departmentID','id');
    }
}
