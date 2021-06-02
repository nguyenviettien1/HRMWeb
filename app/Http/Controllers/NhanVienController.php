<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentDetail;
use App\Models\PositionDetail;
use App\Models\BAccount;
class NhanVienController extends Controller
{
    public function getDanhSach(){
       $nhanvien = BAccount::orderBy('id','DESC')->get();
       return view('admin.baccount.danhsach',['nhanvien'=>$nhanvien]);

    }

    public function getLienLac(){
        $nhanvien = BAccount::all();
        return view('admin.baccount.lienlac',['nhanvien'=>$nhanvien]);
 
    }

    public function getBaoHiem(){
        $nhanvien = BAccount::where('insurance',1)->get();
        return view('admin.insurance.danhsach',['nhanvien'=>$nhanvien]);
 
    }

    public function getThem(){
        $vitri = PositionDetail::all();
        $phongban = DepartmentDetail::all();
        return view('admin.baccount.them',['vitri'=>$vitri,'phongban'=>$phongban]);
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'userCD'=>'unique:baccount,userCD',
            'email'=>'unique:baccount,email',
            'phone'=>'unique:baccount,phone',
        ],
        [
            'userCD.unique'=>'Mã nhân viên đã tồn tại',
            'email.unique'=>'Email đã tồn tại',
            'phone.unique'=>'Số điện thoại đã tồn tại',
        ]);
       $nhanvien = new BAccount;
       $nhanvien->userCD = $request->userCD;
       $nhanvien->name = $request->name ;
       $nhanvien->age = $request->age ;
       $nhanvien->gender = $request->gender ;
       $nhanvien->email = $request->email ;
       $nhanvien->phone = $request->phone ;
       $nhanvien->address = $request->address ;
       $nhanvien->dateOfBirth = $request->dateOfBirth ;
       $nhanvien->education = $request->education ;
       $nhanvien->ethnicity = $request->ethnicity ;
       $nhanvien->religion = $request->religion ;
       $nhanvien->positionID = $request->positionID ;
       $nhanvien->departmentID = $request->departmentID ;
       $nhanvien->status = $request->status ;
       $nhanvien->insurance = $request->insurance ;
       $nhanvien->dayToWork = $request->dayToWork ;
       if($request->hasFile('avatar')){
           $file = $request->file('avatar');
           $name = $file->getClientOriginalName();
           $Hinh = $name;
           while(file_exists("upload/nhansu/".$Hinh))
           {
            $Hinh = rand()."-".$name;
           };
           $file->move("upload/nhansu",$Hinh);
           $nhanvien->avatar = $Hinh;
           $nhanvien->avatarMobile = base64_encode(file_get_contents("upload/nhansu/".$Hinh));
       }
       $nhanvien->save();

       $phongban = DepartmentDetail::find($nhanvien->departmentID);
       $x = $phongban->total;
       $phongban->total = $x+1;
       $phongban->save();

       $vitri = PositionDetail::find($nhanvien->positionID);
       $x = $vitri->total;
       $vitri->total = $x+1;
       $vitri->save();

       return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Thêm thành công nhân sự');
    }

    public function getSua($id){
        $vitri = PositionDetail::all();
        $phongban = DepartmentDetail::all();
        $nhanvien=BAccount::find($id);
        return view('admin.baccount.sua',['nhanvien'=>$nhanvien,'vitri'=>$vitri,'phongban'=>$phongban]);
    }

    public function postSua(Request $request,$id){
        
       $nhanvien=BAccount::find($id);
       $nhanvien->userCD = $request->userCD;
       $nhanvien->name = $request->name ;
       $nhanvien->age = $request->age ;
       $nhanvien->gender = $request->gender ;
       $nhanvien->email = $request->email ;
       $nhanvien->phone = $request->phone ;
       $nhanvien->address = $request->address ;
       $nhanvien->dateOfBirth = $request->dateOfBirth ;
       $nhanvien->education = $request->education ;
       $nhanvien->ethnicity = $request->ethnicity ;
       $nhanvien->religion = $request->religion ;
       $nhanvien->positionID = $request->positionID ;
       $nhanvien->departmentID = $request->departmentID ;
       $nhanvien->status = $request->status ;
       $nhanvien->insurance = $request->insurance ;
       $nhanvien->dayToWork = $request->dayToWork ;
       if($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $name = $file->getClientOriginalName();
        $Hinh = $name;
        while(file_exists("upload/nhansu/".$Hinh))
        {
            $Hinh = rand()."-".$name;
        };
        $file->move("upload/nhansu",$Hinh);
        unlink("upload/nhansu/".$nhanvien->avatar);
        $nhanvien->avatar = $Hinh;
        $nhanvien->avatarMobile = base64_encode(file_get_contents("upload/nhansu/".$Hinh));
        }
        
       $nhanvien->save();

        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Sửa thành công nhân sự');
    }

    public function getXoa($id){
        $nhanvien=BAccount::find($id);
        $nhanvien->delete();

        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Xóa thành công nhân sự');
    }
}
