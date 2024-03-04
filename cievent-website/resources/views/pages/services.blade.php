@extends('layouts.app_principale')
@section('title', "Nos produits et services")
@section('content')

    <!--Page Title-->

    <section class="page-title">

        <div class="auto-container">

            <h1 class="text-secondary">À propos de nous</h1>

            <ul class="bread-crumb clearfix">

                <li class="text-secondary"><a href="/" class="text-secondary">Accueil</a></li>
                <li class="text-secondary">||</li>
                <li class="text-secondary">À propos nous</li>

            </ul>

        </div>

    </section>

    <!--End Page Title-->



    <!-- About Section -->

    <section class="about-section">

        <div class="anim-icons full-width">

            <span class="icon fa fa-circle-o wow fadeIn" aria-hidden="true"></span>

            <span class="icon fa fa-dot-circle-o wow fadeInleft" aria-hidden="true"></span>

            <span class="icon fa fa-circle-o wow zoomIn" aria-hidden="true"></span>

        </div>

        <div class="auto-container">

            <div class="row">

                <!-- Content Column -->

                <div class="content-column col-lg-6 col-md-12 col-sm-12">

                    <div class="inner-column">

                        <div class="sec-title">

                            <span class="title">À propos de Cote d'Ivoire Evènement</span>

                            <h2>Bienvenue à Notre Plateforme digitale Cote d'ivoire</h2>

                            <div class="text">Fondée en 2019, l’agence Côte d’Ivoire Evènement est spécialisée en communication et logistique événementielle, rédaction de projets événementiels, elle
                            assure le suivi et la stratégie marketing et commerciale de vos événements.
                            Innovante, notre agence se positionne sur le marché comme la pionnière en
                            événementiel corporate, avec un brin de citoyenneté qui la pousse à développer des concepts de valorisation des réussites de notre pays, la décentralisation
                            des affaires et la mise en avant des talents locaux.
                            En deux années d’existence, notre agence compte une vingtaine d’événements
                            à son actif dont :
                            </div>

                        </div>


                        <div class="btn-box"><a href="/events" class="theme-btn btn-style-three"><span class="btn-title">S'inscrire maintenant</span></a></div>

                    </div>

                </div>



                <!-- Image Column -->

                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="d-flex key-feature align-items-center p-3 rounded shadow mb-3">
                            <div class="icon text-center rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor fea icon-ex-md text-success"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                            </div>
                            <div class="flex-1 p-2">
                                <h5 class="title mb-0">Séminaire de la Direction des Marchés Publics</h5>
                            </div>
                        </div>

                        <div class="d-flex key-feature align-items-center p-3 rounded shadow mb-3">
                            <div class="icon text-center rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart fea icon-ex-md text-success"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                            </div>
                            <div class="flex-1 p-2">
                            <h5 class="title mb-0">Lancement de la nouvelle plateforme web de l’Agence Nationale</h5>
                            </div>
                        </div>
                        <div class="d-flex key-feature align-items-center p-3 rounded shadow mb-3">
                            <div class="icon text-center rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye fea icon-ex-md text-success"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </div>
                            <div class="flex-1 p-2">
                            <h5 class="title mb-0">Service Universel des Télécommunications/TIC</h5>
                            </div>
                        </div>
                        <div class="d-flex key-feature align-items-center p-3 rounded shadow mb-3">
                            <div class="icon text-center rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check fea icon-ex-md text-success"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                            </div>
                            <div class="flex-1 p-2">
                            <h5 class="title mb-0">Afterwork BETWEEN US (sept éditions)</h5>
                            </div>
                        </div>

                        <div class="d-flex key-feature align-items-center p-3 rounded shadow mb-3">
                            <div class="icon text-center rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-merge fea icon-ex-md text-success"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M6 21V9a9 9 0 0 0 9 9"></path></svg>
                            </div>
                            <div class="flex-1 p-2">
                                <h5 class="title mb-0">Conférences SUCCES (deux éditions)</h5>
                            </div>
                        </div>

                        <div class="d-flex key-feature align-items-center p-3 rounded shadow mb-3">
                            <div class="icon text-center rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings fea icon-ex-md text-success"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            </div>
                            <div class="flex-1 p-2">
                                <h5 class="title mb-0">Easy to customize</h5>
                            </div>
                        </div>

                        <div class="d-flex key-feature align-items-center p-3 rounded shadow mb-3">
                            <div class="icon text-center rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather fea icon-ex-md text-success"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line></svg>
                            </div>
                            <div class="flex-1 p-2">
                                <h5 class="title mb-0">Salon Africain de l’Entrepreneuriat</h5>
                            </div>
                        </div>
                </div>

            </div>

        </div>

    </section>

    <!--End About Section -->



    <!-- Fun Fact Section -->

    <section class="fun-fact-section style-two" style="background-image: url(images/power.jpg);">

        <div class="auto-container">

            <div class="fact-counter">

                <div class="row clearfix">



                    <!--Column-->

                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">

                        <div class="count-box">

                            <span class="icon fa fa-users"></span>

                            <span class="count-text" data-speed="12890" data-stop="2050">0</span>

                            <h4 class="counter-title">Participants</h4>

                        </div>

                    </div>



                    <!--Column-->

                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">

                        <div class="count-box">

                            <span class="icon fa fa-rss-square"></span>

                            <span class="count-text" data-speed="2022" data-stop="154">0</span>

                            <h4 class="counter-title">Entreprises satisfaites</h4>

                        </div>

                    </div>



                    <!--Column-->

                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">

                        <div class="count-box">

                            <span class="icon fa fa-thumbs-o-up"></span>

                            <span class="count-text" data-speed="3230" data-stop="2017">0</span>

                            <h4 class="counter-title">Temoignages participants </h4>

                        </div>

                    </div>



                    <!--Column-->

                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">

                        <div class="count-box">

                            <span class="icon fa fa-grav" aria-hidden="true"></span>

                            <span class="count-text" data-speed="3150" data-stop="38">0</span>

                            <h4 class="counter-title">Intervenants réçus</h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--End Fun Fact Section -->



    <!-- Features Section Two -->

    <section class="features-section-two">

        <div class="auto-container">

            <div class="anim-icons">   

                <span class="icon twist-line-1 wow zoomIn"></span>

                <span class="icon twist-line-2 wow zoomIn" data-wow-delay="1s"></span>

                <span class="icon twist-line-3 wow zoomIn" data-wow-delay="2s"></span>

            </div>



            <div class="row">

                <!-- Title Block -->

                <div class="title-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">

                    <div class="inner-box">

                        <div class="sec-title">

                            <span class="title">NOS CARACTÉRISTIQUES</span>

                            <h2>Nos Services</h2>

                        </div>

                    </div>

                </div>



                <!-- Feature Block -->

                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp">

                    <div class="inner-box">

                        <div class="icon-box"><span class="icon fa fa-thumbs-o-up"></span></div>

                        <h4><a href="/events">Salon / Forum / Séminaire</a></h4>

                        <div class="text">Une occasion unique d’échanger avec les responsables pédagogiques pour leur poser toutes vos questions </div>

                    </div>

                </div>



                <!-- Feature Block -->

                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp">

                    <div class="inner-box">

                        <div class="icon-box"><span class="icon fa fa-american-sign-language-interpreting" aria-hidden="true"></span></div>

                        <h4><a href="/events">Événements Relations Publiques</a></h4>

                        <div class="text">Trouver des experts,crée des relations professionelles et apprendre d'eux, à un seul endroit cote d'ivoire évènement votre agence.</div>

                    </div>

                </div>



                <!-- Feature Block -->

                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">

                    <div class="inner-box">

                        <div class="icon-box"><span class="icon fa fa-diamond" aria-hidden="true"></span></div>

                        <h4><a href="/events">Marketing événementiel</a></h4>

                        <div class="text">La publicité, la vidéos de qualitée, strategies de contenue et digitale, image de marge : c'est notre affaire</div>

                    </div>

                </div>



                <!-- Feature Block -->

                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">

                    <div class="inner-box">

                        <div class="icon-box"><span class="icon fa fa-bandcamp" aria-hidden="true"></span></div>

                        <h4><a href="/events">Soirées d’entreprise/Convention</a></h4>

                        <div class="text">Soirées et diners spectables, soirées de fin d'année, cocktail, annimation soirée, soirées et dinerd de gala</div>

                    </div>

                </div>



                <!-- Feature Block -->

                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">

                    <div class="inner-box">

                        <div class="icon-box"><span class="icon fa fa-certificate" aria-hidden="true"></span></div>

                        <h4><a href="/events">Team building</a></h4>

                        <div class="text">exercices, jeux, jeux de rôles, partage, cooccurrence et  écoute, Créer/renforcer la cohésion de groupe, Développer l'intelligence...</div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--End Features Section -->



    <!-- Call to action -->

    <section class="call-to-action" style="background-image: url(images/power.jpg);">

        <div class="auto-container">

            <div class="content-box">

                <div class="text">NOUS SOMMES UNE ENTREPRISE DE LEADER AVEC DES VALEURS</div>

                <h4 class="text-white">À chaque événement sa cible, ses hommes, son histoire
                  et sa problématique, c’est la raison pour laquelle nous
                  utilisons nos valeurs comme piliers pour élaborer l’évènement 
                  sur-mesure qui vous conviendra parfaitement.
                </h4>
                <ul class="text-white pb-3">
                    <li> Enthousiasme</li>
                    <li> Innovation</li>
                    <li> Humaniste</li>
                    <li> Engagement</li>
                </ul>
                

                <div class="btn-box">

                    <a href="/contact" class="theme-btn btn-style-one"><span class="btn-title">Contactez-nous</span></a>

                </div>

            </div>

        </div>

    </section>

    <!--End Call to action -->



        <!-- App Section -->
