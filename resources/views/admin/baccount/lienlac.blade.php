@extends('admin.layout.index')


@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Nhân sự</h2>
                            <p class="pageheader-text">BAccount</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Nhân sự</li>
                                        <li class="breadcrumb-item"><a href="admin/nhanvien/lienlac" class="breadcrumb-link">Trạng thái và TT liên lạc</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                   
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                @if(session('thongbao'))
                                    <div class="alert alert-success">
                                    {{session('thongbao')}}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th style="font-weight:bold; background-color:yellow">Mã NV</th>
                                                <th style="font-weight:bold; background-color:yellow">Tên nhân viên</th>
                                                <th style="font-weight:bold; background-color:yellow">Email</th>
                                                <th style="font-weight:bold; background-color:yellow">Số điện thoại</th>
                                                <th style="font-weight:bold; background-color:yellow">Trạng thái</th>
                                                <th style="font-weight:bold; background-color:yellow">Sửa</th>
                                                <th style="font-weight:bold; background-color:yellow">Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($nhanvien as $nv)
                                            <tr>
                                                <td>{{$nv->userCD}}</td>
                                                <td>{{$nv->name}}</td>
                                                <td>{{$nv->email}}</td>
                                                <td>{{$nv->phone}}</td>
                                                <td>
                                                @if($nv->status == 1)
                                                    {{"Hoạt động"}}
                                                    @else
                                                    {{"Không hoạt động"}}
                                                @endif     
                                                </td>
                                                <td class="center"><i class="fas fa-edit"></i><a href="admin/nhanvien/sua/{{$nv->id}}">Sửa</a></td>
                                                <td class="center"><i class="fas fa-trash-alt"></i><a href="admin/nhanvien/xoa/{{$nv->id}}">Xóa</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
@endsection