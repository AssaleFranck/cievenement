<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard | Folder</title>
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
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{asset('images/icon.png')}}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:../../partials/_sidebar.html -->
        @include('partials.sidebar')
        @include('partials.settings-sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
				
			<!-- partial:../../partials/_navbar.html -->
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
                <!-- Modal -->
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title w-100 text-center" id="addLabel">Ajouter un fichier</h5>
                            </div>
                            <div class="modal-body">
                                <form action="" method="" id="add_file" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                      <label for="img">Ajouter un fichier
                                      </label><span  class="text-danger ml-2" id="msg"><i id="icon_alert" style="width: 3%" data-feather="alert-circle"></i>  Veuillez ajouter un fichier</span>
                                      <input type="file" id="img" name="img" class="file-upload-default img @error('img') is-invalid @enderror" required>
                                      <div class="input-group col-xs-12">
                                          <span class="input-group-append">
                                              <button class="file-upload-browse btn btn-success rounded-left btn_inp" type="button">Ajouter</button>
                                          </span>
                                          <input type="text" id="name" name="name" class="form-control file-upload-info name @error('img_name') is-invalid @enderror" disabled="" placeholder="Selectionnez un seul fichier">
                                      </div>
                                  </div>
                                </form>
                            </div>
                            <div class="modal-footer border border-none w-50 mx-auto d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annuler</button>
                                <button class="btn btn-outline-info" id="submit">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal End-->
                <nav class="page-breadcrumb d-flex justify-content-between align-items-center"> 
                  <h5 class="mb-3 mb-md-0">Liste des fichiers disponibles</h5>
                  <a href="#" class="btn btn-outline-info shadow-sm" data-toggle="modal" data-target="#add">Ajouter un fichier</a>
                </nav>
                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          @if ($datas->count() > 0)
                            <table id="dataTableExample" class="table table-hover">
                              <thead>
                                <tr>
                                  <th class="text-center">#</th>
                                  <th class="text-center">Noms</th>
                                  <th class="text-center">Types</th>
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
                                      <a class="text-decoration-none text-reset mr-3" href="{{route('event.show', $list->id)}}">{{$list->type}}</a>
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
                          @else
                            <div class="col-12 p-2 text-muted text-center">
                              <span class="col-4 text-uppercase h6">Aucun évènement enregistré</span>
                              <a href="" class="btn btn-warning test">test</a>
                            </div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      
              </div>

			<!-- partial:../../partials/_footer.html -->
            @include('partials.footer')
			<!-- partial -->
	
		</div>
	</div>

	<!-- core:js -->
	{{-- <script src="{{asset('assets/vendors/core/core.js')}}"></script> --}}
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
    <script src="{{asset('assets/js/file-upload.js')}}"></script>
    <!-- end custom js for this page -->
	<script src="{{asset('assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
  {{-- <script src="{{asset('js/ajax_crud.js')}}"></script> --}}
  <script>
    $(document).ready(function () {
    
      $('#submit').click(function (e) { 
        e.preventDefault();
        
        var data = $('#img').val();
        console.log(data);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url: '{{route('folders.store')}}',
          method: "post",
          data: "data",
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (response) {
            alert('succes');
          }
        });

      });


      
      
    });
  </script>
</body>
</html>