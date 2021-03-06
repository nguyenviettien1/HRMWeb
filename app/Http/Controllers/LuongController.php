<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\BAccount;
use App\Models\PositionDetail;
use App\Models\DepartmentDetail;
use App\Models\CheckIn;
use App\Models\Timekeeping;
use App\Models\Salary;
class LuongController extends Controller
{
    public function getDanhSach(){
        $luong = Salary::all();
        return view('admin.salary.danhsach',['luong'=>$luong]);
    }
    public function getCongThuc(){
        return view('admin.salary.congthuc');
    }
    public function getTinhLuong(){
        $nhanvien = BAccount::where('status',1)->get();
        $userId = array();
        foreach($nhanvien as $nv){
            array_push($userId, $nv->id);
        };
        $today = date("d");
        foreach($userId as $u){
            $luong = new Salary;
            $luong->userID = $u;
            
            $luong->month = date('Y-m-d',strtotime('-'.$today.' day',strtotime(date('Y-m-d'))));

            $luong->salaryBase = 4000000;
            $luong->salaryTreatment = 100000;
            $thChamCong = Timekeeping::where('userID',$luong->userID)->where('month', date('Y-m-d',strtotime('-'.$today.' day',strtotime(date('Y-m-d')))))->get();
            if($thChamCong){
                foreach($thChamCong as $th){
                    $luong->salaryBase = 125000* $th->workDayNbr;
                    $luong->salaryTreatment = 500000*$th->overTimeNbr - 30000*$th->lateNbr;
                }
            }
            
            $luong->salaryWork = 1000000;
            $congviec=Work::where('userID',$luong->userID)->where('month', date('Y-m-d',strtotime('-'.$today.' day',strtotime(date('Y-m-d')))))->get();
            if($congviec){
                foreach($congviec as $cv){
                    $luong->salaryWork = $cv->progress *2000000;
                }
            }
            $nhanvien1 = BAccount::find($u);
            if($nhanvien1->dayToWork < date('Y-m-d',strtotime('-365 day',strtotime(date('Y-m-d'))))) {
                $luong->salarySeniority = 500000;
            }else{
                $luong->salarySeniority = 0;
            };
            $luong->total =  ($luong->salarySeniority + $luong->salaryWork + $luong->salaryBase) *$nhanvien1->vitri->coefficientSalary + $luong->salaryTreatment;
            $luong->save();
        }
        
        return view('admin.salary.tinhluong');
    }
}
