<?php

use Illuminate\Support\Facades\Route;
use App\Models\PositionDetail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Đăng nhập cho admin để quản lý
Route::get('admin/dangnhap','App\Http\Controllers\UserController@getDangNhapAdmin');
Route::post('admin/dangnhap','App\Http\Controllers\UserController@postDangNhapAdmin');
// Đăng xuất admin thoát khỏi trang quản lý
Route::get('admin/logout','App\Http\Controllers\UserController@getDangXuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

    Route::group(['prefix'=>'vitri'],function(){
        Route::get('danhsach','App\Http\Controllers\ViTriController@getDanhSach');
        
        Route::get('them', 'App\Http\Controllers\ViTriController@getThem');
        Route::post('them', 'App\Http\Controllers\ViTriController@postThem');

        Route::get('sua/{id}', 'App\Http\Controllers\ViTriController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\ViTriController@postSua');

        Route::get('xoa/{id}','App\Http\Controllers\ViTriController@getXoa');
    });

    Route::group(['prefix'=>'phongban'],function(){
        Route::get('danhsach','App\Http\Controllers\PhongBanController@getDanhSach');
        
        Route::get('them', 'App\Http\Controllers\PhongBanController@getThem');
        Route::post('them', 'App\Http\Controllers\PhongBanController@postThem');

        Route::get('sua/{id}', 'App\Http\Controllers\PhongBanController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\PhongBanController@postSua');

        Route::get('xoa/{id}','App\Http\Controllers\PhongBanController@getXoa');
        
    });

    Route::group(['prefix'=>'congviec'],function(){
        Route::get('danhsach','App\Http\Controllers\CongViecController@getDanhSach');
        
        Route::get('them', 'App\Http\Controllers\CongViecController@getThem');
        Route::post('them', 'App\Http\Controllers\CongViecController@postThem');

        Route::get('sua/{id}', 'App\Http\Controllers\CongViecController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\CongViecController@postSua');

        Route::get('xoa/{id}','App\Http\Controllers\CongViecController@getXoa');
        
    });

    Route::group(['prefix'=>'nhanvien'],function(){
        Route::get('danhsach','App\Http\Controllers\NhanVienController@getDanhSach')->name('list-staff');
        Route::get('lienlac','App\Http\Controllers\NhanVienController@getLienLac');
        Route::get('baohiem','App\Http\Controllers\NhanVienController@getBaoHiem');
        
        Route::get('them', 'App\Http\Controllers\NhanVienController@getThem');
        Route::post('them', 'App\Http\Controllers\NhanVienController@postThem');

        Route::get('sua/{id}', 'App\Http\Controllers\NhanVienController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\NhanVienController@postSua');

        Route::get('xoa/{id}','App\Http\Controllers\NhanVienController@getXoa');
        
    });

    Route::group(['prefix'=>'thongbao'],function(){
        Route::get('danhsach','App\Http\Controllers\ThongBaoController@getDanhSach');
        
        Route::get('them', 'App\Http\Controllers\ThongBaoController@getThem');
        Route::post('them', 'App\Http\Controllers\ThongBaoController@postThem');

        Route::get('sua/{id}', 'App\Http\Controllers\ThongBaoController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\ThongBaoController@postSua');

        Route::get('xoa/{id}','App\Http\Controllers\ThongBaoController@getXoa');
        
    });

    Route::group(['prefix'=>'user'],function(){
        Route::get('danhsach','App\Http\Controllers\UserController@getDanhSach');
        
        Route::get('them', 'App\Http\Controllers\UserController@getThem');
        Route::post('them', 'App\Http\Controllers\UserController@postThem');

        Route::get('sua/{id}', 'App\Http\Controllers\UserController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\UserController@postSua');

        Route::get('xoa/{id}','App\Http\Controllers\UserController@getXoa');
        
    });

    Route::group(['prefix'=>'information'],function(){
        Route::get('gioithieu','App\Http\Controllers\InforController@getGioiThieu');
        Route::get('lienhe','App\Http\Controllers\InforController@getLienHe');
        Route::get('diachi','App\Http\Controllers\InforController@getDiaChi');
    });
    
});
