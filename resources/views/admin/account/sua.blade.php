@extends('admin.layout.index')
@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
              
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Sửa tài khoản </h2>
                            <p class="pageheader-text">Edit Account</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Nhân sự</li>
                                        <li class="breadcrumb-item">Tài khoản</li>
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
                                    <form id="validationform" action="admin/user/sua/{{$account->id}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Nhân viên<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control" name="userID" value="{{$account->userID}}">
                                                    @foreach($nhanvien as $nv)
                                                    <option 
                                                    @if($account->nhanvien->id == $nv->id)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$nv->id}}">{{$nv->name}}</option>
                                                    @endforeach
                                            </select>
                                            
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">UserName<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="userName" placeholder="Nhập username" class="form-control" value="{{$account->userName}}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Đổi mật khẩu</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="checkbox" id="changePassword" name="changePassword"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="password" required="" name="password" disabled="" placeholder="Nhập mật khẩu" class="form-control password" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Confirm Password<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="password" required="" name="confirmPassword" disabled="" placeholder="Nhập lại mật khẩu" class="form-control password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Quyền<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control" name="permission" required="">
                                                    <option 
                                                    @if($account->permission == 1)
                                                    {{"selected"}}
                                                    @endif
                                                    value="1">Admin</option>
                                                    <option 
                                                    @if($account->permissionr == 0)
                                                    {{"selected"}}
                                                    @endif
                                                    value="0">Thường</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space btn-primary">Sửa</button>
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

@section('script')
    <script>
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(":checked")){
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection