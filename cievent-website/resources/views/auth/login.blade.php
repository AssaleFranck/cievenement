@extends('layouts.app_test')

@section('content')
    <div class="mx-20 py-20 container-fluid h-100 d-flex flex-column justify-content-center align-items-center d-md-flex flex-md-row justify-content-md-evenly align-items-md-center">
        <div class=" col-12 col-md-6">
            <img class="img-fluid" src="{{asset('images/logo.png')}}" alt="Logo Cote d'Ivoire Evenement">
        </div>

        <div class="col-12 col-md-6 w-md-100 mt-4 mt-md-0 d-md-flex justify-content-md-center align-items-md-center h-mod">
            
            <div  class="col-md-10 m-0 h-100 " id="h-mod2">
                <div class="card shadow py-2">
                    <h3 class="card-header text-center mt-md-2 ">Connectez vous</h3>
                    <div class="card-body ">
                        <form   class="d-flex flex-column align-items-center" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-floating mb-3 w-75">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"  placeholder="nom@exemple.com" >
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3 w-75">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" min="8" placeholder="+8 caractères" >
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-4 p-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn border btn-outline-warning px-md-5 border-2 border-warning ">
                                        {{ __("Se connecter") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h5 class="text-center text-muted mt-md-2 mt-1">Pas encore inscrit ? Inscrivez vous <a class="text-warning" href="{{ route('register') }}">ici</a></h5>
                </div>
            </div>

        </div>
    </div>
@endsection