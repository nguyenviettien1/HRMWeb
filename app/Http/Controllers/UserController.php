<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\BAccount;

class UserController extends Controller
{
    public function getDanhSach(){
        $account = Account::all();
        return view('admin.account.danhsach',['account'=>$account]);
    }

    public function getThem(){
        $nhanvien = BAccount::where('status',1)->get();
        return view('admin.account.them',['nhanvien'=>$nhanvien]);
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'userName'=>'unique:account,userName',
            'password'=>'min:3|max:32',
            'confirmPassword'=>'same:password',
        ],
        [
            'userName.unique'=>'Tài khoản đã tồn tại',
            'password.min'=>'Mật khẩu tối thiểu phải 3 kí tự',
            'password.max'=>'Mật khẩu tối đa là 32 kí tự',
            'confirmPassword.same'=>'Mật khẩu nhập lại không khớp',
        ]);
        $account = new Account;
        $account->userID = $request->userID;
        $account->userName = $request->userName;
        $account->password = bcrypt($request->password);
        $account->permission = $request->permission;

        $account->save();
        return redirect('admin/user/danhsach')->with('thongbao', 'Thêm thành công tài khoản');
        
    }

    public function getSua($id){
        $account=Account::find($id);
        $nhanvien = BAccount::where('status',1)->get();
        return view('admin.account.sua',['account'=>$account,'nhanvien'=>$nhanvien]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
        [
            'password'=>'min:3|max:32',
            'confirmPassword'=>'same:password',
        ],
        [
            'password.min'=>'Mật khẩu tối thiểu phải 3 kí tự',
            'password.max'=>'Mật khẩu tối đa là 32 kí tự',
            'confirmPassword.same'=>'Mật khẩu nhập lại không khớp',
        ]);
        $account=Account::find($id);
        $account->userID = $request->userID;
        $account->userName = $request->userName;
        $account->permission = $request->permission;
        if($request->changePassword=="on"){
            $this->validate($request,
        [
            
            'password'=>'min:3|max:32',
            'passwordAgain'=>'same:password'
        ],
        [
            'password.min'=>'Password phải có ít nhất 3 kí tự nhiều nhất 25 kí tự',
            'password.max'=>'Password phải có ít nhất 3 kí tự nhiều nhất 25 kí tự',
            'passwordAgain.same'=>'Password bạn nhập lại không khớp',
            
        ]);
            $account->password=bcrypt($request->password);
        }
        
        $account->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao', 'Sửa thành công tài khoản');
    }

    public function getXoa($id){
        $account=Account::find($id);
        $account->delete();
        return redirect('admin/user/danhsach')->with('thongbao', 'Xóa thành công tài khoản');
    }
    
    public function getDangNhapAdmin(){
        return view('admin.login');
    }

    /**
     * @param LoginRequest $request
     * @return redirect true -> admin || false -> dangnhap
     */
    public function postDangNhapAdmin(LoginRequest $request)
    {
        $arrLogin = [
            'userName' => $request->userName, 
            'password' => $request->password
        ];

        if(Auth::attempt($arrLogin)) {
            return redirect()->route('list-staff');
        }

        return redirect()->back()->with('thongbao', config('error.redirect_with.login'));
    }
}