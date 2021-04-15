<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentDetail;
class PhongBanController extends Controller
{
    public function getDanhSach(){
        $phongban = DepartmentDetail::all();
        return view('admin.departmentdetail.danhsach',['phongban'=>$phongban]);
    }

    public function getThem(){
        return view('admin.departmentdetail.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'description'=>'unique:departmentdetail,description',
        ],
        [
            'description.unique'=>'Phòng ban đã tồn tại',
        ]);
        $phongban = new DepartmentDetail;
        $phongban->description = $request->description;
        $phongban->total = 0;
        $phongban->save();

        return redirect('admin/phongban/danhsach')->with('thongbao', 'Thêm thành công phòng ban');
    }

    public function getSua($id){
        $phongban=DepartmentDetail::find($id);
        return view('admin.departmentdetail.sua',['phongban'=>$phongban]);
    }

    public function postSua(Request $request,$id){
        
        $phongban=DepartmentDetail::find($id);
        $phongban->description = $request->description;
        $phongban->save();

        return redirect('admin/phongban/sua/'.$id)->with('thongbao', 'Sửa thành công phòng ban');
    }

    public function getXoa($id){
        $phongban=DepartmentDetail::find($id);
        $phongban->delete();

        return redirect('admin/phongban/danhsach')->with('thongbao', 'Xóa thành công phòng ban');
    }
}
