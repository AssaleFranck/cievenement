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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
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
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
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
    
                <div class="page-content ">
                    <nav class="page-breadcrumb d-flex justify-content-between align-items-center"> 
                        {{-- <a href="{{route('event.show')}}" class="btn btn-outline-info shadow-sm">Retour</a> --}}
                        {{-- <a href="{{route('event.edit', $regis->id)}}" class="btn btn-outline-success shadow-sm">Modifier l'évènement</a> --}}
                    </nav>
                   
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Envoyer un email à  <span class="font-weight-bolder text-warning ml-1">{{$regis->name}}</span></h4>
                                    <form method="POST" action="{{route('register.mail_send')}}" name="formulaire">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="title">Titre</label>
                                                <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" type="text">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="subject">Objet</label>
                                                <input id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" type="text">
                                                @error('subject')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Titre</label>
                                                <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$regis->email}}" type="email" readonly>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="message">
                                                    Message <i id="icon_alert" style="width: 20%" class="ml-1" data-feather="alert-circle"></i>
                                                </label>
                                                <span  class="text-danger" id="alert">Les lignes seront prises en compte seulement dans l'e-mail</span>
                                                <textarea id="message" minlength="20" name="message" class="form-control @error('message') is-invalid @enderror" rows="8" placeholder="Entrer votre message ici..."></textarea>
                                                @error('message')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-success" type="submit" value="Submit">Envoyer</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-center h-100">
        
                                        <div class="card text-center color shadow-sm h-100">
                                            <div class="card-header bg-white">
                                                <img class="img-fluid" src="{{asset('images/logo.png')}}" alt="Logo Côte D'Ivoire Evenement" width="400px"/>
                                            </div>
                                            <div class="card-body py-3 ">
                                                <h5 class="card-title" id="showtitle">Titre 1</h5>
                                                <p class="card-text" id="showmessage">Message...</p>
                                            </div>
                                            <div class="card-footer bg mt-6">
                                                <p class=" text-warning text-center">
                                                    COTE D’IVOIRE EVENEMENT. <br>
                                                    Cocody Angré Nouveau CHU <br>
                                                    Abidjan, 31 BP 352 abj 31 <br>
                                                    Tél. : (225) 27 22 49 78 73 – Cel. : (225) 07 09 18 13 42
                                                </p>
                                            </div>
                                        </div>
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
	<script src="{{asset('assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="{{asset('assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('assets/js/template.js')}}"></script>
	<!-- endinject -->
    <script>
       
        $(document).ready(function () {
            
            $("#title").keydown(function(){
                var tle = document.formulaire.title.value;
                $("#showtitle").text(tle);
            });
            $("#message").keydown(function(){
                var msg = document.formulaire.message.value;
                $("#showmessage").text(msg);
            });
            $("textarea").keydown(function(){
                $("#alert").hide("slow");
            });
            $("#icon_alert").click(function(){
                $("#alert").show("slow");
            });
            
        });
    </script>
    </body>
</html>
<style>
    .bg{
        background-color: rgba(0, 0, 0, 0.747);
    }
</style>