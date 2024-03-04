@extends('layouts.app_principale')
@section('title', "Contactez-nous ici | ci-event")
@section('content')

    <!--Page Title-->

    <section class="page-title">

        <div class="auto-container">

            <h1 class="text-secondary">Nous Contactez ?</h1>

            <ul class="bread-crumb clearfix">

                <li class="text-secondary"><a href="/" class="text-secondary">Accueil</a></li>
                <li class="text-secondary">||</li>
                <li class="text-secondary">Contact</li>


            </ul>

        </div>

    </section>
  <!-- Fin banniere -->


  <!-- Début section contact -->
  <section class="contact-page-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="contact-column col-lg-4 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>Contact Info</h2>
                        </div>
                        <ul class="contact-info">
                            <li>
                                <span class="icon fa fa-street-view"></span> 
                                <p><strong>Abidjan, Evènement,</strong></p>
                                <p>Cocody Abidjan, Cote d'ivoire</p>
                            </li>

                            <li>
                                <span class="icon fa fa-phone"></span> 
                                <p><strong>Appellez-nous</strong></p>
                                <p>+225 2722497873</p>
                            </li>

                            <li>
                                <span class="icon fa fa-envelope"></span> 
                                <p><strong>Notre Adresse Email</strong></p>
                                <p><a href="mailto:information@cievenement.ci">information@cievenement.ci</a></p>
                            </li>

                            <li>
                                <span class="icon fa fa-clock-o"></span> 
                                <p><strong>Horaire d'Ouverture</strong></p>
                                <p>Lun - Sam: 08h30 - 19h30</p>
                            </li>
                        </ul>

                        <ul class="social-icon-two social-icon-colored">
                            <li><a href="https://www.facebook.com/cievent225/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            {{-- <li><a href="#"><i class="fa fa-twitter" target="_blank"></i></a></li> --}}
                            <li><a href="https://instagram.com/cotedivoireevenement?utm_medium=copy_link"><i class="fa fa-instagram" target="_blank"></i></a></li>
                            {{-- <li><a href="#"><i class="fa fa-google-plus" target="_blank"></i></a></li> --}}
                        </ul>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="contact-form">
                            <div class="sec-title">
                                <h2>Souhaiterez-nous contactez ?</h2>
                            </div>
                            
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{Session::get('success')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('contact.post') }}" id="contact-form" method="post">

                                @csrf

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Nom et prénoms" required="" class="{{ $errors->has('username') ? 'error' : '' }}">
                                        <!-- Error -->
                                       @if ($errors->has('username'))
                                          <div class="error ">
                                              {{ $errors->first('username') }}
                                          </div>
                                       @endif
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Votre numéro tel" required="" class="{{ $errors->has('phone') ? 'error' : '' }}">
                                         <!-- Error -->
                                       @if ($errors->has('phone'))
                                          <div class="error">
                                              {{ $errors->first('phone') }}
                                          </div>
                                       @endif
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Adresse email" required="" class="{{ $errors->has('email') ? 'error' : '' }}">
                                          <!-- Error -->
                                       @if ($errors->has('email'))
                                          <div class="error">
                                              {{ $errors->first('email') }}
                                          </div>
                                       @endif
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="subject"  value="{{ old('subject') }}" placeholder="Votre Subjet" required="" class="{{ $errors->has('subject') ? 'error' : '' }}">
                                        @if ($errors->has('subject'))
                                          <div class="error">
                                              {{ $errors->first('subject') }}
                                          </div>
                                       @endif
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" value="{{ old('message') }}" placeholder="Votre message" class="{{ $errors->has('message') ? 'error' : '' }}"></textarea>
                                        @if ($errors->has('message'))
                                          <div class="error">
                                              {{ $errors->first('message') }}
                                          </div>
                                       @endif
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" type="submit" name="send"><span class="btn-title">Envoyer</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fin section contact  -->

    <!-- Debut section map localisation  -->
    <section class="map-section">
        <div class="auto-container">
            <div class="map-outer">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.1962262895927!2d-3.9550234!3d5.387035099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc193a49c3cf06b%3A0x2464836d4fdc35ca!2sC%C3%B4te%20d&#39;Ivoire%20Ev%C3%A8nement%20(CI%20EVENT)!5e0!3m2!1sfr!2sci!4v1644243230436!5m2!1sfr!2sci" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
    <!-- Fin section map localisation  -->


@endsection