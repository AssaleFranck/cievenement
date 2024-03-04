<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Modifier | Dashboard</title>
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

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
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

				<nav class="page-breadcrumb"> 
                    <h5 class="mb-3 mb-md-0">Modifier  <span class="text-warning text-uppercase ml-1">{{$datas->name}}</span></h5>
				</nav>

				<div class="row">
					<div class="col-lg-12 grid-margin stretch-card ">
						<div class="card">
							<div class="card-body ">
								<h4 class="font-weight-normal text-center">Modifier les informations</h4>
								<form class="cmxform" id="signupForm" method="post" action=" {{route('users.update', $datas->id)}} ">
                                    @csrf
                                    @method('PATCH')
									<div>
										<div class="form-group w-75 mx-auto">
											<label for="name">Nom et prenoms <span class="text-danger">*</span></label>
											<input id="name" class="form-control @error('name') is-invalid @enderror" name="name"  type="text" value="{{$datas->name}}" >
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
										<div class="form-group w-75 mx-auto">
											<label for="email">Email</label>
											<input id="email" class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{$datas->email}}" readonly>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group w-75 mx-auto">
                                            <label for="phone" class="">Contact <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$datas->phone}}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        @if (Auth::user()->author)
                                            <div class="form-group w-75 mx-auto">
                                                <h6 class="font-weight-normal m-0 mb-2">Ajouter une autorisation particulière</h6>
                                                <div class="row d-flex justify-content-around m-0 p-0">
                                                    @if ($datas->admin)
                                                        <div class="w-25">
                                                            <h6 class="text-center font-weight-light">Administrateur</h6>
                                                            <div class="row justify-content-around mt-1">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio3" name="admin" value="1" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="customRadio3">Oui</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio4" name="admin" value="0" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customRadio4">Non</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="w-25">
                                                            <h6 class="text-center font-weight-light">admin</h6>
                                                            <div class="row justify-content-around mt-1">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio3" name="admin" value="1" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customRadio3">Oui</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio4" name="admin" value="0" class="custom-control-input"checked>
                                                                    <label class="custom-control-label" for="customRadio4">Non</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if ($datas->author)
                                                        <div class="w-25">
                                                            <h6 class="text-center font-weight-light">Auteur</h6>
                                                            <div class="row justify-content-around mt-1">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio1" name="author" value="1" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="customRadio1">Oui</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio2" name="author" value="0" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customRadio2">Non</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="w-25">
                                                            <h6 class="text-center font-weight-light">Auteur</h6>
                                                            <div class="row justify-content-around mt-1">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio1" name="author" value="1" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customRadio1">Oui</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio2" name="author" value="0" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="customRadio2">Non</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        
                                        @else
                                            <div class="form-group w-75 mx-auto">
                                                <h6 class="font-weight-normal m-0 mb-2">Ajouter une autorisation particulière</h6>
                                                <div class="row d-flex justify-content-start m-0 p-0">
                                                    @if ($datas->admin)
                                                        <div class="w-25">
                                                            <h6 class="text-center font-weight-light">Administrateur</h6>
                                                            <div class="row justify-content-around mt-1">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio3" name="admin" value="1" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="customRadio3">Oui</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio4" name="admin" value="0" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customRadio4">Non</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="w-25">
                                                            <h6 class="text-center font-weight-light">admin</h6>
                                                            <div class="row justify-content-around mt-1">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio3" name="admin" value="1" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customRadio3">Oui</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio4" name="admin" value="0" class="custom-control-input"checked>
                                                                    <label class="custom-control-label" for="customRadio4">Non</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        <div class="d-flex justify-content-around mt-4 w-50 mx-auto">
										    <a class="btn btn-outline-danger px-4" href="{{route('users.index')}}" >Annuler</a>
										    <button class="btn btn-outline-warning px-4" type="submit" >Modifier</button>
                                        </div>
									</div>
								</form>
                                <p>
                                    (<span class="text-danger">*</span>) Champs obligatoires.
                                </p>
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
