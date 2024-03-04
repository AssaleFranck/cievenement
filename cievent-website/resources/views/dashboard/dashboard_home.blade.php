<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard | Event</title>
        <!-- core:css -->
        <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <!-- end plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <!-- endinject -->
      <!-- Layout styles -->  
        <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{asset('images/icon.png')}}" />
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        {{-- <script src="{{asset('js/jquery.countTo.js')}}"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="main-wrapper">
    
            <!-- partial:../../partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial:../../partials/_sidebar.html -->
            @include('partials.settings-sidebar')
            <!-- partial -->
        
            <div class="page-wrapper">
                    
                <!-- partial:../../partials/_navbar.html -->
               @include('partials.navbar')
                <!-- partial -->
    
                <div class="page-content">

                    <div class="row h-100 d-flex justify-content-center align-items-center">
                        {{-- <div class="col-md-6 bloc grid-margin stretch-card h-50" id="users"> --}}
                            {{-- <div class="card w-100">
                                <div class="card-body border border-danger w-100">
                                    <h1></h1>
                                </div>
                            </div> --}}
                        <img class="img-fluid" src="{{asset('images/logo.png')}}" alt="Cote d'ivoire evenement">
                        {{-- </div> --}}
                        {{-- <div class="col-md-6 bloc grid-margin stretch-card h-50" id="users">
                            <div class="card">
                                <div class="card-body border border-danger">
                                    <img class="img-fluid" src="{{asset('images/users icon.png')}}" height="100%" alt="user dasboard">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 bloc grid-margin stretch-card h-50">
                            <div class="card">
                                <div class="card-body">
                                    ...
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 bloc grid-margin stretch-card h-50">
                            <div class="card">
                                <div class="card-body">
                                    ...
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 bloc grid-margin stretch-card h-50">
                            <div class="card">
                                <div class="card-body">
                                    ...
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    
                </div>
    
                <!-- partial:../../partials/_footer.html -->
                @include('partials.footer')
                <!-- partial -->
        
            </div>
        </div>
    
        <!-- core:js -->
        <script src="{{asset('assets/vendors/core/core.js')}}"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        <script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <!-- end plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/template.js')}}"></script>
        <!-- endinject -->
        <!-- custom js for this page -->
        <script src="{{asset('assets/js/data-table.js')}}"></script>
        <!-- end custom js for this page -->
    </body>
</html>
<style>
    .bloc{
        cursor: pointer;
    }
</style>