<!DOCTYPE html>
<html>
<head>
    <title>Music App</title>
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .table-fixed {
            width: 100%;
            table-layout: fixed;
        }

        .table-fixed th,
        .table-fixed td {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .w-5 {
            width: 50px !important;
        }

        .w-7 {
            width: 75px !important;
        }

        .w-10 {
            width: 100px !important;
        }

        .w-15 {
            width: 150px !important;
        }

        .w-20 {
            width: 200px !important;
        }
    </style>
</head>
<body>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/main.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>
</body>
</html>
