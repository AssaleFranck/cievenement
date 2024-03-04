  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <script src="jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#date').change(function() {
            
            if ($(this).val() != '0') {
                // console.log($(this).val());
                $('.btn_active').css('display', 'inline');
            }
        });
      });
    </script>
  </head>
  <body>
    <div class="main-wrapper">
      
      <!-- partial:partials/_sidebar.html -->
      @include('partials.sidebar')

      @include('partials.settings-sidebar')
      <!-- partial -->
    
      <div class="page-wrapper">
          
        <!-- partial:partials/_navbar.html -->
        @include('partials.navbar')
        <!-- partial -->

        <div class="page-content">

          @if(Session::has('success'))
            <div class="alert alert-success">
              {{Session::get('success')}}
            </div>
          @endif
          @if(Session::has('error'))
            <div class="alert alert-success">
              {{Session::get('error')}}
            </div>
          @endif

          <nav class="page-breadcrumb d-flex justify-content-between align-items-center"> 
            <h5 class="mb-3 mb-md-0">Liste des Evènements</h5>
            <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
              <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
              <input type="text" class="form-control" readonly>
            </div>
            <a href="{{route('event.create')}}" class="btn btn-outline-success shadow-sm">Ajouter un évènement</a>
          </nav>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="dataTableExample" class="table table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Evènements</th>
                          <th class="text-center">Dates</th>
                          <th class="text-center">Lieu</th>
                          <th class="text-center">Invités</th>
                          <th class="text-center">Statut</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($datas as $list)
                          <tr>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="{{route('event.show', $list->id)}}">{{++$num}}</a>
                            </td>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="{{route('event.show', $list->id)}}">{{$list->name}}</a>
                            </td>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="{{route('event.show', $list->id)}}">{{$list->date}}</a>
                            </td>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="{{route('event.show', $list->id)}}">{{$list->place}}</a>
                            </td>
                            <td class="text-center text-reset">
                              
                              @if ($list->invites->count() == 0)
                              <a class="text-decoration-none text-reset mr-3" href="{{route('event.show', $list->id)}}">Aucun</a>
                                
                              @elseif ($list->invites->count() == 1)
                                {{-- @foreach ($list->invites as $invite) --}}
                                <a class="text-decoration-none text-reset mr-3" href="{{route('invite.show', $list->id)}}">{{$list->invites[0]->name}}</a>
                                  {{-- {{$invite->name}} --}}
                                {{-- @endforeach --}}
                              @else
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-xs btn-outline-light" data-toggle="modal" data-target="#exampleModal{{$list->id}}">
                                  voir les invités
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header border-0">
                                        <h5 class="modal-title text-center w-100" id="exampleModalLabel">Liste des Invités</h5>
                                      </div>
                                      <div class="modal-body">
                                        <ul class="list-group list-group-flush">
                                          @foreach ($list->invites as $invite)
                                            <li class="list-group-item">{{$invite->name}}</li>
                                          @endforeach
                                        </ul>
                                      </div>
                                      <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-sm btn-outline-info " data-dismiss="modal">Fermer</button>
                                        <a href="{{route('invite.show', $list->id)}}" class="btn btn-sm btn-outline-success">Gérer</a>
                                    </div>
                                  </div>
                                </div>
                              @endif
                            </td>
                            <td class="text-center">
                              @if ($list->statut)
                                <a class="text-decoration-none text-reset mr-3" href="{{route('event.state', $list->id)}}"><span class="text-white p-1 bg-warning">Publié</span></a>
                              @else
                                <a class="text-decoration-none text-reset mr-3" href="{{route('event.state', $list->id)}}"><span class="text-secondary p-1 bg-light">aucun</span></a>
                              @endif
                            </td>
                            <td class="d-flex justify-content-around">
                              <a class="btn btn-outline-success btn-xs" href="{{route('event.edit', $list->id)}}">Modifier</a>
                              <form action="{{route('event.destroy', $list->id)}}" method="get">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-xs" type="submit">Supprimer</button>
                              </form>
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
            @if ($datas->count())
            
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card w-100">
                    <div class="card-body d-flex justify-content-center w-100">
                      <form method="POST" action="{{route('chrono.update')}}" class="w-100 formCat">
                        @csrf
                        {{-- @if ($chrono != 0)
                          
                        @else
                          
                        @endif --}}
                        <div class="form-group w-100">
                            <label for="date">Choisir l'évènement pour le décompte</label>
                            <select name="event_id" id="date" required>
                              @if ($chrono->count() > 0)
                                <option class="text-light" value="{{$chrono[0]->event_id}}" selected disabled>{{$datas[$chrono[0]->event_id-1]->name}}</option>
                              @endif
                              @foreach ($datas as $event)
                                <option value="{{$event->id}}">{{$event->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end btn_active" style="display: none !important">
                          <button type="submit" class="btn btn-sm btn-outline-warning">Activer</button>
                        </div>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endif

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
    <script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/datepicker.js')}}"></script>
    <script src="{{asset('assets/js/data-table.js')}}"></script>
    <!-- end custom js for this page -->
  </body>
</html>