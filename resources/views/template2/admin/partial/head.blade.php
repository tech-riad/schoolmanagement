<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities. laravel/framework: ^8.40">
  <meta name="keywords"
    content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">


  <link rel="shortcut icon" href="https://laravel.pixelstrap.com/viho/assets/images/favicon.png" type="image/x-icon">
  <title>Education Erp</title>
  <!-- Google font-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <!-- Font Awesome-->
  {{-- <link rel="stylesheet" href="{{ asset('template2_asset/css/fontawesome.css') }}" type="text/css"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- ico-font-->
  {{-- <link rel="stylesheet" href="{{ asset('template2_asset/css/icofont.css') }}" type="text/css"> --}}
  <!-- Themify icon-->
  <link rel="stylesheet" href="{{ asset('template2_asset/css/themify.css') }}" type="text/css">
  <!-- Flag icon-->
  <link rel="stylesheet" href="{{ asset('template2_asset/css/flag-icon.css') }}" type="text/css">
  <!-- Feather icon-->
  <link rel="stylesheet" href="{{ asset('template2_asset/css/feather-icon.css') }}" type="text/css">
  <!-- Plugins css start-->
  <link rel="stylesheet" href="{{ asset('template2_asset/css/animate.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('template2_asset/css/chartist.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('template2_asset/css/date-picker.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('template2_asset/css/prism.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('template2_asset/css/vector-map.css') }}" type="text/css">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" href="{{ asset('template2_asset/css/bootstrap.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('template2_asset/css/style.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('template2_asset/css/color-1.css') }}" type="text/css">
  {{-- Responsive Css --}}
  <link rel="stylesheet" href="{{ asset('template2_asset/css/responsive.css') }}" type="text/css">

    <style>



        .swal2-title{
            color: red!important;
        }
        .sidebar .sidebar-brand-wrapper .sidebar-brand img {
            width: calc(244px - 88px);
            max-width: 100%;
            height: auto;
            margin: auto;
            margin-top: -14px !important;
            vertical-align: middle;
        }

        .top-navbar,.dropdown-menu{
            background: #DEE0E3;
        }

        .dropdown-item:hover{
            background: #cdcecf !important;
        }

        .top-navbar,p{
            color: black;
            text-transform: capitalize;
        }


        .top-navbar .top-navbar-menu-wrapper{
            -webkit-box-shadow: 20px 19px 34px -15px rgb(0 0 0 / 0%);
        }

        .sidebar .sidebar-brand-wrapper{
            background: #DEE0E3;
        }

        .form-control {
            border: 1px solid #ced4da !important;
        }

        .border-right {
            border-right: 1px solid #ccc !important;
        }

        .labels {
            font-size: 11px
        }

        #nav-hov {
            /* color: #18272F; */
            position: relative;
            text-decoration: none;
        }

      

        #nav-hov:hover::before {
            transform-origin: left;
            transform: scaleX(1);
        }

        .table-responsive>.table-bordered {
            border: 1 !important;
        }

        .nested-menu {
            margin-top: 20px;
            max-width: 95%;
            margin-left: 37px;
            left: 0 !important;
        }

        .new-table {
            max-width: 95%;
            margin-left: 37px;
            margin-top: 11px;
        }

        .toast-success {
            background-color: #229100 !important;
        }

        .toast-error {
            background-color: red !important;
        }

        td,
        th {
            text-transform: capitalize;
        }

        table thead th {
            background: #ddd !important;
            text-transform: uppercase;
            color: #777 !important;
            font-weight: 600;
        }

        table th,
        table td {
            border: 1px solid #e5e1e1 !important;
            color: #777 !important;
            font-weight: 400;
            padding: 6px 10px !important;
        }

        table tr .odd {
            background-color: transparent!important;
        }

        table tr .even {
            background-color: #f1f1f1 !important;
        }
        .chosen-container-single .chosen-single{
            height:35px !important;
            padding: 5px 8px !important;
        }
    </style>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.2/b-colvis-2.3.2/b-html5-2.3.2/b-print-2.3.2/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> --}}

    @stack('css')
</head>
