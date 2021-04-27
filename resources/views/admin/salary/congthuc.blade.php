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
                                        <li class="breadcrumb-item"><a href="admin/luong/danhsach" class="breadcrumb-link">Công thức tính lương</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                   <h3>Công thức tính lương = (Lương cơ bản + Lương thâm niên + Lương công việc) * Hệ số lương + Lương chế độ</h3>
                    <h4 style="color:red">Trong đó:</h4>
                    <h4>Lương cơ bản: Được tính bằng số ngày công đi làm được trên tổng số ngày công của tháng</h4>
                    <h4>Lương thâm niên: Đối với những nhân viên làm việc trên 1 năm ở công ty sẽ có mức lương này</h4>
                    <h4>Lương công việc: được tính bằng số phần trăm công việc hoàn thành</h4>
                    <h4>Hệ số lương: dựa theo chức vụ của nhân sự</h4>
                    <h4>Lương chế độ: bao gồm lương thưởng và lương phạt</h4>
                    <h5>Lương thưởng: bằng số giờ làm việc ngoài giờ</h5>
                    <h5>Lương phạt: dựa theo số lần đi muộn mà trừ lương</h5>
            </div>
        </div>
@endsection



