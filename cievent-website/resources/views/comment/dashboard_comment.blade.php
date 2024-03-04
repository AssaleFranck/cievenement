<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard | TEST</title>
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

        $('#cat').change(function() {

            if ($(this).val() != '0') {
                // console.log($(this).val());
                $('.div_cat').css('display', 'inline');
            }
        });
        $('#post').change(function() {

            if ($(this).val() != '0') {
                // console.log($(this).val());
                $('.div_post').css('display', 'inline');
            }
        });

        // $('.').submit(function (e) {
        //     e.preventDefault();

        // });

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
            <nav class="page-breadcrumb d-flex justify-content-between align-items-center">
                <h5 class="mb-3 mb-md-0">Liste des commentaires</h5>
                <a class="btn btn-outline-info shadow-sm" href="{{route('comment.index')}}">Retour</a>
            </nav>


            @if ($step == 1)
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-5 cat">
                                        <form method="POST" action="{{route('test.post')}}" class="formCat">
                                            @csrf
                                            <div class="form-group">
                                                <label for="cat">Choisir une catégorie <span class="text-danger ">*</span></label>
                                                <select name="cat" id="cat">
                                                    <option class="text-light" selected disabled>Selectionner une categorie </option>
                                                    @foreach ($data as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end div_cat" style="display: none ! important;">
                                                <button type="submit" class="btn btn-sm btn-outline-warning btn_cat">Suivant</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <p>
                                    (<span class="text-danger">*</span>) Champs obligatoires.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($step == 2)
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-5 cat">
                                        <form method="POST" action="{{route('test.post')}}" class="formCat">
                                            @csrf
                                            <div class="form-group">
                                                <label for="post">Choisir un post <span class="text-danger">*</span></label>
                                                <select name="post" id="post">
                                                    <option class="text-light" selected disabled>Selectionner une categorie </option>
                                                    @foreach ($data as $post)
                                                        <option value="{{$post->id}}">{{$post->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end div_post" style="display: none ! important;">
                                                <button type="submit" class="btn btn-sm btn-outline-warning btn_cat">Suivant</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <p>
                                    (<span class="text-danger">*</span>) Champs obligatoires.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($step == 3)
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Noms</th>
                                                <th class="text-center">email</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $list)
                                                <tr>
                                                    <td class="text-center"><a data-toggle="modal" data-target="#exampleModal{{$list->id}}">{{++$num}}</a></td>
                                                    <td class="text-center"><a data-toggle="modal" data-target="#exampleModal{{$list->id}}">{{$list->name}}</a></td>
                                                    <td class="text-center"><a data-toggle="modal" data-target="#exampleModal{{$list->id}}">{{$list->email}}</a></td>
                                                    <td class="text-center"><a data-toggle="modal" data-target="#exampleModal{{$list->id}}">{{$list->created_at->format('j F o à G:i')}}</a></td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0">
                                                                    <h5 class="modal-title text-center w-100" id="exampleModalLabel">Commentaire</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="text-center">{{$list->comment}}</p>
                                                                </div>
                                                                <div class="modal-footer border-0">
                                                                    <button type="button" class="btn btn-sm btn-outline-info " data-dismiss="modal">Fermer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <td class="d-flex justify-content-around">
                                                        <form action="{{route('comment.destroy', $list->id)}}" method="POST">
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
