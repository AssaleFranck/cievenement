@extends('layouts.app_principale')
@section('title', "Inscription à evènt | Ci-event")
@section('content')

  <!-- Debut Section register ici -->
    <section class="register-section">
		<div class="auto-container">

			<!-- Form Box -->
			<div class="form-box">
				<div class="box-inner">
					<h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Formulaire d'inscription pour participer à notre Evènement</font></font></h1>
					<!--Inscription Form-->
          <div class="styled-form login-form">
            <form method="POST" action="{{route('register.store')}}" class="container-fluid">
              @csrf
              @if (Auth::user())
                <div class="form-group">
                  <span class="adon-icon"><span class="fa fa-user"></span></span>
                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" readonly>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <span class="adon-icon"><span class="fa fa-envelope"></span></span>
                  <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" readonly>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group ">
                  <span class="adon-icon"><span class="fa fa-phone"></span></span>
                  <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{Auth::user()->phone}}" placeholder="Numero Mobile" autofocus required>
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="row">
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <span class="adon-icon"><span class="fa fa-entreprise"></span></span>
                    <input type="text" id="compagny" class="form-control @error('compagny') is-invalid @enderror" name="compagny" placeholder="Nom de l'Entreprise">
                    @error('compagny')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <span class="adon-icon"><span class="fa fa-entreprise"></span></span>
                    <input type="text" id="commune" class="form-control @error('commune') is-invalid @enderror" name="commune" placeholder="commune ou ville">
                    @error('commune')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label for="message-text" class="col-form-label">Choisissez votre ticket</label>
                  <select name="pass" class="form-control mb-3 @error('pass') is-invalid @enderror" required>
                    <option selected disabled class="text-light">Selectionner un ticket</option>
                    <option value="standard" >Standard</option>
                    <option value="vip">VIP</option>
                  </select>
                  @error('pass')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

              @else

              <div class="form-group">
                <span class="adon-icon"><span class="fa fa-user"></span></span>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Votre nom" required autofocus>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <span class="adon-icon"><span class="fa fa-envelope"></span></span>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Votre email" required>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <span class="adon-icon"><span class="fa fa-phone"></span></span>
                <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Numero Mobile" required>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="row">
                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                  <span class="adon-icon"><span class="fa fa-entreprise"></span></span>
                  <input type="text" id="compagny" class="form-control @error('compagny') is-invalid @enderror" name="compagny" placeholder="Nom de l'Entreprise" value="{{old('compagny')}}">
                  @error('compagny')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                  <span class="adon-icon"><span class="fa fa-entreprise"></span></span>
                  <input type="text" id="commune" class="form-control @error('commune') is-invalid @enderror" name="commune" placeholder="commune ou ville" value="{{old('commune')}}" required>
                  @error('commune')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Choisissez votre ticket</label>
                <select name="pass" class="form-control mb-3 @error('pass') is-invalid @enderror">
                  <option value="standard" selected disabled>Selectionner un ticket</option>
                  <option value="standard">Standard</option>
                  <option value="vip">VIP</option>
                </select>
                @error('pass')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              @endif

                <div class="clearfix">
                    <div class="form-group pull-left">
                        <button type="submit" class="theme-btn btn-style-two" style="cursor: pointer;"><span class="btn-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inscrie-toi maintenant</font></font></span></button>
                    </div>
                    <div class="form-group social-icon-one pull-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Evénement en cour?  
                        <a href="/events" class="">En savoir plus</a>
                    </div>
                </div>
              <input type="hidden" class="form-control" name="event_id" value="{{$event->id}}">
            </form>
          </div>

				</div>
			</div>

		</div>
	</section>
      <!-- Fin Section register  -->

@endsection
