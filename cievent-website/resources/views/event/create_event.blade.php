<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard | Event</title>
        <!-- core:css -->
        <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="{{asset('assets/vendors/jquery-steps/jquery.steps.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
        <!-- end plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <!-- endinject -->
      <!-- Layout styles -->  
        <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{asset('images/icon.png')}}" />
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="main-wrapper">
    
            <!-- partial:../../partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial:../../partials/_sidebar.html -->
            @include('partials.settings-sidebar')
            <!-- partial -->
        
            <div class="page-wrapper">
                    
                <!-- partial:../../partials/_navbar.html -->
               @include('partials.navbar')
                <!-- partial -->
    
                <div class="page-content">
    
                    <nav class="page-breadcrumb d-flex justify-content-between align-items-center"> 
                        <h5 class="mb-3 mb-md-0">Ajouter un évènement</h5>
                        <a class="btn btn-outline-danger px-4 shadow-sm" href="{{route('event.index')}}">Annuler</a>
                    </nav>
    
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="font-weight-normal text-center">Remplissez le formulaire pour ajouter un évènement</h4>
                                    <form class="cmxform h-auto" id="signupForm" method="POST" action="{{route('event.store')}}" enctype="multipart/form-data">
                                    @csrf
                                        <div id="wizard" class="mt-3">
                                            <h2>Etape 1</h2>
                                            <section class="pb-1">
                                                <!-- --------------------- Event name input ------------------------ -->
                                                <div class="form-group w-75 mx-auto">
                                                    <label for="name">Nom de l'évènement <span class="text-danger">*</span></label>
                                                    <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" type="text" autofocus required>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="row w-75 mx-auto d-flex justify-content-between">
                                                    <!-- --------------------- VIP input ------------------------ -->
                                                    <div class="col-sm-4 p-0">
                                                        <div class="form-group">
                                                            <label for="vip">Prix VIP <span class="text-danger">*</span></label>
                                                            <input id="vip" class="form-control @error('vip') is-invalid @enderror" name="vip" value="{{old('vip')}}"  type="number" autofocus required>
                                                            @error('vip')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- --------------------- STANDARD input ------------------------ -->
                                                    <div class="col-sm-4 p-0">
                                                        <div class="form-group">
                                                            <label for="standard">Prix STANDARD <span class="text-danger">*</span></label>
                                                            <input id="standard" class="form-control @error('standard') is-invalid @enderror" name="standard" value="{{old('standard')}}"  type="number" autofocus required>
                                                            @error('standard')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 p-0 ">
                                                        <label for="">Publier l'évènement ? <span class="text-danger">*</span></label>
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <div class="form-check form-check-inline mt-2">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="statut" value="1">
                                                                    Oui
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline mt-2">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="statut" value="0" checked>
                                                                    Non
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- --------------------- files input ------------------------ -->
                                                <div class="form-group w-75 mx-auto">
                                                    <div class="form-group">
                                                        <label for="img">Ajouter une image <span class="text-danger">*</span>
                                                            {{-- <i id="icon_alert" style="width: 7 %" class="ml-1" data-feather="alert-circle"></i> --}}
                                                            {{-- <span  class="text-danger" id="alert">aucune photo ajouter</span> --}}
                                                        </label>
                                                        <input type="file" id="img" name="img" class="file-upload-default" required>
                                                        <div class="input-group col-xs-12">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-success rounded-left" type="button">Ajouter</button>
                                                            </span>
                                                            <input type="text" id="img_name" name="img_name" class="form-control file-upload-info @error('img_name') is-invalid @enderror" disabled="" placeholder="Selectionnez une seule image">

                                                        </div>
                                                    </div>
                                                    @error('img_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                 
                                            </section>

                                            <h2>Etape 2</h2>
                                            <section class="pb-1">

                                                <div class="row w-75 mx-auto d-flex justify-content-between">
                                                    <!-- --------------------- CONTACT ONE input ------------------------ -->
                                                    <div class="col-sm-5 p-0">
                                                        <div class="form-group">
                                                            <label for="contact_one">Contact 1 <span class="text-danger">*</span></label>
                                                            <input id="contact_one" class="form-control @error('contact_one') is-invalid @enderror" name="contact_one" value="{{old('contact_one')}}" placeholder="Tel" type="number" required>
                                                            @error('contact_one')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- --------------------- CONTACT TWO input ------------------------ -->
                                                    <div class="col-sm-5 p-0">
                                                        <div class="form-group">
                                                            <label for="contact_two">Contact 2</label>
                                                            <input id="contact_two" class="form-control @error('contact_two') is-invalid @enderror" name="contact_two" value="{{old('contact_two')}}" placeholder="Cel" type="number">
                                                            @error('contact_two')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- --------------------- Description input ------------------------ -->
                                                <div class="form-group w-75 mx-auto">
                                                    <label for="description">Description <span class="text-danger">*</span></label>
                                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4"required>{{old('description')}}</textarea>
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                
                                            </section>
                            
                                            <h2>Etape 3</h2>
                                            <section class="pb-0">
                                                <div class="row w-75 mx-auto d-flex justify-content-between">

                                                    <!-- --------------------- date input ------------------------ -->
                                                    <div class="col-sm-5 p-0">
                                                        <div class="form-group">
                                                            <label for="date">Choisissez une date <span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{old('date')}}" id="date" required autofocus>
                                                            @error('date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- --------------------- hour input ------------------------ -->
                                                    <div class="col-sm-5 p-0">
                                                        <div class="form-group">
                                                            <label for="time">Choisissez une heure <span class="text-danger">*</span></label>
                                                            <input id="time" type="time" class="form-control datetimepicker-input @error('time') is-invalid @enderror" value="{{old('time')}}" name="time" value="12:00" required>
                                                            @error('time')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- --------------------- Place input ------------------------ -->
                                                <div class="form-group w-75 mx-auto">
                                                    <label for="place">Lieu <span class="text-danger">*</span></label>
                                                    <input id="place" class="form-control @error('place') is-invalid @enderror" name="place" value="{{old('place')}}"  type="text" autofocus required>
                                                    @error('place')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <!-- --------------------- website input ------------------------ -->
                                                <div class="form-group w-75 mx-auto">
                                                    <label for="url">Site web <span class="text-danger">*</span></label>
                                                    <input type="url" class="form-control @error('url') is-invalid @enderror" name="url" id="url" value="https://www." placeholder="https://example.com" pattern="https://.*" size="30" required>
                                                    @error('url')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
     
                                            </section>
                            
                                            <h2>Etape 4</h2>
                                            <section class="pb-1">
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
                                                            <input id="" class="form-control @error('surname_invit') is-invalid @enderror" name="surname_invit" value="{{old('surname_invit')}}"  type="text" required>
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
                                                    <label for="compagny_invit">Poste/Entreprise <span class="text-danger">*</span></label>
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
                                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Selectionner une seule image">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-success rounded-left" type="button">Ajouter</button>
                                                        </span>
                                                    </div>
                                                    @error('img_invit')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </section>
                                            <p>
                                                (<span class="text-danger">*</span>) Champs obligatoires.
                                            </p>
                                        </div>
                                    </form>
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
        <script src="{{asset('assets/vendors/jquery-steps/jquery.steps.min.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <!-- end plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/template.js')}}"></script>
        <!-- endinject -->
        <!-- custom js for this page -->
        <script src="{{asset('assets/js/wizard.js')}}"></script>
	    <script src="{{asset('assets/js/file-upload.js')}}"></script>
        <script src="{{asset('assets/js/datepicker.js')}}"></script>
        <script src="{{asset('assets/js/timepicker.js')}}"></script>
        <!-- end custom js for this page -->
       
    </body>
</html>
<style>
    input:hover{
        border: 1px solid green !important;
    }
    textarea:hover{
        border: 1px solid green !important;
    }
    
    
    input:focus{
        border: 1px solid green !important;
    }
    textarea:focus{
        border: 1px solid green !important;
    }


    .pointer{
        cursor: pointer;
    }
    .wizard>.content{
        border: none !important;
    }
    .wizard>.steps{
        border-bottom: 1px solid #e8ebf1;
    }
</style>