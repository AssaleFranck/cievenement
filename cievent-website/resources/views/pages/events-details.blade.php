@extends('layouts.app_principale')
@section('title', "Event | Cote d'Ivoire évènement")
@section('content')

<!-- Debut event -->
      <section class="speaker-detail">

         <div class="auto-container">

            <div class="row">

                <div class="image-column col-lg-4 col-md-12 col-sm-12">

                    <div class="image-box">

                        <figure class="image"><img src="{{asset('images/events/'.$event->img)}}" alt="poste Côte d'Ivoire evenement"></figure>

                    </div>

                </div>



                <div class="info-column col-lg-8 col-md-12 col-sm-12">

                    <div class="inner-column">

                        <div class="text-box">

                            <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$event->name}}</font></font></h3>

                            <p><font style="vertical-align: inherit;">{{$event->description}}</font></p>

                            {{-- <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Séances de passages</font></font></h4> --}}

                            {{-- <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apportez à la table des stratégies de survie gagnant-gagnant pour assurer une domination proactive. </font><font style="vertical-align: inherit;">En fin de compte, à l'avenir, une nouvelle normalité qui a évolué à partir de la génération X est sur la piste en direction d'une solution cloud rationalisée. </font><font style="vertical-align: inherit;">Le contenu généré par l'utilisateur en temps réel aura plusieurs points de contact pour la délocalisation.</font></font></p> --}}

                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pour avoir plus d'info</font></font></p>

                            <div class="btn-box"><a class="theme-btn btn-style-one" href="{{$event->url}}" target="_blank">Cliquez-ici <i class="fa fa-hand-o-right" aria-hidden="true"></i></a></div>



                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Fin Events -->
@endsection