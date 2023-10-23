<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ asset('assets/images/pos.png') }}">

    <title>{{ $title }}</title>


    <!-- Plugins css-->
    <link href="{{asset('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />



    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <!-- Plugin Css-->
    <link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css" />
    <link rel="stylesheet" href="assets/plugins/jquery-datatables-editable/datatables.css" />
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>

</head>

<body>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a class="logo"><i class="  fa-spin fa fa-shopping-cart"></i><span> POS-<i
                                    class="md "></i>SYSTEM</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i
                                            class="icon-size-fullscreen"></i></a>
                                </li>

                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown"
                                        aria-expanded="true"><img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-img"
                                            class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a>
                                        </li>
                                        <li><a href="{{ route('logout.all') }}"><i class="ti-power-off m-r-5"></i>
                                                Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>


                            <li class="has_sub">
                                <a class="waves-effect "><i class="ti-home"></i> <span> Dashboard </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('Admin.dashboard') }}">Admin Dashboard</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a class="waves-effect"><i class="ion-person-add"></i> <span>Admin </span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('Admin.add') }}">Add Admin</a></li>
                                    <li><a href="{{ route('Admin.alldata') }}">All Admins</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a class="waves-effect"><i class="ion-person-add"></i> <span>Product </span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('Product.Add_Product_view') }}">Add Product</a></li>
                                    <li><a href="{{ route('Product.All_Product_data') }}">All Products</a></li>
                                </ul>
                            </li>


                            
                            <li class="has_sub">
                                <a class="waves-effect"><i class="ion-person-add"></i> <span>Cashier </span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('Cashier.Cashier_view') }}">Cashier View</a></li>
                                </ul>
                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->
