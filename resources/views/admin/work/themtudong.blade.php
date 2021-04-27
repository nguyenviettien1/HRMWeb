@extends('admin.layout.index')


@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Công việc</h2>
                            <p class="pageheader-text">Work</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Công việc</li>
                                        <li class="breadcrumb-item"><a href="admin/congviec/danhsach" class="breadcrumb-link">Thêm công việc tự động</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                <img width="100%" src="../public/admin_assets/images/o3.jpg" alt="hình ảnh"/>
                </div>
            </div>
        </div>
@endsection
