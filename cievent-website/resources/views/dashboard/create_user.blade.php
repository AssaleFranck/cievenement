<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard | Ajouer User</title>
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

				<nav class="page-breadcrumb d-flex justify-content-between"> 
                    <h5 class="mb-3 mb-md-0">Ajouter un utilisateur</h5>
                    <a class="btn btn-outline-info shadow-sm" href="{{route('users.index')}}">retour</a>
				</nav>

				<div class="row">
					<div class="col-lg-12 grid-margin stretch-card ">
						<div class="card">
							<div class="card-body ">
								<h4 class="font-weight-normal text-center">Remplissez le formulaire pour l'inscription</h4>
								<form class="cmxform" id="signupForm" method="POST" action=" {{route('users.store')}} ">
                                    @csrf
									<fieldset>
										<div class="form-group w-75 mx-auto">
											<label for="name">Nom et prenoms <span class="text-danger">*</span></label>
											<input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}"  type="text" min="4" autofocus >
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
										<div class="form-group w-75 mx-auto">
											<label for="email">Email <span class="text-danger">*</span></label>
											<input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" type="email" placeholder="exemple@mail.com">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group w-75 mx-auto">
                                            <label for="phone" class="">Contact <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone')}}" name="phone" placeholder="1234567890 ou 225XXXXXXXXXX">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        @if (Auth::user()->author)
                                            <div class="form-group w-75 mx-auto">
                                                <h6 class="font-weight-normal m-0">Ajouter une autorisation particulière</h6>
                                                <div class="row d-flex justify-content-around w-50 m-0 p-0">
                                                    <div class="form-check d-flex align-items-center m-0 p-0">
                                                        <input class="form-check-input m-0" type="checkbox" name="admin" value="1" id="defaultCheck1">
                                                        <label class="form-check-label mt-2" for="defaultCheck1">Administrateur</label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center m-0 p-0">
                                                        <input class="form-check-input m-0" type="checkbox" name="author"value="1" id="defaultCheck2">
                                                        <label class="form-check-label mt-2" for="defaultCheck2">Auteur</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
										<div class="form-group w-75 mx-auto">
											<label for="password">Password <span class="text-danger">*</span></label>
											<input id="password" class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="+8 caractères">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
										<div class="form-group w-75 mx-auto">
											<label for="confirm_password">Confirmer password <span class="text-danger">*</span></label>
											<input id="confirm_password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" type="password" placeholder="+8 caractères">
                                            @error('confirm_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
                                       <div class="d-flex justify-content-around w-25 mx-auto">
										    <a class="btn btn-outline-danger px-4" href="{{route('users.index')}}" >Annuler</a>
										    <button class="btn btn-outline-warning px-4" type="submit" >Ajouter</button>
                                        </div>
									</fieldset>
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
