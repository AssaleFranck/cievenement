<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard | POST</title>
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
            <h5 class="mb-3 mb-md-0">Liste des Posts</h5>
            <a href="{{route('post.create')}}" class="btn btn-outline-primary shadow-sm">Ajouter un post</a>
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
                                        <th class="text-center">Titres</th>
                                        <th class="text-center">catégories</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $list)
                                        <tr>
                                            <td class="text-center">
                                                <a class="text-decoration-none text-reset mr-3" data-toggle="modal" data-target="#exampleModal{{$list->id}}">{{++$num}}</a>
                                            </td>
                                            <td class="text-center">
                                                <a class="text-decoration-none text-reset mr-3" data-toggle="modal" data-target="#exampleModal{{$list->id}}">{{$list->title}}</a>
                                            </td>
                                            <td class="text-center">
                                                <a class="text-decoration-none text-reset mr-3" data-toggle="modal" data-target="#exampleModal{{$list->id}}">{{$list->category->name}}</a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-0">
                                                                <h5 class="modal-title text-center w-100" id="exampleModalLabel">Description du post</h5>
                                                            </div>
                                                            <div  class="modal-body overflow-auto text-start">
                                                                 {!! ($list->body) !!}
                                                            </div>
                                                            <div class="modal-footer border-0">
                                                                <button type="button" class="btn btn-sm btn-outline-info " data-dismiss="modal">Fermer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="d-flex justify-content-around">
                                                <a class="btn btn-outline-success btn-xs" href="{{route('post.edit', $list->id)}}">Modifier</a>
                                                <form action="{{route('post.destroy', $list->id)}}" method="get">
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
</body>
</html>
