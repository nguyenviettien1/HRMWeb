<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Work;
use App\Models\BAccount;
use App\Models\DepartmentDetail;
use App\Models\PositionDetail;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
class TongQuanController extends Controller
{
    public function getNhanSu(){
        $nhanvien = BAccount::all();
        $nhanvien1 = BAccount::where('status',0)->get();
        $account = Account::all();
        $phongban = DepartmentDetail::all();
        $vitri = PositionDetail::all();
        $nhanvien2 = DB::table('baccount')
        ->leftJoin('account', 'baccount.id', '=', 'account.userID')
        ->join('positiondetail','baccount.positionID','=','positiondetail.id')
        ->join('departmentdetail','baccount.departmentID','=','departmentdetail.id')
        ->where('account.id', '=', null)
        ->get();
        return view('admin.dashboard.nhansu',
        ['nhanvien'=>$nhanvien,'nhanvien1'=>$nhanvien1,'nhanvien2'=>$nhanvien2,
        'account'=>$account,'phongban'=>$phongban,'vitri'=>$vitri]);
    }
    
}