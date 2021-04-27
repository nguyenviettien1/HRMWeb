@extends('admin.layout.index')


@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Lương</h2>
                            <p class="pageheader-text">Salary</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Lương</li>
                                        <li class="breadcrumb-item"><a href="admin/luong/danhsach" class="breadcrumb-link">Tính lương</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                <img width="100%" src="../public/admin_assets/images/tinhluong.jpg" alt="hình ảnh"/>
                </div>
            </div>
        </div>
@endsection
