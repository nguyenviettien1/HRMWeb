@extends('admin.layout.index')


@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Bảo hiểm</h2>
                            <p class="pageheader-text">Insurance</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Bảo hiểm</li>
                                        <li class="breadcrumb-item"><a href="admin/nhanvien/danhsach" class="breadcrumb-link">Danh sách bảo hiểm</a></li>
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
                                                <th style="font-weight:bold; background-color:yellow">Bảo hiểm</th>
                                                <th style="font-weight:bold; background-color:yellow">Giá</th>
                                                <th style="font-weight:bold; background-color:yellow">Sửa</th>
                                                <th style="font-weight:bold; background-color:yellow">Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($nhanvien as $nv)
                                            <tr>
                                                <td>{{$nv->userCD}}</td>
                                                <td>{{$nv->name}}</td>
                                                <td>
                                                @if($nv->insurance == 1)
                                                    {{"Có tham gia"}}
                                                    @else
                                                    {{"Không tham gia"}}
                                                @endif     
                                                </td>
                                                <td>500.000đ</td>
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