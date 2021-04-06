<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class InforController extends Controller
{
    public function getGioiThieu(){
        return view('admin.information.gioithieu');
    }
    public function getLienHe(){
        return view('admin.information.lienhe');
    }
    public function getDiaChi(){
        return view('admin.information.diachi');
    }
}