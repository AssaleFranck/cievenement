
<!DOCTYPE html>
 <html lang="fr">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>@yield('title')</title>
<!-- Stylesheets -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="{{ asset('users_asset/css/fancybox.css') }}"/>
<link href="{{ asset('users_asset/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('users_asset/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('users_asset/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('users_asset/css/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('users_asset/css/owl.theme.default.css') }}" rel="stylesheet">
<!--Color Switcher Mockup-->
<link href="{{ asset('users_asset/css/color-switcher-design.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
@yield('script')
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


</head>

<body>

<div class="page-wrapper">

<header class="main-header">

<div class="main-box">

    <div class="auto-container clearfix">

        <div class="logo-box">

            <div class="logo"><a href="/"><img src="{{ asset('images/logo.png') }}" alt="logo" style="widht: 45px;height: 56px;"></a></div>

        </div>



        <!--Nav Box-->

        <div class="nav-outer clearfix">

            <!--Mobile Navigation Toggler-->

            <div class="mobile-nav-toggler"><span class="icon fa fa-bars" aria-hidden="true"></span></div>

            <!-- Main Menu -->

            <nav class="main-menu navbar-expand-md navbar-light">

                <div class="navbar-header">

                    <!-- Togg le Button -->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="icon fa fa-bars" aria-hidden="true"></span>

                    </button>

                </div>



                <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix" id="barContainer">
                                <li class="current" ><a href="/">Accueil</a>
                                </li>
                                <li><a href="/events">Events</a>
                                </li>
                                <li><a href="/services">Nos produits et services</a>
                                </li>
                                <li><a href="/blog">Blog</a>
                                </li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>

            </nav>

            <!-- Main Menu End-->



            <!-- Outer box -->

            <div class="outer-box">

                <!--Search Box-->

                <div class="search-box-outer">

                    <div class="search-box-btn"><span class="fa fa-search"></span></div>

                </div>



                <!-- Button Box -->

                <div class="btn-box">

                    <!-- <a href="/event-inscription" class="theme-btn btn-style-one"><span class="btn-title">Obtenir son Tickets</span></a> -->
                    <a href="/events" class="theme-btn btn-style-one"><span class="btn-title">Obtenir son Tickets</span></a>

                </div>

            </div>

        </div>

    </div>

</div>



<!-- Mobile Menu  -->

<div class="mobile-menu">

    <div class="menu-backdrop"></div>

    <div class="close-btn"><span class="icon fa fa-window-close"></span></div>



    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->

    <nav class="menu-box">

        <div class="nav-logo"><a href="/"><img src="{{ asset('images/logo.png') }}" alt="" title=""></a></div>



        <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>

    </nav>

</div><!-- End Mobile Menu -->



</header>

