<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts// by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 14:13:21 GMT -->

<head>

    <meta charset="utf-8" />
    <title>IM & POS | By Mahfuz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/images/logo/white-center.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App js -->
    <script src="{{ asset('admin/js/plugin.js') }}"></script>
    @stack('styles')

    <style>
        .asc::after {
            font-family: 'Font Awesome\ 5 Free';
            content: ' \f106';
        }

        .desc::after {
            font-family: 'Font Awesome\ 5 Free';
            content: ' \f107';
        }
    </style>
</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <x-admin.header />

        <!-- ========== Left Sidebar Start ========== -->
        @admin
            <x-admin.leftsidebar />
        @endadmin
        @agent
            <x-admin.leftsidebar />
        @endagent
        @user
            <x-admin.usersidebar />
        @enduser
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>

                                <div class="page-title-right">

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- end page title -->
                    {{ $slot }}
                </div>
                <!-- container-fluid -->
            </div>

            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Mahfuz.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Mahfuzul Islam
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/libs/node-waves/waves.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ asset('admin/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/js/app.js') }}"></script>
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            [...document.querySelectorAll('[data-table-filter="true"]')].forEach(element => {
                let urlParams = new URLSearchParams(window.location.search)

                if (element.dataset.order == urlParams.get('order')) {
                    element.dataset.value = urlParams.get('value') == 'asc' ? 'desc' : 'asc';

                    if (element.dataset.value == 'asc') {
                        element.classList.remove('desc');
                        element.classList.add('asc');
                    } else {
                        element.classList.remove('asc');
                        element.classList.add('desc');

                    }
                }


                element.addEventListener('click', function(event) {
                    urlParams.set('order', event.target.dataset.order)
                    urlParams.set('value', event.target.dataset.value)
                    window.location.search = urlParams;
                })
            });
        });
    </script>
</body>


<!-- Mirrored from themesbrand.com/skote/layouts// by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 14:14:09 GMT -->

</html>