<section class="app-section">

<div class="auto-container">

    <div class="row">

        <!-- Content Box -->

        <div class="content-column col-lg-5 col-md-12 col-sm-12">

            <div class="inner-column">

                <div class="sec-title">

                    <span class="title">Nous intervenons aussi.</span>

                    <h2>EVENEMENTS DIGITAUX</h2>

                </div>

                <div class="text-box">Les animations digitales gagnent très vite en importance avec l’avènement d’internet et le rythme actuel de l’évolution des technologies. En optant pour une animation numérique vous rendez votre
                événement plus attractif pour vos convives.</div>

                <div class="">
                    <ul class="d-flex flex-wrap justify-content-center">
                        <li class="mr-3 mb-2 px-3 rounded link_shadow"><a class="link_color" href="#">Réalité virtuelle</a></li>
                        <li class="mr-3 mb-2 px-3 rounded link_shadow"><a class="link_color" href="#">Animation robotique</a></li>
                        <li class="mr-3 mb-2 px-3 rounded link_shadow"><a class="link_color" href="#">Hologramme</a></li>
                        <li class="mr-3 mb-2 px-3 rounded link_shadow"><a class="link_color" href="#">Simulateur</a></li>
                        <li class="mr-3 mb-2 px-3 rounded link_shadow"><a class="link_color" href="#">Réalité augmenté</a></li>
                    </ul>
                </div>
            </div>

        </div>



        <!-- Image Box -->

        <div class="image-column col-lg-7 col-md-12 col-sm-12">

            <div class="inner-column">

                <div class="image-box">

                    <figure class="image wow fadeInRight"><img src="{{ asset('users_asset/img/web.jpeg') }}" alt=""></figure>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

