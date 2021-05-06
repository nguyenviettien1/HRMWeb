<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\BAccount;
use App\Models\PositionDetail;
use App\Models\DepartmentDetail;
use App\Models\CheckIn;
use App\Models\Timekeeping;
class ChamCongController extends Controller
{
    public function getDanhSach(){
        $chamcong = CheckIn::all();
        return view('admin.checkin.danhsach',['chamcong'=>$chamcong]);
    }

    public function getTonghop(){
        $tonghopCC = Timekeeping::all();
        return view('admin.checkin.tonghop',['tonghopCC'=>$tonghopCC]);
    }

    public function getTuDong(){
        $gioDiLam = date("h:i:s",1620176400);
        $gioOverTime = date("h:i:s",1620212400);
        $nhanvien = BAccount::where('status',1)->get();
        $userId = array();
        foreach($nhanvien as $nv){
            array_push($userId, $nv->id);
        };
        $today = date("d");
        $monthX = date('Y-m-d',strtotime('-35 day',strtotime(date('Y-m-d'))));
        
        foreach($userId as $u){
            $tonghop = new Timekeeping;
            $checkin = CheckIn::where('month',$monthX)->where('userID',$u)->get();
            $timeWork = 0;
            $dimuon = 0;
            $overT = 0;
            foreach($checkin as $ci){
                if($ci->workTime > 32400){
                    $timeWork +=2;
                }else if($ci->workTime >16200 ){
                    $timeWork +=1;
                };
                $gioCheckIn = date("h:i:s",$ci->checkInAt);
                if($gioCheckIn > $gioDiLam){
                    $dimuon++;
                }
                $gioCheckOut = date("h:i:s",$ci->checkOutAt);
                if($gioCheckOut > $gioOverTime){
                    $overT++;
                }
            }
            $tonghop->userID = $u;
            $tonghop->month = $monthX;
            $tonghop->workDayNbr = $timeWork;
            $tonghop->overTimeNbr = $overT;
            $tonghop->lateNbr = $dimuon;
            $tonghop->save();
            
        }
        return view('admin.checkin.test');
    }

    public function getTest(){
    $nhanvien = BAccount::where('status',1)->get();
    $userId = array();
    foreach($nhanvien as $nv){
        array_push($userId, $nv->id);
    };
    $x = 1620176170;
    $y = 1620210840;    
    foreach($userId as $u){
        for ($i = 1; $i < 32; $i++){
            $chamcong = new CheckIn;
            $chamcong->userID = $u;
            $chamcong->month = date('Y-m-d',strtotime('-35 day',strtotime(date('Y-m-d'))));
            $chamcong->day = date_create('2021-03-'.$i);
            $chamcong->checkInAt =$x;
            $chamcong->checkOutAt =$y;
            $chamcong->workTime =$y-$x;
            $chamcong->save();

        }
    }
        return view('admin.checkin.test');
    }
}
