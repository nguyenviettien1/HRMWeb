@extends('admin.layout.index')
@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
              
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Sửa nhân sự </h2>
                            <p class="pageheader-text">Edit BAccount</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Nhân sự</li>
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
                                    <form id="validationform" action="admin/nhanvien/sua/{{$nhanvien->id}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mã nhân viên <span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="userCD" placeholder="Nhập mã nhân viên" class="form-control" value="{{$nhanvien->userCD}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tên nhân viên<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="name" placeholder="Nhập tên nhân viên" class="form-control" value="{{$nhanvien->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tuổi<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="age" placeholder="Nhập tuổi" class="form-control" value="{{$nhanvien->age}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Avatar<span style="color:red">*</span></label>
                                            
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <img width="100px" src="upload/nhansu/{{$nhanvien->avatar}}"/>
                                            <br>
                                            <input type="file" name="avatar" accept=".jpg, .jpeg, .png" class="form-control" style="margin-top:4px" value="{{$nhanvien->avatar}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Giới tính<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select class="form-control" name="gender">
                                                    <option 
                                                    @if($nhanvien->gender == 1)
                                                    {{"selected"}}
                                                    @endif
                                                    value="1">Nam</option>
                                                    <option 
                                                    @if($nhanvien->gender == 0)
                                                    {{"selected"}}
                                                    @endif
                                                    value="0">Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ngày sinh<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="date" required="" name="dateOfBirth" class="form-control" value="{{$nhanvien->dateOfBirth}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Địa chỉ<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="address" placeholder="Nhập địa chỉ" class="form-control" value="{{$nhanvien->address}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="email" required="" name="email" placeholder="Nhập email" class="form-control" value="{{$nhanvien->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Số điện thoại<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="phone" placeholder="Nhập số điện thoại" class="form-control" value="{{$nhanvien->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Trình độ học vấn</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  name="education" placeholder="Trình độ học vấn" class="form-control" value="{{$nhanvien->education}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Dân tộc</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  name="ethnicity" placeholder="Dân tộc" class="form-control" value="{{$nhanvien->ethnicity}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tôn giáo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="religion" placeholder="Nhập tôn giáo" class="form-control" value="{{$nhanvien->religion}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Vị trí<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select class="form-control" name="positionID" value="{{$nhanvien->positionID}}">
                                                    @foreach($vitri as $vt)
                                                    <option 
                                                    @if($nhanvien->vitri->id == $vt->id)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$vt->id}}">{{$vt->description}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Phòng ban<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control" name="departmentID" value="{{$nhanvien->departmentID}}">
                                                    @foreach($phongban as $pb)
                                                    <option 
                                                    @if($nhanvien->phongban->id == $pb->id)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$pb->id}}">{{$pb->description}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Bảo hiểm<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select class="form-control" name="insurance" value="{{$nhanvien->insurance}}">
                                                    <option
                                                    @if($nhanvien->insurance == 1)
                                                    {{"selected"}}
                                                    @endif
                                                    value="1">Có tham gia</option>
                                                    <option
                                                    @if($nhanvien->insurance == 0)
                                                    {{"selected"}}
                                                    @endif
                                                    value="0">Không tham gia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Trạng thái<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select class="form-control" name="status" value="{{$nhanvien->status}}">
                                                    <option
                                                    @if($nhanvien->status == 1)
                                                    {{"selected"}}
                                                    @endif
                                                    value="1">Hoạt động</option>
                                                    <option 
                                                    @if($nhanvien->status == 0)
                                                    {{"selected"}}
                                                    @endif
                                                    value="0">Không hoạt động</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ngày bắt đầu làm việc<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="date" name="dayToWork" class="form-control"  value="{{$nhanvien->dayToWork}}">
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