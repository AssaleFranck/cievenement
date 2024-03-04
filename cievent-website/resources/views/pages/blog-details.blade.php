@extends('layouts.app_principale')
@section('title', "Blog Cote d'Ivoire évènement")
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btnMod').click(function (e) {
            e.preventDefault();
           document.getElementById('formMod').submit();
        });
    });
</script>
@section('content')
    <section class="page-title">
        <div class="auto-container">

            <h1 class="text-secondary">Blogs Détails</h1>

            <ul class="bread-crumb clearfix">

                <li><a class="text-secondary" href="/">Home</a></li>
                <li class="text-secondary">||</li>
                <li><a class="text-secondary" href="/blog">Blog</a></li>

            </ul>

        </div>

    </section>

    @if(Session::has('success'))
        <div class="alert alert-success text-center">
            {{Session::get('success')}}
        </div>
    @endif

  <!-- debut corps  blog -->

    <!--Sidebar Page Container-->

    <div class="sidebar-page-container">

        <div class="auto-container">

            <div class="row clearfix">


                <div class="content-side col-lg-8 col-md-12 col-sm-12">

                    <div class="blog-single">

                         <!-- News Block Three -->

                        <div class="news-block">

                            <div class="inner-box">



                                <div class="w-2/5 image-box">

                                    <figure class="image"><img class="img1" src="{{asset('images/posts/'.$contenu->imagePath)}}" alt="poste Côte d'Ivoire evenement"> </figure>
                                </div>

                                <div class="lower-content">

                                    <ul class="post-info">

                                        {{-- <li><span class="fa fa-user"></span> {{ $contenu->user->name }}</li> --}}

                                        <li class="ml-2"><span class="fa fa-comments"></span>Commentaires {{$comments->count()}}</li>


                                        <span class="fa fa-calendar-plus-o" aria-hidden="true" font-bold italic text-success">{{ \Carbon\Carbon::parse($contenu->created_at)->translatedFormat('d F Y')}}, {{$contenu->created_at->diffForHumans() }}
                                        </span>

                                    </ul>

                                    <h2>{{$contenu->title}}</h2>

                                    {!!$contenu->body!!}


                                </div>

                            </div>

                        </div>



                         <!-- Other Options -->

                        <div class="post-share-options clearfix">

                            <div class="pull-left">

                                <ul class="tags">

                                    @forelse ($categori as $category)

                                    <li><a href="{{route('blog.index', ['category' => $category->name ])}}">{{ $category->name}} <span>{{ $category->posts->count() }}</span></a></li>
                                    @empty
                                    <div class="mx-6 sm text-justify-center">
                                        <li class=" d-flex justify-content-center">Désolé, il n'y a actuellement aucun article lié à cette recherche !</li>
                                    </div>
                                    @endforelse



                                </ul>

                            </div>



                            <div class="social-icon-three pull-right">

                                <ul class="social-icon-three">

                                    <li><a href="https://www.facebook.com/cievent225"><span class="fa fa-facebook-f"></span></a></li>

                                   <li><a href="https://instagram.com/cotedivoireevenement?utm_medium=copy_link"><span class="fa fa-instagram"></span></a></li>


                                </ul>

                            </div>

                        </div>



                        <!-- Comments Area -->

                        <div class="comments-area">
                                @if ($comments->count() > 0)
                            @forelse ($contenu->comments as $com)
                            <div class="comment-box">

                                    <div class="comment">

                                        <div class="author-thumb"><img src="{{asset('images/avatar1.png') }}" alt=""></div>

                                        <div class="comment-info">

                                            <div class="name">{{ $com->name }}</div> -

                                            <div class="date"><span class="font-bold italic text-success mr-2"> {{ date('jS M Y', strtotime($com->updated_at)) }}</span>,
                                                <span class="mr-2">
                                                    {{ $com->created_at->diffForHumans() }}
                                                </span></div>
                                        </div>

                                        <div class="text">{{$com->comment}} </div>

                                        @if (Auth::user())
                                        @if (Auth::user()->email == $com->email)
                                        <div class="d-flex float-right">

                                            <form action="{{ route('comment.destroy', $com->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ @method_field('delete')}}
                                                <div class="">
                                                    <button class="btn btn-sm btn-outline-success deletebtn" type="submit">
                                                        Supprimer
                                                    </button>
                                                    <a class="btn btn-sm btn-outline-warning editbtn" data-toggle="modal" data-target="#exampleModal{{$com->id}}">Modifier</a>
                                                </form>
                                                </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$com->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0">
                                                    <h5 class="modal-title text-center w-100" id="exampleModalLabel">Modifier commentaire</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="formMod" action="{{ route('comment.update', $com->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ @method_field('put')}}

                                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                                                <input type="hidden" name="name" placeholder="Votre nom" value="{{ $com->name }}" readonly  required="">

                                                            </div>



                                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                                                <input type="hidden" name="email" placeholder="Votre email" value="{{ $com->email }}" readonly  required="">

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Message:</label>
                                                                <textarea class="form-control @error('title') is-invalid @enderror" rows="4" name="comment" id="message-text" required>{{ $com->comment }}</textarea>
                                                            </div>
                                                          </form>
                                                    </div>
                                                    <div class="float-right modal-footer border-0">
                                                        <button type="button" class="float-right btn btn-sm btn-outline-info" data-dismiss="modal">Annuler</button>
                                                        <button type="button" class="float-right btn btn-sm btn-outline-warning btnMod">Modifier</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endif

                                        @else

                                            {{-- <div class="float-right">
                                                @if(Auth::user() == Null)
                                                    <p>Pour modifier, <a class="" href="{{route('login')}}"> connectez-vous</a></p>
                                                @endif
                                            </div> --}}
                                        @endif

                                    </div>
                                </div>
                                @empty
                                <div class="media response-info">
                                    <div class="media-left response-text-left">
                                        <p>Personne n'a commente ce poste</p>
                                    </div>
                                </div>
                                @endforelse
                                @else
                         <div class="col-12 card p-2 mt-4 d-flex text-muted">
                          <div class="body-cart text-center">
                            <span class="col-4 text-uppercase h6">Aucun commentaire</span>
                          </div>
                        </div>

                      @endif
                    </div>
                                 <!--Comment Form-->

                        <div class="comment-form">

                            <div class="group-title">

                                <h3>Laissez un commentaire</h3>

                            </div>

                            <form method="POST" action="{{ route('comment.store', $contenu->id) }}">
                                @csrf
                                @if (Auth::user())
                                    <div class="row clearfix">

                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                            <input type="hidden" name="name" placeholder="Votre nom" value="{{Auth::user()->name}}" readonly required>

                                        </div>



                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                            <input type="hidden" name="email" placeholder="Votre email" value="{{Auth::user()->email}}" readonly required>

                                        </div>



                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                        <textarea name="comment" placeholder="Votre commentaire" required></textarea>

                                        </div>



                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                            <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Poster un commentaire </span></button>

                                        </div>

                                    </div>
                                @else
                                    <div class="row clearfix">

                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                            <input type="text" name="name" placeholder="Votre nom" required>

                                        </div>



                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                            <input type="email" name="email" placeholder="Votre email" required>

                                        </div>



                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                        <textarea name="comment" placeholder="Votre commentaire" required></textarea>

                                        </div>



                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                            <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Poster un commentaire </span></button>

                                        </div>

                                    </div>
                                @endif
                            </form>

                        </div>

                    </div>

                </div>



                <!--Sidebar Side-->

                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">

                    <aside class="sidebar padding-left">



                        <!-- Search -->

                        <div class="sidebar-widget search-box">

                            <form method="" action="">

                                <div class="form-group">

                                    <input type="search" name="search-field" value="" placeholder="Recherche..." required>

                                    <button type="submit"><span class="icon fa fa-search"></span></button>

                                </div>

                            </form>

                        </div>



                        <!-- Category Widget -->

                        <div class="sidebar-widget categories">

                            <h4 class="sidebar-title">Categories</h4>

                            <div class="widget-content">

                                <!-- Blog Category -->

                                <ul class="blog-categories">

                                    @forelse ($categories as $category)

                                    <li><a href="{{route('blog.index', ['category' => $category->name ])}}">{{ $category->name}} <span>{{ $category->posts->count() }}</span></a></li>
                                    @empty
                                    <div class="mx-6 sm text-justify-center">
                                        <li class=" d-flex justify-content-center">Désolé, il n'y a actuellement aucune categorie !</li>
                                    </div>
                                    @endforelse

                                </ul>

                            </div>

                        </div>



                        <!-- Post Widget -->

                        <div class="sidebar-widget popular-posts">

                            <h4 class="sidebar-title">Derniers posts</h4>

                            <div class="widget-content">



                                @forelse ($poste as $post)

                                <article class="post">

                                    <div class="post-inner">



                                        <figure class="post-thumb"><a href="{{ route('blog.show', $post->id) }}"><img style="height: 65px;" src="{{asset('images/posts/'.$post->imagePath)}}" alt="poste Côte d'Ivoire evenement"></figure>

                                        <div class="post-info">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</div>


                                        <div class="text"><a href="{{ route('blog.show', $post->id) }}">{!! strip_tags(substr($post->title, 0, 20,)) !!}...</a></div>

                                    </div>

                                </article>

                                @empty
                                    <div class="mx-6 sm text-justify-center">
                                        <li class=" d-flex justify-content-center">Désolé, il n'y pas de poste recent !</li>
                                    </div>
                                @endforelse

                            </div>

                        </div>

                    </aside>
                </div>

            </div>

        </div>

    </div>
    <!-- Fin corps  -->



    <!-- <section class="subscribe-section">  -->
<section class="subscribe-section">

<div class="auto-container">

    <div class="content-box">


            <div class="title-column">

                <div class="sec-title">
                    <h2>Abonnez-vous à notre newsletter</h2>
                    <span> Et recévrez nos différents actualités? </span>

                </div>



                <!--Newsletter Form-->

                <div class="newsletter-form">

                    <form method="post" action="blog">

                        <div class="form-group d-flex justify-content-start flex-row align-items-start">

                            <input type="email" name="field-name" value="" placeholder="Entrez votre Adresse e-mail" required>

                            <button type="submit" class="theme-btn btn-style-three"><span class="btn-title">Souscrire</span></button>

                        </div>

                    </form>

                </div>



            </div>

    </div>

 </div>

 </section>
<!--End Subscribe Section -->

<style>

    p{
        margin: 0 !important;
        padding: 0 !important;
    }
    .img1
        {
            width:700px;
            height:500px;
        }

        @media all and (min-width: 360px) and (max-width: 1280px)
    {
        .img1
        {
            width: 1280px;
            height: 400px;
            font-size: 1.2em;
        }
    }
</style>

@endsection
