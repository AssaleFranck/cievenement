<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard | Invite</title>
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

      $('#sub').click(function (e) { 
        e.preventDefault();
        document.getElementById('updateForm').submit();
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
        <nav class="page-breadcrumb d-flex justify-content-between align-items-center"> 
          <h5 class="mb-3 mb-md-0">Modifier l'invité {{$invite->name}}</h5>
          <a href="{{route('event.index')}}" class="btn btn-outline-success shadow-sm add">Annuler</a>
        </nav>

        <div class="row" >
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('invite.update', $invite->id)}}" method="POST" enctype="multipart/form-data" id="updateForm">
                            @csrf
                            <div class="row w-75 mx-auto d-flex justify-content-between">
                                <div class="col-sm-5 p-0">
                                    <!-- --------------------- Invit name input ------------------------ -->
                                    <div class="form-group w-100">
                                        <label for="name_invit">Nom de l'invité <span class="text-danger">*</span></label>
                                        <input id="name_invit" class="form-control @error('name_invit') is-invalid @enderror" name="name_invit" value="{{$invite->name}}"  type="text" autofocus required>
                                        @error('name_invit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-5 p-0">
                                    <!-- --------------------- Invit First name input ------------------------ -->
                                    <div class="form-group w-100">
                                        <label for="surname_invit">Prenom de l'invité <span class="text-danger">*</span></label>
                                        <input id="surname_invit" class="form-control @error('surname_invit') is-invalid @enderror" name="surname_invit" value="{{$invite->surname}}"  type="text" required>
                                        @error('surname_invit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- --------------------- Invit Description input ------------------------ -->
                            <div class="form-group w-75 mx-auto">
                                <label for="description_invit">Description de l'invité <span class="text-danger">*</span></label>
                                <textarea id="description" class="form-control @error('description_invit') is-invalid @enderror" name="description_invit" rows="4"required>{{$invite->description}}</textarea>
                                @error('description_invit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- --------------------- Campagny input ------------------------ -->
                            <div class="form-group w-75 mx-auto">
                                <label for="compagny_invit">Entreprise <span class="text-danger">*</span></label>
                                <input id="" class="form-control @error('compagny_invit') is-invalid @enderror" name="compagny_invit" value="{{$invite->compagny}}"  type="text" required>
                                @error('compagny_invit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- --------------------- files input ------------------------ -->
                            <div class="form-group w-75 mx-auto">
                                <label for="img_invit">Ajouter une image</label>
                                <input type="file" id="img_invit" name="img_invit" class="file-upload-default @error('img_invit') is-invalid @enderror" required>
                                <div class="input-group col-xs-12">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-success rounded-left" type="button">Ajouter</button>
                                    </span>
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Selectionner une seule image">
                                </div>
                                @error('img_invit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input type="hidden" name="event_id" value="{{$invite->event_id}}">

                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-outline-warning" type="submit" id="sub">Modifier</button>
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