@extends('admin.layout.index')
@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
              
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Sửa vị trí </h2>
                            <p class="pageheader-text">Edit Position</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Vị trí</li>
                                        <li class="breadcrumb-item">Sửa: {{$vitri->description}}</li>
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
                                    <form id="validationform" action="admin/vitri/sua/{{$vitri->id}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tên vị trí</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="description" placeholder="Vị trí" class="form-control" value="{{$vitri->description}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Hệ số lương</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="number" step="0.1" required=""  name="coefficientSalary" placeholder="Hệ số lương" class="form-control" value="{{$vitri->coefficientSalary}}">
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