@extends('layouts.app_test_2')

@section('content')

<div class="row border">
    <div class="col-md-6 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title text-center">Inscrivez vous pour {{$event->name}}</h6>
                <form class="forms-sample" method="POST" action="{{route('register.store')}}">
                    @csrf
                    @if (Auth::user())
                        <div class="form-group">
                            <label for="name">Nom et Prenoms</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" value="" readonly>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" readonly>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="phone">Mobile</label>
                            <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{Auth::user()->phone}}" placeholder="Numero Mobile" autofocus>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="compagny">Nom de l'Entreprise</label>
                            <input type="text" id="compagny" class="form-control @error('compagny') is-invalid @enderror" name="compagny" placeholder="Ci Event">
                            @error('compagny')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Choisissez votre ticket</label>
                            <select name="pass" class="form-control mb-3 @error('pass') is-invalid @enderror">
                                <option selected>selectionnez un pass</option>
                                <option value="standard">Standard</option>
                                <option value="vip">VIP</option>
                            </select>
                            @error('pass')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="commune" class="">Commune</label>
                            <input type="text" id="commune" class="form-control @error('commune') is-invalid @enderror" name="commune" placeholder="commune ou ville">
                            @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    @else

                        <div class="form-group">
                            <label for="name">Nom et Prenoms</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" autofocus placeholder="AZERTY qwerty" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="exemple@mail.Com" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="phone">Mobile</label>
                            <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Numero Mobile" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="compagny">Nom de l'Entreprise</label>
                            <input type="text" id="compagny" class="form-control @error('compagny') is-invalid @enderror" name="compagny" value="{{old('compagny')}}" placeholder="Ci Event" required>
                            @error('compagny')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Choisissez votre ticket</label>
                            <select name="pass" class="form-control mb-3 @error('pass') is-invalid @enderror">
                                <option selected>selectionnez un pass</option>
                                <option value="standard">Standard</option>
                                <option value="vip">VIP</option>
                            </select>
                            @error('pass')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="commune" class="">Commune</label>
                            <input type="text" id="commune" class="form-control @error('commune') is-invalid @enderror" name="commune" value="{{old('commune')}}" placeholder="commune ou ville" required>
                            @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    @endif
                    
                    <input type="hidden" class="form-control" name="event_id" value="{{$event->id}}">

                    <div class="border w-100 d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-warning px-4">Participer</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

    <script>
        $(document).ready(function(){

        $(document).on('click', '.ajouter', function (e) {
            e.preventDefault();

            console.log('hello');

            var $ad = $("#admin");
            var $au = $("#author");

            if($ad.prop("checked") == true){
            var admin = 1;
            }else if($ad.prop("checked") == false){
            var admin = 0;
            }

            if($au.prop("checked") == true){
            var author = 1;
            }else if($au.prop("checked") == false){
            var author = 0;
            }
            
            var data = {
            '_token' = $("input[name='_token']").val();
            'name': $('#name').val(),
            'email': $('#email').val(),
            'phone': $('#phone').val(),
            'admin': admin,
            'author': author,
            'password': $('#password').val(),
            'confirm_password': $('#confirm_password').val()
            }
            // console.log(data);

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
            type: "POST",
            url: "/dashboard/users/create",
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
            });


        });

        });
    </script>
@endsection
<style>
    .height{
        height: 85vh;
    }
</style>