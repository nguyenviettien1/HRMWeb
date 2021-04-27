@extends('admin.layout.index')
@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
              
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Sửa KPI công việc </h2>
                            <p class="pageheader-text">Edit Work</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Công việc</li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Sửa: {{$congviec->nhanvien->name}}</a></li>
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
                                    <form id="validationform" action="admin/congviec/sua/{{$congviec->id}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tháng<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="date" required="" name="month" placeholder="Nhập tháng" class="form-control" value="{{$congviec->month}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Nhân viên<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control" name="userID" value="{{$congviec->userID}}">
                                                    @foreach($nhanvien as $nv)
                                                    <option 
                                                    @if($congviec->nhanvien->id == $nv->id)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$nv->id}}">{{$nv->name}}</option>
                                                    @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Thực tế<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="actual" placeholder="Nhập actual" class="form-control" value="{{$congviec->actual}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mục tiêu<span style="color:red">*</span></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="target" placeholder="Nhập target" class="form-control" value="{{$congviec->target}}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space btn-primary" onclick="return confirm('Bạn có chắc chắn không?')">Submit</button>
                                                <button type="reset" class="btn btn-space btn-secondary">Cancel</button>
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