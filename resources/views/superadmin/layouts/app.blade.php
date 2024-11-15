<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hady-Mobile-Phone') }}</title>

    <link  id="style" href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/app-fce3f544.css') }}" />
    <link href="{{ asset('backend/css/waves.min.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('backend/css/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/nano.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/choices.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="{{ asset('backend/js/choices.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    @yield('styles')
</head>

<body>
    <!-- LOADER -->
    <div id="loader">
        <img src="{{ asset('backend/images/loader.svg') }}" alt="" />
    </div>
    <!-- END LOADER -->

    <!-- PAGE -->
    <div class="page">
        @include('superadmin.layouts.header')
        @include('superadmin.layouts.sidebar')

        <div class="main-content app-content">
            @yield('content')
        </div>

        <!-- SEARCH-MODAL -->

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                            <input type="search" class="form-control border-0 px-2" placeholder="Search" aria-label="Username" />
                            <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i class="fe fe-mic header-link-icon"></i></a>
                            <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p>
                            <span class="search-tags">
                                <i class="fe fe-user me-2"></i>People<a href="javascript:void(0);" class="tag-addon"><i class="fe fe-x"></i></a>
                            </span>
                            <span class="search-tags">
                                <i class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0);" class="tag-addon"><i class="fe fe-x"></i></a>
                            </span>
                            <span class="search-tags">
                                <i class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0);" class="tag-addon"><i class="fe fe-x"></i></a>
                            </span>
                            <span class="search-tags">
                                <i class="fe fe-server me-2"></i>Tags<a href="javascript:void(0);" class="tag-addon"><i class="fe fe-x"></i></a>
                            </span>
                        </div>
                        <div class="my-4">
                            <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="notifications.html"><span>Notifications</span></a>
                                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="alerts.html"><span>Alerts</span></a>
                                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert">
                                <a href="mail.html"><span>Mail</span></a>
                                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group ms-auto">
                            <button class="btn btn-sm btn-primary-light">Search</button>
                            <button class="btn btn-sm btn-primary">Clear Recents</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SEARCH-MODAL -->

        <!-- FOOTER -->
            @include('superadmin.layouts.footer')
        <!-- END FOOTER -->
    </div>
    <!-- END PAGE-->

    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/waves.min.js') }}"></script>
    <script src="{{ asset('backend/js/simplebar.min.js') }}"></script>
    <!-- <link rel="modulepreload" href="{{ asset('backend/js/simplebar-635bad04.js') }}" /> -->
    <script src="{{ asset('backend/js/simplebar-635bad04.js') }}"></script>
    <script src="{{ asset('backend/js/pickr.es5.min.js') }}"></script>
    <script src="{{ asset('backend/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/js/world-merc.js') }}"></script>
    <script src="{{ asset('backend/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/js/chart.min.js') }}"></script>
    <!-- <link rel="modulepreload" href="{{ asset('backend/js/crm-dashboard-5975eef2.js') }}" /> -->
    <script src="{{ asset('backend/js/crm-dashboard-5975eef2.js') }}"></script>
    <script src="{{ asset('backend/js/sticky.js') }}"></script>
    <!-- <link rel="modulepreload" href="{{ asset('backend/js/app-3cade095.js') }}" /> -->
    <!-- <script src="{{ asset('backend/js/app-3cade095.js') }}"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
    </script>
    @yield('script')
</body>
</html>