<!--End Main Header -->



    <!-- DEBUT PARTIE LAYOUT CONTENT  -->
      @yield('content')
    <!-- FIN PARTIE LAYOUT CONTENT  -->

    <!-- Main Footer -->


    <footer class="main-footer">

        <!--Widgets Section-->

        <div class="widgets-section">

            <div class="auto-container">

                <div class="row">

                    <!--Big Column-->

                    <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">

                        <div class="row">

                            <!--Footer Column-->

                            <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">

                                <div class="footer-widget about-widget">

                                    <div class="logo">

                                        <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a>

                                    </div>

                                    <div class="text">
                                    <p>Fondée en 2019, l’agence Côte d’Ivoire Evènement est spécialisée en
                                            communi-cation  et  logistique  événementielle,  rédaction de  projets  événementiels,  elle assure le suivi et la stratégie marketing et commerciale de vos événements.
                                        </p>
                                    </div>

                                    <ul class="social-icon-one social-icon-colored">

                                        <li><a href="https://www.facebook.com/cievent225/" target="_blank"><i class="fa fa-facebook-f"></i></a></li>

                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>

                                        <li><a href="https://www.linkedin.com/company/c%C3%B4te-d-ivoire-%C3%A9v%C3%A8nement/about/" target="_blank"><i class="fa fa-linkedin"></i></a></li>

                                        <!-- <li><a href="#"><i class="fa fa-instagram"></i></a></li> -->

                                    </ul>

                                </div>

                            </div>



                            <!--Footer Column-->

                            <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">

                                <div class="footer-widget useful-links">

                                    <h2 class="widget-title">Nos pages</h2>

                                    <ul class="user-links">

                                        <li><a href="/">Accueil</a></li>

                                        <li><a href="/services">Apropos</a></li>

                                        <li><a href="/events">Event et services</a></li>

                                        <li><a href="/blog">Blogs</a></li>

                                        <li><a href="/contact">Contact</a></li>

                                    </ul>

                                </div>

                            </div>
                        </div>

                    </div>



                    <!--Big Column-->

                    <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">

                        <div class="row">

                            <!--Footer Column-->

                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">

                                <!--Footer Column-->

                                <div class="footer-widget contact-widget">

                                    <h2 class="widget-title">Contactez-Nous</h2>

                                     <!--Footer Column-->

                                    <div class="widget-content">

                                        <ul class="contact-list">

                                            <li>

                                                <span class="icon fa fa-clock-o" aria-hidden="true"></span>

                                                <div class="text">lun - Sam: 08:30 - 19:30</div>

                                            </li>



                                            <li>

                                                <span class="icon fa fa-phone"></span>

                                                <div class="text"><a href="tel:+1-345-5678-77">+225 2722497873</a></div>

                                            </li>



                                            <li>

                                                <span class="icon fa fa-envelope"></span>

                                                <div class="text"><a href="mailto:information@cievenement.ci">information@cievenement.ci</a></div>

                                            </li>



                                            <li>

                                                <span class="icon fa fa-map-marker" aria-hidden="true"></span>

                                                <div class="text"> Cocody Angré Nouveau CHU <br>
                                                     31 BP 352 Abidjan 31</div>

                                            </li>

                                        </ul>

                                    </div>

                                </div>

                            </div>



                            <!--Footer Column-->

                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">

                                <!--Footer Column-->

                                <div class="footer-widget instagram-widget">

                                    <h2 class="widget-title">Recent post</h2>

                                    <div class="widget-content">

                                        <div class="outer d-flex flex-column">

                                        @forelse($posts as $post)
                                            <a href="{{ route('blog.show', $post->id) }}" title="Image Title Here">
                                              <div class="container-fluid">
                                                  <div class="row">
                                                  <div class="col-4">
                                                <img style="height: 60px; width: 100px;" src="{{asset('images/posts/'.$post->imagePath)}}" alt="poste Côte d'Ivoire evenement" class="img-fluid">
                                              </div>
                                              <div class="col-8">
                                                  <span id="blog_titre">{!! strip_tags(substr($post->title, 0, 25,)) !!}...</span>
                                                  <ul class="post-info d-flex">

                                                     <li><span class="fa fa-calendar-plus-o fs-6" aria-hidden="true"></span> {{ $post->created_at->diffForHumans() }}</li>

                                                   </ul>
                                               </div>
                                                  </div>
                                              </div>
                                            </a>
                                            @empty
                                                <div>
                                                    <p class="text-start">Aucun post recent !</p>
                                                </div>
                                            @endforelse




                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!--Footer Bottom-->

        <div class="footer-bottom">

            <div class="auto-container">

                <div class="inner-container clearfix">

                    <div class="copyright-text">

                    <p>© Copyright 2022 Tout droit réservé par <a href="/">Cote d'ivoire évènement</a></p>

                    </div>

                </div>

            </div>

        </div>

    </footer>

    <!-- End Footer -->

</div>
<!--End pagewrapper-->



<!--Search Popup-->
<div id="search-popup" class="search-popup">
	<div class="close-search theme-btn"><span class="fa fa-window-close"></span></div>
	<div class="popup-inner">
		<div class="overlay-layer"></div>
    	<div class="search-form">
        	<form method="post" action="index">
            	<div class="form-group">
                	<fieldset>
                        <input type="search" class="form-control" name="search-input" value="" placeholder="Saisie ici" required >
                        <input type="submit" value="Recherce!" class="theme-btn">
                    </fieldset>
                </div>
            </form>

            <br>
            <!-- <h3>Recent Search Keywords</h3> -->
            <ul class="recent-searches">
                <li><a href="#">Bussiness</a></li>
                <li><a href="/blog">Blogs</a></li>
                <li><a href="/events">Events</a></li>
                <li><a href="#">Digital</a></li>
                <li><a href="#">Conference</a></li>
            </ul>

        </div>

    </div>
</div>

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

<script src="{{ asset('users_asset/js/fancybox.umd.js') }}"></script>
<script src="{{ asset('users_asset/js/jquery.js') }}"></script>
<script src="{{ asset('users_asset/js/popper.min.js') }}"></script>
<script src="{{ asset('users_asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('users_asset/js/jquery-ui.js') }}"></script>
<script src="{{ asset('users_asset/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('users_asset/js/jquery.countdown.js') }}"></script>
<script src="{{ asset('users_asset/js/appear.js') }}"></script>
<script src="{{ asset('users_asset/js/owl.js') }}"></script>
<script src="{{ asset('users_asset/js/wow.js') }}"></script>
<script src="{{ asset('users_asset/js/parallax.min.js') }}"></script>
<script src="{{ asset('users_asset/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('users_asset/js/script.js') }}"></script>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<!-- Color Setting -->
<script src="{{ asset('users_asset/js/color-settings.js') }}"></script>
<script type="text/javascript">
    // barContainer = document.querySelector('#barContainer').querySelectorAll('li');
    barContainer = document.querySelectorAll('#navbarSupportedContent li');
    // console.log(barContainer);
    barContainer.forEach( li => {
        li.addEventListener("click", function(){
            // alert("bonjour");
            barContainer.forEach(nav=>nav.classList.remove("current"));
            this.classList.add("current");
        })
    })

</script>

@yield('scripts')

<script>
    CKEDITOR.replace( 'body' );
</script>

</body>
</html>
