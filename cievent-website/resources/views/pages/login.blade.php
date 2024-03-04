
<!DOCTYPE html>
 <html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>@yield('title')</title>
<!-- Stylesheets -->


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> 
<link href="{{ asset('users_asset/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('users_asset/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('users_asset/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('users_asset/css/fontawesome.min.css') }}" rel="stylesheet">
<!--Color Switcher Mockup-->
<link href="{{ asset('users_asset/css/color-switcher-design.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


</head>

<body>

<div class="page-wrapper">

  <!-- Debut Section register ici -->
    <section class="register-section" id="conexion">
		<div class="auto-container">
			
			<!-- Form Box -->
			<div class="form-box">
                <h1><img src="{{ asset('images/logo.png') }}" alt=""></h1>
				<div class="box-inner">
					<h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Connecte-toi maintenant</font></font></h1>
					
					<!--Login Form-->
                    <div class="styled-form login-form">
                        <form method="post" action="register">
                            <div class="form-group">
                                <span class="adon-icon"><span class="fa fa-envelope"></span></span>
                                <input type="email" name="email" value="" placeholder="Adresse e-mail*">
                            </div>
                            <div class="form-group">
                                <span class="adon-icon"><span class="fa fa-unlock"></span></span>
                                <input type="password" name="password" value="" placeholder="Entrer le mot de passe">
                            </div>

                            <div class="clearfix">
                                <div class="form-group pull-left">
                                    <button type="submit" class="theme-btn btn-style-two" style="cursor: pointer;"><span class="btn-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Connecte-toi maintenant</font></font></span></button>
                                </div>
                                <div class="form-group social-icon-one pull-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    N'avez-vous pas un compte?   
									<li><a href="/ci-register" class="">Créer ton compte</a></li>
                                </div>
                            </div>
                            
                            <div class="clearfix">
                                <div class="pull-left">
                                    <input type="checkbox" id="remember-me"><label class="remember-me" for="remember-me"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp; Souviens-toi de moi</font></font></label>
                                </div>
                            </div>
                            
                        </form>
                    </div>
					
				</div>
			</div>
			
		</div>
	</section>
      <!-- Fin Section register  -->

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
<script src="{{ asset('users_asset/js/script.js') }}"></script>
<!-- Color Setting -->
<script src="{{ asset('users_asset/js/color-settings.js') }}"></script>

</body>
</html>