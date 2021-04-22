<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
class ThongBaoController extends Controller
{
    public function getDanhSach(){
        $thongbao = Notification::all();
        return view('admin.notification.danhsach',['thongbao'=>$thongbao]);
    }

    public function getThem(){
        return view('admin.notification.them');
    }


    public function postThem(Request $request){
        $this->validate($request,
        [
            'title'=>'unique:notification,title',
            'content'=>'unique:notification,content',
        ],
        [
            'title.unique'=>'Tiêu đề đã tồn tại',
            'content.unique'=>'Nội dung đã tồn tại',
        ]);
        $thongbao = new Notification;
        $thongbao->title = $request->title;
        $thongbao->content = $request->content;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $Hinh = $name;
            while(file_exists("upload/notification/".$Hinh))
            {
                $Hinh = rand()."-".$name;
            };
            $file->move("upload/notification",$Hinh);
            $thongbao->image = $Hinh;
        }
        $thongbao->imageMobile = base64_encode(file_get_contents("upload/notification/".$Hinh));
        $thongbao->save();
        return redirect('admin/thongbao/danhsach')->with('thongbao', 'Thêm thành công thông báo');
    }

    public function getSua($id){
        $thongbao=Notification::find($id);
        return view('admin.notification.sua',['thongbao'=>$thongbao]);
    }

    public function postSua(Request $request,$id){
        
       $thongbao=Notification::find($id);
       $thongbao->title = $request->title;
       $thongbao->content = $request->content ;
       
       if($request->hasFile('image')){
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $Hinh = $name;
        while(file_exists("upload/notification/".$Hinh))
        {
         $Hinh = rand()."-".$name;
        };
        $file->move("upload/notification",$Hinh);
        unlink("upload/notification/".$thongbao->image);
        $thongbao->image = $Hinh;
        }
        $thongbao->imageMobile = base64_encode(file_get_contents("upload/notification/".$Hinh));
       $thongbao->save();

        return redirect('admin/thongbao/sua/'.$id)->with('thongbao', 'Sửa thành công thông báo');
    }

    public function getXoa($id){
        $thongbao=Notification::find($id);
        $thongbao->delete();

        return redirect('admin/thongbao/danhsach')->with('thongbao', 'Xóa thành công thông báo');
    }
}
