@extends('admin.layout.index')
@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
              
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Sửa thông báo </h2>
                            <p class="pageheader-text">Edit Notification</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Thông báo</li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Sửa</a></li>
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
                                @if(count($errors)>0)
                                    <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                    {{$err}}
                                    <br>
                                    @endforeach
                                    </div>
                                @endif
                                @if(session('thongbao'))
                                    <div class="alert alert-success">
                                    {{session('thongbao')}}
                                    </div>
                                @endif
                                    <form id="validationform" action="admin/thongbao/sua/{{$thongbao->id}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ảnh thông báo<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <img width="100px" src="upload/notification/{{$thongbao->image}}"/>
                                            <br>
                                                <input type="file" required="" name="image" accept=".jpg, .jpeg, .png" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tiêu đề <span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="title" placeholder="Nhập tiêu đề thông báo" class="form-control" value="{{$thongbao->title}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="exampleFormControlTextarea1">Nội dung <span style="color:red">*</span></label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" placeholder="Nhập nội dung">{{$thongbao->content}}</textarea>
                                                </div>
                                            </div>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space btn-primary" onclick="return confirm('Bạn có chắc chắn không?')">Sửa</button>
                                                <button type="reset" class="btn btn-space btn-secondary">Xóa</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
</div>
@endsection     