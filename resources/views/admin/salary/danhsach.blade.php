@extends('admin.layout.index')


@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Lương</h2>
                            <div style="width:100%;position: relative;">
                                <a href="admin/luong/tinhluong" class="btn btn-primary" style="right: 0 ;position: absolute;">Tính lương</a>
                            </div>
                            <p class="pageheader-text">Salary</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Lương</li>
                                        <li class="breadcrumb-item"><a href="admin/luong/danhsach" class="breadcrumb-link">Danh sách</a></li>
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
                                                <th style="font-weight:bold; background-color:yellow">Tháng</th>
                                                <th style="font-weight:bold; background-color:yellow">Nhân viên</th>
                                                <th style="font-weight:bold; background-color:yellow">Lương cơ bản</th>
                                                <th style="font-weight:bold; background-color:yellow">Lương công việc</th>
                                                <th style="font-weight:bold; background-color:yellow">Lương chế độ</th>
                                                <th style="font-weight:bold; background-color:yellow">Lương thâm niên</th>
                                                <th style="font-weight:bold; background-color:yellow">Tổng nhận</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            @foreach($luong as $l)
                                            <tr>
                                            
                                                <td>
                                                <?php
                                                $date=date_create($l->month);
                                                echo date_format($date,"m-Y");
                                                ?>
                                                </td>
                                                <td>{{$l->nhanvien->name}}</td>
                                                <td>
                                                <?php
                                                $number=$l->salaryBase;
                                                echo number_format($number, 0, '.', ',');
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                $number=$l->salaryWork;
                                                echo number_format($number, 0, '.', ',');
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                $number=$l->salaryTreatment;
                                                echo number_format($number, 0, '.', ',');
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                $number=$l->salarySeniority;
                                                echo number_format($number, 0, '.', ',');
                                                ?>
                                                </td>
                                                <td><?php
                                                $number=$l->total;
                                                echo number_format($number, 0, '.', ',');
                                                ?>
                                                đ
                                                </td>
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

@section('css')
    <link rel="stylesheet" href="../public/admin_assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/admin_assets/libs/css/style.css">
    <link rel="stylesheet" href="../public/admin_assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../public/admin_assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../public/admin_assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../public/admin_assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../public/admin_assets/vendor/datatables/css/fixedHeader.bootstrap4.css">

@endsection


@section('script')
    <script src="../public/admin_assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../public/admin_assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../public/admin_assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../public/admin_assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../public/admin_assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../public/admin_assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../public/admin_assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    @endsection