<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\BAccount;
class CongViecController extends Controller
{
    public function getDanhSach(){
        $congviec = Work::all();
        return view('admin.work.danhsach',['congviec'=>$congviec]);
    }

    public function getThem(){
        $nhanvien = BAccount::where('status',1)->get();
        return view('admin.work.them',['nhanvien'=>$nhanvien]);
    }

    public function postThem(Request $request){
        
        $work = new Work;
        $work->userID = $request->userID;
        $work->month = $request->month;
        $work->actual = $request->actual;
        $work->target = $request->target;
        $work->progress = $request->actual/$request->target;
        $work->save();
        return redirect('admin/congviec/danhsach')->with('thongbao', 'Thêm thành công KPI tháng');
        
    }

    public function getSua($id){
        $congviec=Work::find($id);
        $nhanvien = BAccount::where('status',1)->get();
        return view('admin.work.sua',['congviec'=>$congviec,'nhanvien'=>$nhanvien]);
    }

    public function postSua(Request $request,$id){
        
        $work=Work::find($id);
        $work->userID = $request->userID;
        $work->month = $request->month;
        $work->actual = $request->actual;
        $work->target = $request->target;
        $work->progress = $request->actual/$request->target;
        $work->save();
        return redirect('admin/congviec/danhsach')->with('thongbao', 'Sửa thành công KPI công việc');
       
    }

    public function getXoa($id){
        $work=Work::find($id);
        $work->delete();
        return redirect('admin/congviec/danhsach')->with('thongbao', 'Xóa thành công KPI công việc');
    }

    public function getThemTuDong(){
        $nhanvien = BAccount::where('status',1)->get();
        $userId = array();
        foreach($nhanvien as $nv){
            array_push($userId, $nv->id);
        };

        foreach($userId as $u){
            $congviec = new Work;
            $congviec->userID = $u;
            $congviec->month = date('Y-m-d',strtotime('+6 day',strtotime(date('Y-m-d'))));
            $congviec->actual = 1;
            $congviec->target = 2;
            $congviec->progress = 0.5;
            $congviec->save();
        }
        
        return view('admin.work.themtudong');
    }
}
