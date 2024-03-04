@extends('layouts.app_principale')
@section('title', "Event | Cote d'Ivoire évènement")
@section('content')
<!-- Banniere de recherche events -->
<section class="page-title" style="background-image: url(assets/images/special-offer-bg.png);">
  <div class="container">
    <div class="row">

      <!-- section-title - start -->
      <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="section-title text-center pt-4">
          <h6 class="sub-title">
            <font style="vertical-align: inherit; font-weight: bold;">
              <font style="vertical-align: inherit;">Trouvez le meilleur événement ici</font>
            </font>
          </h6>
        </div>
      </div>
      <!-- section-title - end -->

      <!-- search-form - start -->
      <div class="col-lg-8 col-md-12 col-sm-12">
        <div class="bg-light p-2">
          <form action="#!">

            <ul class="d-flex">
              <li>
                <div class="form-item p-2">
                  <input type="search" placeholder="Nom de l'événement" class="p-2">
                </div>
              </li>
              <li>
                <div class="form-item p-2">
                  <select id="event-category-select" class="p-2">
                    <option selected="" class="p-2">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Event</font>
                      </font>
                    </option>
                    <option value="1" class="p-2">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">succèss</font>
                      </font>
                    </option>
                    <option value="2" class="p-2">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">FIAM</font>
                      </font>
                    </option>
                    <option value="3" class="p-2">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Seminaire</font>
                      </font>
                    </option>
                  </select>
                </div>
              </li>
              <li>
                <div class="form-item p-2">
                  <button type="submit" class="btn btn-primary">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Rechercher <span class="fa fa-search"></span></font>
                    </font>
                  </button>
                </div>
              </li>
            </ul>

          </form>
        </div>
      </div>
      <!-- search-form - end -->

    </div>
  </div>
</section>
<!--Fin Banniere de recherche events -->



<section class="speaker-detail pt-0">
  @if(Session::has('success'))
    <div class="alert alert-success text-center">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="container">
    <div class="row">

      @foreach ($events as $event)
        @if ($event->statut)
          <div class="content-side col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="blog-sidebar">
              <!-- News events -->
              <div class="news-block wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">

                <div class="inner-box">

                  <div class="image-box">

                      <figure class="image"><a href="#"><img src="{{asset('images/events/'.$event->img)}}" alt="" id="events"></a></figure>

                  </div>

                  <div class="lower-content">
                    <ul class="post-info">
                      <li><span class="fa fa-clock-o"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$event->time->Format('H : i')}}</font></font></li>
                      <li><span class="fa fa-calendar"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">le <span class="date">{{ \Carbon\Carbon::parse($event->date)->translatedFormat('j F Y') }}</span></font></font></li>
                      <li><span class="fa fa-user"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">avec <span class="font-weight-bolder text-uppercase">{{$event->invites[0]->name}}</span><span class="text-capitalize">{{$event->invites[0]->surname}}</span></font></font></li>
                      <li><span class="fa fa-paragraph"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Le prix : VIP: {{$event->vip}} / STANDARD: {{$event->standard}}</font></font></li>
                    </ul>

                    <h4><a href={{route('register.create', $event->id)}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$event->name}}</font></font></a></h4>
                    <div class="text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> {!! strip_tags(substr($event->description, 0, 100,)) !!}.. </font></font></div>

                    <div class="btn-box"><a href={{route('event.details', $event->id)}}" class="read-more"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Je veux participer</font></font></a></div>

                  </div>

                </div>

              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>



    <!--Styled Pagination-->

    <!-- <ul class="styled-pagination pt-2">
      <li><a href="#">1</a></li>
      <li><a href="#" class="active">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#"><span class="icon fa fa-angle-right"></span></a></li>
    </ul> -->

</section>

@endsection