<!--End App Section -->





     <!-- Event Info Section -->

    <section class="event-info-section">

        <div class="auto-container">

            <div class="row">

                <!-- Info Column -->

                <div class="info-column col-lg-12 col-md-12 col-sm-12 order-2">

                    <div class="inner-column">

                        <div class="sec-title style-two">

                            <span class="title">Historiques</span>

                            <h2>QUELQUES REALISATIONS</h2>

                        </div>



                        <div class="event-info-tabs tabs-box">
                            <ul class="tab-buttons clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab2">Success</li>

                                <li class="tab-btn" data-tab="#tab3">Between-Us</li>

                                <li class="tab-btn" data-tab="#tab4">SAFE</li>
                                <li class="tab-btn" data-tab="#tab5">FAIS</li>

                            </ul>

                        <div class="tabs-content" >
                            
                            <div class="tab active-tab" id="tab2">
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/succes/1.jpg') }}">
                                    <img class="rounded p-1" src="{{ asset('users_asset/img/galery/succes/1.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/succes/2.jpg') }}">
                                    <img class="rounded p-1" src="{{ asset('users_asset/img/galery/succes/2.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/succes/3.jpg') }}">
                                    <img class="rounded p-1" src="{{ asset('users_asset/img/galery/succes/3.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/succes/4.jpg') }}">
                                    <img class="rounded p-1" src="{{ asset('users_asset/img/galery/succes/4.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/succes/5.jpg') }}">
                                    <img class="rounded p-1" src="{{ asset('users_asset/img/galery/succes/5.jpg') }}" width="250" height="200" />
                                </a>

                            </div>

                            <div class="tab" id="tab3">
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Betwenus/1.jpg') }}">
                                    <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Betwenus/1.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Betwenus/2.jpg') }}">
                                    <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Betwenus/2.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Betwenus/3.jpg') }}">
                                    <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Betwenus/3.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Betwenus/4.jpg') }}">
                                    <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Betwenus/4.jpg') }}" width="250" height="200" />
                                </a>
                            </div>
                            <div class="tab" id="tab4">
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Safe/1.jpg') }}">
                                   <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Safe/1.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Safe/2.jpg') }}">
                                   <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Safe/2.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Safe/3.jpg') }}">
                                   <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Safe/3.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Safe/4.jpg') }}">
                                   <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Safe/4.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Safe/5.jpg') }}">
                                   <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Safe/5.jpg') }}" width="250" height="200" />
                                </a>

                            </div>

                            <div class="tab" id="tab5">
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Africum/1.jpg') }}">
                                  <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Africum/1.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Africum/2.jpg') }}">
                                  <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Africum/2.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Africum/3.jpg') }}">
                                  <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Africum/3.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Africum/4.jpg') }}">
                                  <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Africum/4.jpg') }}" width="250" height="200" />
                                </a>
                                <a data-fancybox="gallery" href="{{ asset('users_asset/img/galery/Africum/5.jpg') }}">
                                  <img class="rounded p-1" src="{{ asset('users_asset/img/galery/Africum/5.jpg') }}" width="250" height="200" />
                                </a>
                            </div>

                        </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--End Event Info Section -->




@endsection