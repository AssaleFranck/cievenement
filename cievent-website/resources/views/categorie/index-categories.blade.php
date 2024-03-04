<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard | CATEGORIE</title>
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
    // alert('yes');
    $(document).ready(function () {
      // $('.add_invit').hide();
      $('.add').click(function (e) { 
        e.preventDefault();
        $('.add_invit').css('display', 'inline');
      });

      $('#sub').click(function (e) { 
        e.preventDefault();
        document.getElementById('signupForm').submit();
      });
      $('#cancel').click(function (e) { 
        e.preventDefault();
        $('.add_invit').css('display', 'none');
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
          <div class="alert alert-success d-flex justify-content-center">
            {{Session::get('error')}}
          </div>
        @endif
        <nav class="page-breadcrumb d-flex justify-content-between align-items-center"> 
          <h5 class="mb-3 mb-md-0">Liste des Categories</h5>
          <a href="#" class="btn btn-outline-success shadow-sm add">Ajouter une cathégorie</a>
        </nav>

        <div class="row">
          <div class="col-md-11 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Noms</th>
                          <th class="text-center">date de creation</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $category)
                          <tr>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="{{route('categories.edit', $category->id)}}">{{++$num}}</a>
                            </td>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a>
                            </td>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="{{route('categories.edit', $category->id)}}">{{$category->created_at}}</a>
                            </td>
                            <td class="d-flex justify-content-center w-auto py-2">
                              <a class="btn btn-outline-success btn-xs mx-auto" href="{{route('categories.edit', $category->id)}}">Modifier</a>
                              
                              <form action="{{route('categories.destroy', $category->id)}}" method="get">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-xs" type="submit">Supprimer</button>
                              </form>
                              {{-- <a class="btn btn-outline-danger btn-xs mx-auto" href="{{route('categories.destroy', $category->id)}}">Supprimer</a> --}}
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

        <p class="@error('name') is-invalid @enderror">

          @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </p>

        <div class="row add_invit" style="display: none">
          <div class="col-md-11 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data" id="signupForm">
                  @csrf
                  <div class="row w-75 mx-auto">
                    <div class="col-sm-7 p-0 mx-auto">

                      <!-- --------------------- Invit name input ------------------------ -->
                      <div class="form-group w-100 ">
                        <label for="name">Nom de la catégorie <span class="text-danger">*</span></label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}"  type="text" autofocus required>
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                    </div>
                  </div>
                  <div class="d-flex justify-content-around align-items-center w-25 mx-auto mt-2">
                    <button class="btn btn-outline-info" id="cancel">Annuler</button>
                    <button class="btn btn-outline-warning" type="submit" id="sub">Ajouter</button>
                  </div>
                  
                  <p>
                    (<span class="text-danger">*</span>) Champs obligatoires.
                  </p>
                </form>
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