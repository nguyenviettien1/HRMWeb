<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PositionDetail;
class ViTriController extends Controller
{
    public function getDanhSach(){
        $vitri = PositionDetail::all();
        return view('admin.positiondetail.danhsach',['vitri'=>$vitri]);
    }

    public function getThem(){
        return view('admin.positiondetail.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'description'=>'unique:positiondetail,description',
        ],
        [
            'description.unique'=>'vị trí đã tồn tại',
        ]);
        $vitri = new PositionDetail;
        $vitri->description = $request->description;
        $vitri->coefficientSalary = $request->coefficientSalary;
        $vitri->save();

        return redirect('admin/vitri/danhsach')->with('thongbao', 'Thêm thành công vị trí');
    }

    public function getSua($id){
        $vitri=PositionDetail::find($id);
        return view('admin.positiondetail.sua',['vitri'=>$vitri]);
    }

    public function postSua(Request $request,$id){
        
        $vitri=PositionDetail::find($id);
        $vitri->description = $request->description;
        $vitri->coefficientSalary = $request->coefficientSalary;
        $vitri->save();

        return redirect('admin/vitri/sua/'.$id)->with('thongbao', 'Sửa thành công vị trí');
    }

    public function getXoa($id){
        $vitri=PositionDetail::find($id);
        $vitri->delete();

        return redirect('admin/vitri/danhsach')->with('thongbao', 'Xóa thành công vị trí');
    }
}
