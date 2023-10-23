<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ asset('assets/images/pos.png') }}">

    <title>{{ $Page }}</title>


    <!-- Plugins css-->
    <link href="{{ asset('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" />



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

    <div class="account-pages"></div>
    <div class="clearfix"></div>

    <div class="wrapper-page">
        <div class="ex-page-content text-center">
            <div class="text-error"><span class="text-primary">5</span><i class="ti-face-sad text-pink"></i><i
                    class="ti-face-sad text-info"></i></div>
            <h2>{{ $Error }}</h2><br>
            <p class="text-muted">Why not try refreshing your page? or you can contact <a href="#">support</a></p>
            <br>
            <a class="btn btn-default waves-effect waves-light" href="{{ route('Page.login') }}"> Return Home</a>

        </div>
    </div>


    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>


    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>
