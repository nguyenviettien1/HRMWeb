@extends('admin.layout.index')


@section('content')
<div class="dashboard-wrapper">
<div class="container-fluid  dashboard-content">
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2">Nhân sự </h3>
                            <p class="pageheader-text">Nhân sự</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Nhân sự</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Tổng nhân sự</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{count($nhanvien)}}</h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Tổng tài khoản</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{count($account)}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Số lượng phòng ban</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{count($phongban)}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Tổng loại chức vụ</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{count($vitri)}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h3 class="card-header">Nhân sự theo phòng ban</h3>
                            <div class="card-body">
                                <canvas id="phong-ban" width="220" height="155" value="hh"></canvas>
                                <p id="nspb" hidden="true">{{$phongban}}</p>
                                <div id="list-color" class="chart-widget-list">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h3 class="card-header">Nhân sự theo chức vụ</h3>
                            <div class="card-body">
                                <canvas id="chuc-vu" width="220" height="155" value="hh"></canvas>
                                <p id="nsvt" hidden="true">{{$vitri}}</p>
                                <div id="list-color1" class="chart-widget-list">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                        <h3 class="card-header">Danh sách nhân sự bị khóa tài khoản</h3>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th style="font-weight:bold; background-color:yellow">Mã NV</th>
                                                <th style="font-weight:bold; background-color:yellow">Tên nhân viên</th>
                                                <th style="font-weight:bold; background-color:yellow">Tuổi</th>
                                                <th style="font-weight:bold; background-color:yellow">Giới tính</th>
                                                <th style="font-weight:bold; background-color:yellow">Avatar</th>
                                                <th style="font-weight:bold; background-color:yellow">Địa chỉ</th>
                                                <th style="font-weight:bold; background-color:yellow">Vị trí</th>
                                                <th style="font-weight:bold; background-color:yellow">Phòng ban</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($nhanvien1 as $nv)
                                            <tr>
                                                <td>{{$nv->userCD}}</td>
                                                <td>{{$nv->name}}</td>
                                                <td>{{$nv->age}}</td>
                                                <td>
                                                @if($nv->gender == 0)
                                                    {{"Nữ"}}
                                                    @else
                                                    {{"Nam"}}
                                                @endif     
                                                </td>
                                                <td>
                                                <img width="100px" src="upload/nhansu/{{$nv->avatar}}" />
                                                </td>
                                                <td>{{$nv->address}}</td>
                                                <td>{{$nv->vitri->description}}</td>
                                                <td>{{$nv->phongban->description}}</td>
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
    <link rel="stylesheet" href="../public/admin_assets/vendor/vector-map/jqvmap.css">
    <link rel="stylesheet" href="../public/admin_assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css">
    <link rel="stylesheet" href="../public/admin_assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

@endsection


@section('script')

    <script src="../public/admin_assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../public/admin_assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../public/admin_assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../public/admin_assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="../public/admin_assets/vendor/charts/charts-bundle/chartjs.js"></script>
    <script src="../public/admin_assets/libs/js/main-js.js"></script>
    <script src="../public/admin_assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../public/admin_assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../public/admin_assets/libs/js/dashboard-sales.js"></script>
    

    <script>
        
    var ctx = document.getElementById("phong-ban").getContext('2d');
    var dataValues = document.getElementById("nspb").textContent;
    var x = JSON.parse(dataValues);
    var dataLabels = x.map(y=>y.description);
    var dataTotals = x.map(y=>y.total);
    var colorRandom = [];
    var arrItem = "";
    for(var i = 0; i<dataTotals.length; i++ ){
        var color = '#'+(Math.random()*0xffffff).toString(16).slice(-6);
        arrItem += getColor(color, dataLabels[i], dataTotals[i])    
        colorRandom.push(color)
    }

    // list color
    document.getElementById("list-color").innerHTML = arrItem;

    var myChart = new Chart(ctx, {
        type: 'pie',
                
        data: {
            labels: dataLabels,
            datasets: [{
                backgroundColor: colorRandom,
                data: dataTotals
            }]
        },
        options: {
            legend: 
                {
                display: false
                }
        }
    });
     
    var ctx2 = document.getElementById("chuc-vu").getContext('2d');
    var dataValues2 = document.getElementById("nsvt").textContent;
    var x2 = JSON.parse(dataValues2);
    var dataLabels2 = x2.map(y=>y.description);
    var dataTotals2 = x2.map(y=>y.total);
    var colorRandom2 = [];
    var arrItem1 = "";
    for(var i = 0; i<dataTotals2.length; i++ ){
        var color = '#'+(Math.random()*0xffffff).toString(16).slice(-6);
        arrItem1 += getColor(color, dataLabels2[i], dataTotals2[i])    
        colorRandom2.push(color)
    }

    // list color
    document.getElementById("list-color1").innerHTML = arrItem1;


    var myChart = new Chart(ctx2, {
                type: 'doughnut',
                
                data: {
                    labels: dataLabels2,
                    datasets: [{
                        backgroundColor: colorRandom2,
                        data: dataTotals2
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }

            });

    function getColor(color, title, total) {
        var first = '<p><span class="fa-xs mr-1 legend-title" style="color:';
        var end = '"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text">'+ title + '</span><span class="float-right">'+ total +'</span></p>';
        return first + color + end;
        
    }
     
    </script>

    @endsection