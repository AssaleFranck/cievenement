@extends('layouts.app_test')

@section('content')
    <div class="container-fluid h-100 d-flex flex-column justify-content-center align-items-center d-md-flex flex-md-row justify-content-md-evenly align-items-md-center">
        <div class="col-12 col-md-6">
            <img class="img-fluid" src="{{asset('images/logo.png')}}" alt="Logo Cote d'Ivoire Evenement">
        </div>

        <div class="col-12 col-md-6 w-md-100 mt-4 mt-md-0 d-md-flex justify-content-md-center align-items-md-center h-mod">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div  class="col-md-10 m-0 h-100 " id="h-mod2">
                <div class="card shadow py-2">
                    <h3 class="card-header text-center mt-md-2 ">Inscrivez Vous</h3>
                    <div class="card-bodypx-1">
                        <form   class="d-flex flex-column align-items-center" method="POST" action="{{ route('register') }}">
                            @csrf
                                
                            <div class="form-floating mb-3 w-75 border">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="votre nom" value="{{old('name')}}"  autofocus>
                                <label for="name">Nom et Prenoms</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" min="10" placeholder="1234567890 ou 2251234567890" >
                                <label for="phone">Contact</label>
                                @error('phone')
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
                            
                            <div class="form-floating mb-3 w-75">
                                <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  placeholder="+8 caractères" >
                                <label for="password-confirm">Confirm Password</label>
                            </div>

                            <div class="row mb-0">
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn border btn-outline-warning px-md-5 border-2 border-warning ">
                                        {{ __("S'inscrire") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h5 class="text-center text-muted mt-md-4 mt-1">Déja inscrit ? connectez vous <a class="text-warning" href="{{ route('login') }}">ici</a></h5>
                </div>
            </div>

        </div>
    </div>
@endsection