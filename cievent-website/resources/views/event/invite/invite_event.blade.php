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
          <h5 class="mb-3 mb-md-0">Liste des invités</h5>
          <a href="#" class="btn btn-outline-success shadow-sm add">Ajouter un invité</a>
          <a href="{{route('event.index')}}" class="btn btn-outline-info shadow-sm">Retour</a>
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
                          <th class="text-center">Noms</th>
                          <th class="text-center">Prenoms</th>
                          <th class="text-center">Postes</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($invites as $invite)
                          <tr>
                            <!-- Modal -->
                            <div class="modal fade" id="Modal{{$invite->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel{{$invite->id}}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header border-0">
                                    <h5 class="modal-title text-center w-100" id="ModalLabel{{$invite->id}}">Description de l'invité</h5>
                                  </div>
                                  <div class="modal-body">
                                    <p class="text-center">{{$invite->description}}</p>
                                  </div>
                                  <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-sm btn-outline-info " data-dismiss="modal">Fermer</button>
                                </div>
                              </div>
                            </div>
                            <!-- End Modal -->
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="" data-toggle="modal" data-target="#Modal{{$invite->id}}">{{++$num}}</a>
                            </td>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="" data-toggle="modal" data-target="#Modal{{$invite->id}}">{{$invite->name}}</a>
                            </td>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="" data-toggle="modal" data-target="#Modal{{$invite->id}}">{{$invite->surname}}</a>
                            </td>
                            <td class="text-center">
                              <a class="text-decoration-none text-reset mr-3" href="" data-toggle="modal" data-target="#Modal{{$invite->id}}">{{$invite->compagny}}</a>
                            </td>
                            <td class="d-flex justify-content-center w-auto py-2">
                              <a class="btn btn-outline-success btn-xs mx-auto" href="{{route('invite.edit', $invite->id)}}">Modifier</a>
                              <a class="btn btn-outline-danger btn-xs mx-auto" href="{{route('invite.destroy', $invite->id)}}">Supprimer</a>
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

        <div class="row add_invit" style="display: none;">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form action="{{route('invite.store')}}" method="POST" enctype="multipart/form-data" id="signupForm">
                  @csrf
                  <div class="row w-75 mx-auto d-flex justify-content-between">
                    <div class="col-sm-5 p-0">
                      <!-- --------------------- Invit name input ------------------------ -->
                      <div class="form-group w-100">
                        <label for="name_invit">Nom de l'invité <span class="text-danger">*</span></label>
                        <input id="name_invit" class="form-control @error('name_invit') is-invalid @enderror" name="name_invit" value="{{old('name_invit')}}"  type="text" autofocus required>
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
                          <input id="surname_invit" class="form-control @error('surname_invit') is-invalid @enderror" name="surname_invit" value="{{old('surname_invit')}}"  type="text" required>
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
                      <textarea id="description" class="form-control @error('description_invit') is-invalid @enderror" name="description_invit" rows="4"required>{{old('description_invit')}}</textarea>
                      @error('description_invit')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                
                  <!-- --------------------- Campagny input ------------------------ -->
                  <div class="form-group w-75 mx-auto">
                      <label for="compagny_invit">Entreprise <span class="text-danger">*</span></label>
                      <input id="" class="form-control @error('compagny_invit') is-invalid @enderror" name="compagny_invit" value="{{old('compagny_invit')}}"  type="text" required>
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

                  <input type="hidden" name="event_id" value="{{$invites[0]->event_id}}">

                  <div class="d-flex justify-content-around align-items-center w-50 mx-auto">
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
  <script src="{{asset('assets/js/file-upload.js')}}"></script>
  <script src="{{asset('assets/js/datepicker.js')}}"></script>
  <script src="{{asset('assets/js/data-table.js')}}"></script>
  <!-- end custom js for this page -->
</body>
</html>