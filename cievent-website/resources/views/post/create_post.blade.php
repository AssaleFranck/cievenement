<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta title="viewport" content="width=device-width, initial-scale=1.0">
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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
                    <h5 class="mb-3 mb-md-0">Créer un nouveau post</h5>
                    <a href="{{route('post.index')}}" class="btn btn-outline-info shadow-sm">retour</a>
                </nav>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="font-weight-normal text-center ">Remplissez le formulaire pour créer un post</h4>
								<form class="cmxform mt-3" id="signupForm" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                    @csrf
									<fieldset>

                                        <!-- --------------------- Title input ------------------------ -->
										<div class="form-group w-75 mx-auto">
											<label for="title">Titre <span class="text-danger">*</span></label>
											<input id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}"  type="text" autofocus required>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>

                                        <!-- --------------------- Category select ------------------------ -->
										<div class="form-group w-75 mx-auto">
											<label for="category_id">Choisir une catégorie <span class="text-danger">*</span></label>
                                            <select name="category_id" id="categories" class="@error('category_id') is-invalid @enderror">
                                                <option class="text-light" selected disabled>Selectionner une categorie </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- --------------------- files input ------------------------ -->
                                        <div class="form-group w-75 mx-auto">
                                            <label for="imagePath">Ajouter une image <span class="text-danger">*</span></label>
                                            <input type="file" id="imagePath" name="imagePath" class="file-upload-default @error('imagePath') is-invalid @enderror" required>
                                            <div class="input-group col-xs-12">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary rounded-left" type="button">Ajouter</button>
                                                </span>
                                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Selectionner une seule image">
                                            </div>
                                            @error('imagePath')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- --------------------- Description input ------------------------ -->
                                        <div class="form-group w-75 mx-auto">
                                            <label for="body">Description du poste <span class="text-danger">*</span></label>
                                            <textarea id="body" class="border form-control @error('body') is-invalid @enderror" name="body" rows="15"required>{{old('body')}}</textarea>
                                            @error('body')
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
    @section('scripts')
    <script>
        CKEDITOR.replace('body');
    </script>

</body>
</html>
<style>

    textarea:hover{
        border: 1px solid blue !important;
    }
    select:hover{
        border: 1px solid blue !important;
    }
    input:hover{
        border: 1px solid blue !important;
    }


    input:focus{
        border: 1px solid blue !important;
    }
    select:focus{
        border: 1px solid blue !important;
    }
    textarea:focus{
        border: 1px solid blue !important;
    }

</style>
