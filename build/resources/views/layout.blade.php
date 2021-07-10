<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Rahmat Sandhy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!-- Plugins css-->
        <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>
<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2021 &copy; Rahmat Sandhy
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

    </div>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <script src="{{ asset('assets/libs/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery-scrollto/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Chat app -->
        <script src="{{ asset('assets/js/pages/jquery.chat.js') }}"></script>

        <!-- Todo app -->
        <script src="{{ asset('assets/js/pages/jquery.todo.js') }}"></script>

        <!-- Sparkline charts -->
        <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ asset('assets/js/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/js/chartjs/echarts.min.js') }}"></script>

        @yield('js')

    </body>
</html>