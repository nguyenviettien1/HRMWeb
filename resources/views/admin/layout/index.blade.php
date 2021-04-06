<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="../public/admin_assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/admin_assets/libs/css/style.css">
    <link rel="stylesheet" href="../public/admin_assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../public/admin_assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../public/admin_assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../public/admin_assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../public/admin_assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../public/admin_assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>APATEK</title>
    @yield('css')
</head>


<body>
    
    <div class="dashboard-main-wrapper">
        
        @include('admin.layout.header')
        
       <div class="nav-left-sidebar sidebar-dark">
       @include('admin.layout.menu')
      
        @yield('content')
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="../public/admin_assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../public/admin_assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../public/admin_assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../public/admin_assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="../public/admin_assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="../public/admin_assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../public/admin_assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../public/admin_assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="../public/admin_assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../public/admin_assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../public/admin_assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../public/admin_assets/libs/js/dashboard-ecommerce.js"></script>
    
    @yield('script')
</body>
 
</html>