@extends('layouts.app_principale')
@section('title', "Welcome Cote d'Ivoire évènement")
@section('content')
<!-- Banner Conference Two -->
<section class="banner-conference-two" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="auto-container">
                    <div class="content-box">
                        <div class="time-counter">
                            <div class="time-countdown clearfix" data-countdown="{{$date}}"></div>
                        </div>
                        <h2>La plus grande entreprise  STRATÉGIE EN 2022</h2>
                        <span class="title">6 Mars, 2022, Au Palais de la Culture, Abidjan</span>
                        <div class="btn-box">
                            <a href="/events" class="theme-btn btn-style-two"><span class="theme-btn">Je m'inscris à un évènement</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image p-0">
                    <img src="{{ asset('images/power.jpg') }}" alt="about image" class="img-fluid">
                    <a  href="https://www.youtube.com/watch?v=8MKn_5zx0Js"  data-fancybox class="play-btn" >
                        <i class="icon fa fa-play"></i>
                        <span class="pluse_2"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Conference Two -->


   <!--Clients Section-->
    <section class="clients-section-two" style="background-image: url(images/background/9.jpg);">

        <div class="auto-container">
             <h1>Nos partenaires</h1>

            <div class="sponsors-outer">

              <div class="row p-2">

                <div class="owl-carousel owl-theme">
                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part1.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part2.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part3.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part4.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part5.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part6.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part7.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part8.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part9.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part10.png') }}" alt="">
                  </div>

                  <div class="item">
                      <img src="{{ asset('users_asset/img/part/part11.png') }}" alt="">
                  </div>

                </div>

                
             </div>

            </div>

        </div>

    </section>
    <!--FIN Clients Section-->


    <!-- Je peux dire ici en quelque mot du service de l'entreprise -->
    <section class="fluid-section-one">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                 <div class="about-image">
                  <img src="{{ asset('images/power.jpg') }}" alt="about image">
                   <a href="https://www.youtube.com/watch?v=CC3Nu5Rndxc"  data-fancybox data-id="iframe" class="play-btn">
                      <i class="icon fa fa-play"></i>
                      <span class="pluse_2"></span>
                   </a>
                 </div>

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-5">
                    <h2 class="text-white">PRESENTATION</h3> <hr>
                     <p class="text-white">Fondée en 2019, l’agence Côte d’Ivoire Evènement,en deux années d’existence, notre agence compte une vingtaine d’événements à son actif dont :</p>
                     <ul>
                         <li class="d-flex flex-row justify-content-start">
                             <h1><span class="fa fa-mars-double text-white" aria-hidden="true"></span></h1>
                             <span class="pt-3 px-2 font-weight-bold">Séminaire de la Direction des Marchés Publics</span>
                         </li>

                         <li class="d-flex flex-row justify-content-start">
                             <h1><span class="fa fa-expeditedssl text-white" aria-hidden="true"></span></h1>
                             <span class="pt-3 px-2 font-weight-bold">Conférences SUCCES (deux éditions)</span>
                         </li>

                         <li class="d-flex flex-row justify-content-start">
                             <h1><span class="fa fa-american-sign-language-interpreting text-white" aria-hidden="true"></span></h1>
                             <span class="pt-3 px-2 font-weight-bold">Service Universel des Télécommunications/TIC</span>
                         </li>

                      </ul>
                      <div class="btn-box">
                         <a href="/services" class="theme-btn btn-style-two"><span class="theme-btn">En savoir plus</span></a>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin du services entreprise -->

    <section class="schedule-section style-three">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h3>Conference & Événement </h3>
                <span class="title"> Conference & Événement</span>
                <p> Explorez une autre façon de voyager.
                    Dans l'aventure de nos évènements !
                </p>
            </div>

              <div class="container-fluid contenedor text-center">
                 <div class="container text-center">

                   <div class="row">  <!-- debut ligne -->
                        <!-- debut col 1 -->
                        @forelse ($events as $event)
                            @if ($event->statut)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 container_foto">
                                    <div class="ver_mas text-center pt-4">
                                        <a href="{{route('event.details', $event->id)}}" class="text-white btn px-5">Lire plus <i class="fa fa-plus-circle"></i></a>
                                    </div>
                                    <article class="text-left">
                                        <h2>{{$event->name}}</h2>
                                        {{-- <h4>Sont des lucarnes pendant lesquelles les jeunes</h4> --}}
                                    </article>
                                    <img src="{{asset('images/events/'.$event->img)}}" alt="évènement Côte d'Ivoire evenement">
                                </div><!-- fin col 1 -->
                            @endif
                            
                        @empty
                            <p class="mx-auto text-center">Aucun évènements disponible</p>
                        @endforelse

                    {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 container_foto">
                       <div class="ver_mas text-center pt-4">
                       <a href="/events-details" class="text-white btn px-5">Lire plus <i class="fa fa-plus-circle"></i></a>
                       </div>
                       <article class="text-left">
                          <h2>TÍTULO DE LA IMAGEN</h2>
                          <h4>Descripción corta de la imagen en cuestión</h4>
                       </article>
                       <img src="{{ asset('users_asset/img/events/event2.png') }}" alt="">
                    </div> <!-- fin col 2 -->

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 container_foto">
                       <div class="ver_mas text-center pt-4">
                       <a href="#" class="text-white btn px-5">Lire plus <i class="fa fa-plus-circle"></i></a>
                       </div>
                       <article class="text-left">
                          <h2>TÍTULO DE LA IMAGEN</h2>
                          <h4>Descripción corta de la imagen en cuestión</h4>
                       </article>
                       <img src="{{ asset('users_asset/img/events/event3.png') }}" alt="">
                    </div> <!-- fin col 3 -->

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 container_foto">
                       <div class="ver_mas text-center pt-4">
                       <a href="#" class="text-white btn px-5">Lire plus <i class="fa fa-plus-circle"></i></a>
                       </div>
                       <article class="text-left">
                          <h2>TÍTULO DE LA IMAGEN</h2>
                          <h4>Descripción corta de la imagen en cuestión</h4>
                       </article>
                       <img src="{{ asset('users_asset/img/events/event4.png') }}" alt="">
                    </div> <!-- fin col 4 --> --}}

                    
                    {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 container_foto">
                       <div class="ver_mas text-center pt-4">
                       <a href="#" class="text-white btn px-5">Lire plus <i class="fa fa-plus-circle"></i></a>
                       </div>
                       <article class="text-left">
                          <h2>TÍTULO DE LA IMAGEN</h2>
                          <h4>Descripción corta de la imagen en cuestión</h4>
                       </article>
                       <img src="{{ asset('users_asset/img/events/event5.png') }}" alt="">
                    </div> <!-- fin col 5 -->

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 container_foto">
                       <div class="ver_mas text-center pt-4">
                         <a href="#" class="text-white btn px-5">Lire plus <i class="fa fa-plus-circle"></i></a>
                       </div>
                       <article class="text-left">
                          <h2>TÍTULO DE LA IMAGEN</h2>
                          <h4>Descripción corta de la imagen en cuestión</h4>
                       </article>
                       <img src="{{ asset('users_asset/img/events/event6.png') }}" alt="">
                    </div> <!-- fin col 6 --> --}}



                   </div><!-- debfinut ligne -->

                 </div>
              </div>
               @if ($events->count()==0)
                   
               @else
                  <div class="btn-box mb-2 text-center">
                     <a href="/events" class="theme-btn btn-style-two"><span class="theme-btn">Tous nos évenements</span></a>
                  </div>
               @endif

              

        </div>
    </section>

    <!-- Partie Blog  -->
    <section class="news-section blog-index">

        <div class="anim-icons">

        </div>



        <div class="auto-container">

            <div class="sec-title text-center">

                <h2>Blog réçents</h2>
                <span class="title">Nos Blogs</span>
                {{-- <p>Explorez une autre façon de voyager. Dans l'aventure de Nos blogs!</p> --}}


            </div>



            <div class="row">


                <!-- News Block Three -->
                @forelse($posts as $post)
                    <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">

                        <div class="inner-box">

                            <div class="image-box">

                                <figure class="image"><a href="{{ route('blog.show', $post->id) }}"><img src="{{asset('images/posts/'.$post->imagePath)}}" alt="poste Côte d'Ivoire Evenement" id="index"></a></figure>

                            </div>

                            <div class="lower-content">

                                <h4><a href="{{ route('blog.show', $post->id) }}">{!! strip_tags(substr($post->title, 0, 25,)) !!}... </a></h4>


                                <ul class="post-info">

                                    <li><span class="fa fa-user"></span> {{ $post->user->name }}</li>

                                    <li><span class="fa fa-calendar-plus-o" aria-hidden="true"></span><span class="font-bold italic text-success"> {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
                                        </span></li>

                                </ul>
                                <!-- <div class="btn-box "><a href="#" class="read-more">Voir plus</a></div> -->

                            </div>

                        </div>

                    </div>
                @empty
                    <div class="auto-container">
                        <li class=" d-flex justify-content-center">Aucun post disponible</li>
                    </div>
                @endforelse

            </div>


            @if ($posts->count() == 0)

            @else
                <!-- Partie bouton -->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a href="/blog" class="btn btn-outline-success h1 font-weight-bold px-5">Voir plus</a>
                    </div>
                </div>
            @endif


        </div>

    </section>


<!-- <section class="subscribe-section">  -->
<section class="subscribe-section">

        <div class="auto-container">

            <div class="content-box">


                    <div class="title-column">

                        <div class="sec-title">
                            <h2>Abonnez-vous à notre newsletter</h2>
                            <span> Et recévrez nos différents actualités</span>

                        </div>



                        <!--Newsletter Form-->

                        <div class="newsletter-form">

                            <form method="post" action="blog">

                                <div class="form-group d-flex justify-content-start flex-row align-items-start border border-warning border-1 px-0">

                                    <input type="email" name="field-name" class="border-0 pr-0" placeholder="Entrez votre Adresse e-mail" required>

                                    <button type="submit" class="theme-btn btn-style-three border-0"><span class="btn-title">Souscrire</span></button>

                                </div>

                            </form>

                        </div>



                    </div>

            </div>

        </div>

</section>
<!--End Subscribe Section -->
<style>
    input{
        outline: none;
    }
</style>



  

@endsection
