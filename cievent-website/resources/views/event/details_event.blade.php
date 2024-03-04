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
    </head>
    <body>
        <div class="main-wrapper">
    
            <!-- partial:partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial:partials/_sidebar.html -->
            @include('partials.settings-sidebar')
            <!-- partial -->
        
            <div class="page-wrapper">
                    
                <!-- partial:partials/_navbar.html -->
               @include('partials.navbar')
                <!-- partial -->
    
                <div class="page-content ">
                    <nav class="page-breadcrumb d-flex justify-content-between align-items-center"> 
                        <a href="{{route('event.index')}}" class="btn btn-outline-info shadow-sm">Retour</a>
                        {{-- <a href="{{route('event.create')}}" class="btn btn-outline-warning shadow-sm">Ajouter un évènement</a> --}}
                        <a href="{{route('event.edit', $datas->id)}}" class="btn btn-outline-success shadow-sm">Modifier l'évènement</a>
                    </nav>

                    <div class="row">
                        <div class="col-12 col-xl-12 stretch-card">
                            <div class="row flex-grow">
                                <div class="col-md-4 grid-margin stretch-card height">
                                    <div class="card border border-success">
                                        <img src="{{asset('images/events/'.$datas->img)}}" alt="Conference Cote d'Ivoire Evenement" class="img-fluid rounded overflow-hidden">
                                    </div>
                                </div>
                                <div class="col-md-4 grid-margin stretch-card ">
                                    <div class="card border border-success">
                                        <div class="card-body">
                                            <div class="row h-100">
                                                <div class="col-12 h-25">
                                                    <h6 class="card-title mb-0 text-center">Nombre d'inscrits</h6>
                                                </div>
                                                <div class="col-12 h-75 d-flex justify-content-center align-items-center">
                                                    <h3 class="timer" id="lollipop" data-to="{{$datas->registeds->count()}}"data-speed="700"></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 grid-margin stretch-card ">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-between h-100 border border-success">
                                            <div class="row col-6 d-flex flex-colunm m-0 h-100">
                                                <div class="col-12 h-25">
                                                    <h6 class=" mb-0 text-center w-100">VIP</h6>
                                                </div>
                                                <div class="col-12 h-75 d-flex justify-content-center align-items-center">
                                                    <h3 class="timer text-center" id="lollipop" data-to="{{$vip}}"data-speed="800"></h3>
                                                </div>
                                            </div>
                                            <div class="row col-6 d-flex flex-colunmm h-100">
                                                <div class="col-12 h-25">
                                                    <h6 class=" mb-0 text-center w-100">STANDARD</h6>
                                                </div>
                                                <div class="col-12 h-75 d-flex justify-content-center align-items-center">
                                                    <h3 class="timer text-center" id="lollipop" data-to="{{$stand}}"data-speed="800"></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Noms et Prenoms</th>
                                                <th class="text-center">Contact</th>
                                                <th class="text-center">email</th>
                                                <th class="text-center">Pass</th>
                                                <th class="text-center">date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datas->registeds as $list)
                                                <tr>
                                                    <td class="text-center">
                                                        <a class="text-decoration-none text-reset mr-3" href="{{route('register.contact',$list->id)}}">{{$list->id}}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="text-decoration-none text-reset mr-3" href="{{route('register.contact',$list->id)}}">{{$list->name}}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="text-decoration-none text-reset mr-3" href="{{route('register.contact',$list->id)}}">{{$list->phone}}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="text-decoration-none text-reset mr-3" href="{{route('register.contact',$list->id)}}">{{$list->email}}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="text-decoration-none text-reset text-uppercase" href="{{route('register.contact',$list->id)}}">{{$list->pass}}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="text-decoration-none text-reset mr-3" href="{{route('register.contact',$list->id)}}">{{$list->created_at->format('j F o à G:i')}}</a>
                                                    </td>
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
    
                <!-- partial:partials/_footer.html -->
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
        <script src="{{asset('assets/js/dashboard.js')}}"></script>
        <script src="{{asset('assets/js/data-table.js')}}"></script>
        <!-- end custom js for this page -->
        <script type="text/javascript" src="{{asset('js/jquery.countTo.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                jQuery(function ($) {
    
                    // start all the timers
                    $('.timer').each(count);
        
                    // restart a timer when a button is clicked
                    // $('.restart').click(function (event) {
                    //   event.preventDefault();
                    //   var target = $(this).data('target');
                    //   $(target).countTo('restart');
                    // });
    
                    function count(options) {
                        var $this = $(this);
                        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                        $this.countTo(options);
                    }
                });

            });
        </script>
    </body>
</html>
<style>
    .height{
        height: 20vh;
    }
</style>