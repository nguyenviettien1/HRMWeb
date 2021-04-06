@extends('admin.layout.index')


@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Thông báo</h2>
                            <div style="width:100%;position: relative;">
                                <a href="admin/thongbao/them" class="btn btn-primary" style="right: 0 ;position: absolute;">Thêm mới</a>
                            </div>
                            <p class="pageheader-text">Notification</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Thông báo</li>
                                        <li class="breadcrumb-item"><a href="admin/thongbao/danhsach" class="breadcrumb-link">Danh sách</a></li>
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
                                <table class="table table-bordered first">
                                <tbody>
                                    @foreach($thongbao as $tb)
                                    <tr>
                                        <td>
                                            <img width="100px" src="upload/notification/{{$tb->image}}" />
                                        </td>
                                        <td>
                                            Tiêu đề: {{$tb->title}}
                                            <br>
                                            Nội dung: {{$tb->content}}
                                        </td>
                                        <td class="center"><i class="fas fa-edit"></i><a href="admin/thongbao/sua/{{$tb->id}}">Sửa</a></td>
                                        <td class="center"><i class="fas fa-trash-alt"></i><a href="admin/thongbao/xoa/{{$tb->id}}">Xóa</a></td>
                                    <tr>
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

